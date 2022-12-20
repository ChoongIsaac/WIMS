<?php
require_once "pdo.php";
$sql = "DELETE FROM inventory WHERE inventory_id = :inventory_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(array(':inventory_id'=>$_GET['inventory_id']));
$_SESSION['success'] = 'Record deleted successfully';
header("Location:home.php");
return;
?>
