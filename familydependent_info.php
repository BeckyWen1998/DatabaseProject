<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: /../login.php");
    exit;
}
$con=mysqli_connect("bbbrryannttt.me","kobe","blackmamba24","thu_staff");
// Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 $result = mysqli_query($con,"SELECT * FROM `Staff_info` WHERE Status = '正常'");

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
    <p style='margin-top:50px;margin-bottom:50px;'>
        <a href="/../welcome.php" class="btn btn-warning">回首頁</a>
        <a href="staff_create.php" class="btn btn-warning">新增</a>
		<a href="staff_delete.php" class="btn btn-danger">刪除</a>
		<a href="staff_edit.php" class="btn btn-warning">修改</a>
		<a href="staff_search.php" class="btn btn-warning">查詢</a>
		<a href="staff_garbage.php" class="btn btn-info">垃圾桶</a>
		
    </p>
	<p>
		<table border='1' align="center">
			<tr>
				<th><font size="4">員工姓名</font></th>
				<th><font size="4">員工身分證字號</font></th>
				<th><font size="4">職等</font></th>
				<th><font size="4">薪資</font></th>
				<th><font size="4">電話</font></th>
				<th><font size="4">性別</font></th>
				<th><font size="4">出生年月日</font></th>
				<th><font size="4">錄用日期</font></th>
				<th><font size="4">住址</font></th>
				<th><font size="4">員工狀態</font></th>
				<th><font size="4">照片</font></th>
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
				echo "<td>". '<img src="' . $row["Picture"] . '" width="100" height="125">'."</td>";
				echo "</tr>";
			}
			echo "</table>";

			mysqli_close($con);
			?>

	</p>
</body>
</html>