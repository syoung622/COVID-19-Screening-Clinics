<!DOCTYPE html>
<html>
<head>
<title>Bob's Auto Parts - Customer Results</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Customer Results</h2>
<?php
$document_root=$_SERVER['DOCUMENT_ROOT'];
$fp=fopen("$document_root/orders.txt", 'r');
flock($fp, LOCK_SH);
if (!$fp) {
echo "<p><strong>No orders pending.<br />
Please try again later.</strong></p>";
exit;
}
while (!feof($fp)) {
$order= fgets($fp);
echo htmlspecialchars($order)."<br />";
}
flock($fp, LOCK_UN);
fclose($fp);

unlink("$document_root/orders.txt");
?>
</body>
</html>
