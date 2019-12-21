<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
require_once("dbconfig.php");
	$query ="SELECT * FROM salon WHERE city = '" . $_POST["salon_mgrid"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Select Salon..</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["sid"];?>"><?php echo $rs["sname"]." - ".$rs["city"]." (SID - ".$rs["sid"].")"; ?></option>
<?php

}
?>
</body>
</html>