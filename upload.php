<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include 'connection.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
  $productname = $_POST["productname"];
  $price = $_POST["price"];
  $quantity = $_POST["quantity"];
  $category = $_POST["category"];

  //For uploads photos
 // // $upload_dir = "https://github.com/jnagalakshmi/project/blob/main/"; //this is where the uploaded photo stored
 //  $product_image = $_FILES["imageUpload"]["name"];
 //  $upload_dir.$_FILES["imageUpload"]["name"];
 //  $upload_file = basename($_FILES["imageUpload"]["name"]);
 //  $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION)); //used to detected the image format
 //  $check = $_FILES["imageUpload"]["size"]; // to detect the size of the image
 //  $upload_ok = 0;

//For uploads photos
  $upload_dir = ""; //this is where the uploaded photo stored
  $product_image = $upload_dir.$_FILES["imageUpload"]["name"];
  $upload_dir.$_FILES["imageUpload"]["name"];
  $upload_file = $upload_dir.basename($_FILES["imageUpload"]["name"]);
  $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION)); //used to detected the image format
  $check = $_FILES["imageUpload"]["size"]; // to detect the size of the image
  $upload_ok = 0;

  
  if(file_exists($upload_file)){
      echo "<script>alert('The file already exist')</script>";
      $upload_ok = 0;
  }else{
      $upload_ok = 1;
      if($check !== false){
        $upload_ok = 1;
        if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'jpeg' || $imageType == 'gif'){
            $upload_ok = 1;
        }else{
            echo '<script>alert("please change the image format")</script>';
        }
      }else{
          echo '<script>alert("The photo size is 0 please change the photo ")</script>';
          $upload_ok = 0;
      }
  }

  if($upload_ok == 0){
     echo '<script>alert("sorry your file is doesn\'t uploaded. Please try again")</script>';
  }else{
      if($productname != "" && $price !=""){
          //move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$upload_file);

          $sql = "INSERT INTO product(product_name,price,quantity,category,product_image)
          VALUES('$productname',$price,$quantity,'$category','$product_image')";

          if($conn->query($sql) === TRUE){
              echo "<script>alert('your product uploaded successfully')</script>";
            header("location:admin.php");
          }
      }
  }


  
}

?>


