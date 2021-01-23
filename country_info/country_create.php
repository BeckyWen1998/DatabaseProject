<?php
function updater($Name_value, $uid_value, $Rank_value, $Salary_value, $Phone_value, $Gender_value, $Birthday_value, $Hireday_value, $Address_value){
	$conn = mysqli_connect( 'bbbrryannttt.me' , 'kobe' , 'blackmamba24' , 'thu_staff' );
    if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
    }
	$sql = "INSERT INTO `Staff_info` (`Name`, `uid`, `Rank`, `Salary`, `Phone`, `Gender`, `Birthday`, `Hireday`, `Address`) VALUES ('$Name_value','$uid_value', '$Rank_value', '$Salary_value', '$Phone_value', '$Gender_value', '$Birthday_value', '$Hireday_value', '$Address_value')";
	$update = $conn->prepare($sql);

	//var_dump($sql);
	//var_dump($conn);
	
	$update->execute();
	
	
	if ($update->affected_rows > 0) {
		header("Location: staff_create.php");
		echo "success";
    }else{
		echo "Error updating record: " . $conn->error;
	}

}

$con=mysqli_connect("bbbrryannttt.me","kobe","blackmamba24","thu_staff");
// Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM Country_info WHERE Country_status = '正常'");


if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$Countrycode = $_POST['Countrycode'];
	$Country_value = $_POST['Country'];
	$Continent_value = $_POST['Continent']; 
	$President_value = $_POST['President'];
	$ForeignAffairs_value = $_POST['ForeignAffairs'];
	$ContactPerson_value = $_POST['ContactPerson'];
	$Population_value = $_POST['Population']; 
	$ContactPhone_value = $_POST['ContactPhone'];
	$Diplomatic_Countries_value = $_POST['Diplomatic_Countries'];
	updater($Name_value, $uid_value, $Rank_value, $Salary_value, $Phone_value, $Gender_value, $Birthday_value, $Hireday_value, $Address_value);
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新增國家</title>
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
        <h1>新增國家</h1>
    </div>
    <p style='margin-top:50px;margin-bottom:50px;'>
        <a href="country_info.php" class="btn btn-warning">國家資料總表</a>
        <a href="country_create.php" class="btn btn-warning">新增</a>
		<a href="country_delete.php" class="btn btn-danger">刪除</a>
		<a href="country_edit.php" class="btn btn-warning">修改</a>
		<a href="country_search.php" class="btn btn-warning">查詢</a>
		<a href="country_garbage.php" class="btn btn-info">垃圾桶</a>
    </p>
	<p >

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style='margin-bottom:50px;' >
			國家代碼: <input type="text" name="Countrycode" />
			國家名稱: <input type="text" name="Country" />
			所屬洲名: 	<select name="Continent">
						<option value="歐洲">歐洲</option>
						<option value="北歐">北歐</option>
						<option value="北美洲">北美洲</option>
						<option value="拉丁美洲">拉丁美洲</option>
						<option value="亞洲">亞洲</option>
						<option value="南亞">南亞</option>
						<option value="東南亞">東南亞</option>
						<option value="中亞">中亞</option>
						<option value="非洲">非洲</option>
						<option value="大洋洲">大洋洲</option>
					</select>
			元首名稱:   <input type="text" name="President" />
			外交部長姓名:   <input type="text" name="ForeignAffairs" />
			該國聯絡人: <input type="text" name="ContactPerson" />
			該國人口數: <input type="text" name="Population" />
			連絡電話: <input type="text" name="ContactPhone" />
			邦交國與否: 	<select name="Diplomatic_Countries">
								<option value="0">否</option>
								<option value="1">是</option>
							</select>
			

			<input type="submit" class='btn btn-primary' value = "新增"/>
		</form>
	</p>
	<p>
		<table border='1' align="center">
			<tr>
				<th><font size="5">國家代碼</font></th>
				<th><font size="5">國家名稱</font></th>
				<th><font size="5">所屬洲</font></th>
				<th><font size="5">元首名稱</font></th>
				<th><font size="5">外交部長</font></th>
				<th><font size="5">該國緊急聯絡人</font></th>
				<th><font size="5">該國人口數</font></th>
				<th><font size="5">該國領土面積</font></th>
				<th><font size="5">連絡電話</font></th>
				<th><font size="5">是否邦交國</font></th>
				<th><font size="5">國家狀態</font></th>
			</tr>
			<tr>
			<?php

			while($row = mysqli_fetch_array($result)){

				echo "<td>"."<font size='4'>". $row["Countrycode"]."</td>";
				echo "<td>"."<font size='4'>". $row["Country"]."</td>";
				echo "<td>"."<font size='4'>". $row["Continent"]."</td>"; 
				echo "<td>"."<font size='4'>". $row["President"]."</td>";
				echo "<td>"."<font size='4'>". $row["ForeignAffairs"]."</td>";
				echo "<td>"."<font size='4'>". $row["ContactPerson"]."</td>";
				echo "<td>"."<font size='4'>". $row["Population"]."</td>";
				echo "<td>"."<font size='4'>". $row["Area"]."</td>";
				echo "<td>"."<font size='4'>". $row["ContactPhone"]."</td>";
				if($row["Diplomatic_Countries"] == '0'){
					echo "<td>"."<font size='4'>".'否'."</td>";
				}
				else{
					echo "<td>"."<font size='4'>".'是'."</td>";
				}
				
				echo "<td>"."<font size='4'>". $row["Country_status"]."</td>";
				echo "</tr>"; 
			}
			echo "</table>";
 
			mysqli_close($con);
			?>
				
	</p>
	
</body>
</html>