<?php
function updater($Rank_value, $Salary_value, $Phone_value, $Gender_value, $Address_value){
	$conn = mysqli_connect( 'bbbrryannttt.me' , 'kobe' , 'blackmamba24' , 'thu_staff' );
    if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
    }
	$sql = "UPDATE `Staff_info` SET `Rank` =  '$Rank_value', `Salary` = '$Salary_value', `Phone` = '$Phone_value', `Gender` = '$Gender_value', `Address` = '$Address_value' WHERE `Staff_info`.`Name` = '$Name_value'";
	$update = $conn->prepare($sql);

	
	$update->execute();
	//var_dump($update);
	
	if ($update->affected_rows > 0) {
		header("Location: staff_infochange.php");
		echo "success";
    }else{
		echo "Error updating record: " . $conn->error;
	}

}


$Name = isset($_POST['Name']) ? $_POST['Name'] : "";
$Name_value = $Name;
$con=mysqli_connect("bbbrryannttt.me","kobe","blackmamba24","thu_staff");
	// Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM Staff_info WHERE Name = '$Name'");


if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	$Rank_value = $_POST['Rank']; 
	$Salary_value = $_POST['Salary'];
	$Phone_value = $_POST['Phone'];
	$Gender_value = $_POST['Gender'];
	$Address_value = $_POST['Address'];
	updater($Rank_value, $Salary_value, $Phone_value, $Gender_value, $Address_value);
}	

	


	
	
	
	
	
	
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>員工資料表</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
		table{border-collapse: clooapse;
		width: 80%;
		color: #d96459;
		font-family: monospace;
		text-align: center;}
		table th{text-align: center; padding: 5px;}
		table td{text-align: center; padding: 5px; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>員工資料表</h1>
    </div>
    <p style='margin-top:50px;margin-bottom:50px;' >
        <a href="/staff_info/staff_edit.php" class="btn btn-warning">返回</a>

    </p>

	<div align="center" style='margin-top:50px;margin-bottom:50px;'>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style='margin-bottom:50px;' >
			員工姓名: <?php echo "$Name" ?><br><br>
			身分證字號，出生年月日，錄用日期: 若有需要更動請聯絡資訊部<br><br>
			職等: 	<select name="Rank">
						<option value="簡任九等">簡任九等</option>
						<option value="簡任八等">簡任八等</option>
						<option value="簡任七等">簡任七等</option>
						<option value="簡任六等">簡任六等</option>
						<option value="簡任五等">簡任五等</option>
						<option value="簡任四等">簡任四等</option>
						<option value="簡任三等">簡任三等</option>
						<option value="簡任二等">簡任二等</option>
						<option value="簡任一等">簡任一等</option>
						<option value="簡任特等">簡任特等</option>
					</select>
			薪資:   <input type="text" name="Salary" />
			電話:   <input type="text" name="Phone" />
			性別:   <select name="Gender">
						<option value="男">男</option>
						<option value="女">女</option>
						<option value="其他">其他</option>

					</select>

			住址: <input type="text" name="Address" />

			<input type="submit" class='btn btn-primary' />
		</form>
	</div>
	

	<p>
		<table border='1' align="center">
			<tr>
				<th><font size="5">員工姓名</font></th>
				<th><font size="5">員工身分證字號</font></th>
				<th><font size="5">職等</font></th>
				<th><font size="5">薪資</font></th>
				<th><font size="5">電話</font></th>
				<th><font size="5">性別</font></th>
				<th><font size="5">出生年月日</font></th>
				<th><font size="5">錄用日期</font></th>
				<th><font size="5">住址</font></th>
				<th><font size="5">員工狀態</font></th>
				<th><font size="5">照片</font></th>
			</tr>
			<tr>
			<?php 
			
			while($row = mysqli_fetch_array($result)){
				
				echo "<td>". $row["Name"]."</td>";
				echo "<td>". $row["uid"]."</td>";
				echo "<td>". $row["Rank"]."</td>"; 
				echo "<td>". $row["Salary"]."</td>";
				echo "<td>". $row["Phone"]."</td>";
				echo "<td>". $row["Gender"]."</td>";
				echo "<td>". $row["Birthday"]."</td>";
				echo "<td>". $row["Hireday"]."</td>";
				echo "<td>". $row["Address"]."</td>";	
				echo "<td>". $row["Status"]."</td>";	
				echo "<td>". '<img src="' . $row["Picture"] . '" width="90" height="125">'."</td>";
				echo "</tr>"; 
			}
			echo "</table>";
 
			mysqli_close($con);
			?>
				
	</p>
</body>
</html>
