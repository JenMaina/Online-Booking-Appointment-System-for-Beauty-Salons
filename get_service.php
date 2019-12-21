<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
require_once("dbconfig.php");
	$query ="SELECT * FROM service1 WHERE sid = '" . $_POST["serveid"] . "'";
	$results = $conn->query($query);
?>
	<option value="">Select Service</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["sername"]; ?>"><?php echo $rs["sername"]."-"."(&#8369;".$rs["rate"].")"; ?></option>
<?php

}
?>
</body>
</html>