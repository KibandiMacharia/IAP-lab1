<html>
<title></title>
<?php
	function connect($db){
		$dbserver = "localhost";
		$username = "root";
		$password = "";
		$dbname=$db;
		$link = new mysqli($dbserver, $username, $password,$dbname) or die("Could not connect.");
		return $link;
	}
	function setdata($sql){
		$link=connect("btc3205");
		if(mysqli_query($link,$sql)){
			return true;
		}else{
			return false;
		}
		setdata();
	}
	
	function getdata($sql){
		$link=connect("btc3205");
		$result=mysqli_query($link,$sql);
		$rowdata=array();
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$rowdata[]=$row;
		}
		return $rowdata;
	}
?>
</html>