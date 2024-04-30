<?php
include 'connection.php';
$sql = "SELECT * FROM orders"; // Replace 'student' with your actual table name
$result = mysqli_query($conn, $sql);
echo ' <span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <link rel="stylesheet" href="orders_list.css">
      <title>orders</title>
      <link rel="stylesheet" href="admin.css" />
      <!-- Font Awesome Cdn Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    </head>
    <body>
      <div class="container">
        <nav>
        <ul>
        <li><a href="#" class="logo">
          <img src="https://i.imgur.com/oRhEAUj.jpg">
          <span class="nav-item">Admin</span>
        </a></li>
        <li><a href="admin.php">
          <i class="fas fa-database"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>
        <li><a href="admin_products.php">
          <i class="fas fa-box-open"></i>
          <span class="nav-item">products</span>
        </a></li>
        <li><a href="orders_list.php">
          <i class="fas fa-list-alt"></i>
          <span class="nav-item">orders</span>
        </a></li>
        <li><a href="admin_users.php">
          <i class="fas fa-user-circle"></i>
          <span class="nav-item">Users</span>
        </a></li>
        <li><a href="upload.html">
          <i class="fas fa-cart-arrow-down"></i>
          <span class="nav-item">Add Products</span>
        </a></li>
      </ul>
        </nav>
    
    
        <section class="main">
          <div class="main-top">
            <h1>Orders</h1>
            <i class="fas fa-user-cog"></i>
          </div>
          <div class="users">
          
          <table name="rem-table" border="1" cellpadding="10" cellspacing="0">
<thead>
<tr>
<th>order ID</th>
<th>Item ID</th>
<th>Name</th>
<th>Image</th>
<th>Qualitity</th>
</tr>
</thead>
<tbody>';

if (mysqli_num_rows($result) >  0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["orderID"] . '</td>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["image"] . '</td>';
        echo '<td>' . $row["quantity"] . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="4">No results found.</td></tr>';
}
echo "</div>";
echo '</body>';
echo '</table>';
echo '</body>';
echo '</html>';

mysqli_close($conn);
      
    
?>

