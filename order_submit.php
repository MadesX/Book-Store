<?php
session_start();

$servername = "sql206.byethost16.com";
$username = "b16_38703978";
$password = "t8gwx71y";
$dbname = "b16_38703978_BookStore";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$_SESSION['order_amount'] = $_POST["amount"];

$sql = "INSERT INTO orders (userID, orderDate, amount, city, street, houseNumber, zipCode, shipping) VALUES (
		".$_SESSION['user_id'].",'".$_POST["orderDate"]."',".$_SESSION['order_amount'].",'".$_POST["city"]."','".$_POST["street"].
		"','".$_POST["houseNumber"]."','".$_POST["zipCode"]."',".$_POST["shipping"].");";

$conn->query($sql);
$conn->close();

echo "<script>
		alert('הזמנתך הושלמה בהצלחה');
		window.location.href = 'index1.php';
	  </script>";
exit();
?>
