<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript"></script>
<body>
<?php
require_once("dbconfig.php");
	$query ="SELECT * FROM manager_salon WHERE sid =".$_POST["sid"];
	$results = $conn->query($query);
?>
	<option value="">Select Manager</option>
<?php
	while($rs=$results->fetch_assoc()) {
        $query1="Select name from manager where mid=".$rs["mid"];
		$result1=$conn->query($query1);
		while($rs1=$result1->fetch_assoc())
		{
?>
	<option value="<?php echo $rs["mid"]; ?>"><?php echo " ".$rs1["name"]." (MID - ".$rs["mid"].")"; ?></option>
<?php
    }
}
?>
</body>
</html>