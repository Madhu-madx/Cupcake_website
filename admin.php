<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Add to <head> -->
<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<style>
    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #fff0f5;
        color: #333;
    }
    h1, h2, h3 {
        font-family: 'Pacifico', cursive;
        color: #d63384;
    }
</style>

    <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <title>Admin - Cupcake Store</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include 'nav.php'; ?>

 <div class="content">
  <h2>Customer Orders</h2>
  <p>Manage orders, track revenue, and more.</p>

  <?php
  // 1. Connect to the database
  $conn = new mysqli("localhost", "root", "", "cupcake_store");
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // 2. Run the query
  $result = $conn->query("SELECT * FROM `order` ORDER BY ordered_at DESC");

  // 3. Display the results
  if ($result->num_rows > 0) {
      echo "<table border='1' cellpadding='10' cellspacing='0'>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Cupcake</th>
                <th>Qty</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Ordered At</th>
              </tr>";
      while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['customer_name']}</td>
                  <td>{$row['cupcake']}</td>
                  <td>{$row['quantity']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['phone']}</td>
                  <td>{$row['address']}</td>
                  <td>{$row['ordered_at']}</td>
                </tr>";
      }
      echo "</table>";
  } else {
      echo "<p>No orders found.</p>";
  }

  $conn->close();
  ?>
</div>


  <?php include 'footer.php'; ?>
</body>
</html>
