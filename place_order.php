<?php
$conn = new mysqli("localhost", "root", "", "cupcake_store");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get POST data from the form
$cupcake = "Chocolate Delight"; // Hardcoded since it's fixed in the form
$price = 3.5;
$qty = $_POST['qty'];
$full_name = $_POST['full-name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$address = $_POST['address'];

$total = $qty * $price;
$ordered_at = date("Y-m-d H:i:s");

// Save to DB
$sql = "INSERT INTO `order` (customer_name, cupcake, quantity, email, phone, address, ordered_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssissss", $full_name, $cupcake, $qty, $email, $contact, $address, $ordered_at);

if ($stmt->execute()) {
    echo "✅ Order placed successfully. <a href='foods.html'>Back to Cupcakes</a>";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
