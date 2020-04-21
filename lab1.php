<?php
	//error_reporting(0);
	session_start();
	require ("connect.php");
	//include_once("user.php")
	$link=connect("btc3205");
	
	if(isset($_POST['btn_save'])){
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$city=$_POST['city_name'];
		
		/*$user= new User($first_name, $last_name, $city);
		$res=$user->save();
		
		if($res){
			echo "Save operation was successful";
		}else{
			echo "An error occurred";
		}*/
	}
	
	/*interface Crud{
		public function save();
		public function readAll();
		public function reradUnique();
		public function search();
		public function update();
		public function removeOne();
		public function removeAll();
	}*/
?>

<!DOCTYPE html>
<html>
	<head>
		<title>title here</title>
	</head>
	<body>
		<center>
		<form action="lab1.php" method="post">
			<table align= "center">
				<tr>
					<td><input type="text" name="first_name" required placeholder="First Name"/><td>
				</tr>
				<tr>
					<td><input type="text" name="last_name" required placeholder="Last Name"/><td>
				</tr>
				<tr>
					<td><input type="text" name="city_name" required placeholder="city"/><td>
				</tr>
				<tr>
					<td><button type="text" name="btn_save" <strong>SAVE</strong/></button><td>
				</tr>
			</table>
		</form>
		<?php
            $user = new User('','','');
            $result = $user->readAll();
            if($result->num_rows != 0){
                echo("<p> First Name | Last Name | City");
                while($row = $result->fetch_assoc()) {
                    echo "<p>";
                    echo($row["first_name"]);
                    echo(" | ");
                    echo($row["last_name"]);
                    echo(" | ");
                    echo($row["user_city"]);
                    echo "</p>";
                }
            }else{
                echo("No records Found");
            }
		?>
		</center>
	</body>
</html>

