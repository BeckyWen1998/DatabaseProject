<?php

function updater($value) {
    // Create connection
   $conn = new mysqli( 'bbbrryannttt.me' , 'kobe' , 'blackmamba24' , 'thu_staff' );
    // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   $sql = "UPDATE Staff_info SET Status = '刪除' WHERE Name LIKE '%$value%'";
   var_dump($sql );
   $update = $conn->prepare($sql);
   
   $update->execute();
   if ($update->affected_rows > 0) {
       header("Location: staff_delete.php");
	   echo "success";
   }else {
       echo "Error updating record: " . $conn->error;
   }
   
}
	$con=mysqli_connect("bbbrryannttt.me","kobe","blackmamba24","thu_staff");
	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$result = mysqli_query($con,"SELECT * FROM Staff_info WHERE Status = '正常'");



	if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = $_POST['Name'];
    //$result = mysqli_query($con,"SELECT * FROM Staff_info WHERE Status = '正常'");
	updater($value);
	
	}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>刪除員工</title>
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
        <h1>刪除員工</h1>
    </div>
    <p style='margin-top:50px;margin-bottom:50px;' >
        <a href="staff_info.php" class="btn btn-warning">員工資料總表</a>
        <a href="staff_create.php" class="btn btn-warning">新增</a>
		<a href="staff_delete.php" class="btn btn-danger">刪除</a>
		<a href="staff_edit.php" class="btn btn-warning">修改</a>
		<a href="staff_search.php" class="btn btn-warning">查詢</a>
		<a href="staff_garbage.php" class="btn btn-info">垃圾桶</a>
    </p>

	<div align="center">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style='margin-bottom:50px;' >
		輸入欲刪除的姓名：<input  type="text" name="Name" />
		<input  type="submit" class='btn btn-primary' value = "刪除"/><br/>
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
				echo "<td>". '<img src="' . $row["Picture"] . '" width="100" height="125">'."</td>";
				echo "</tr>"; 
			}
			echo "</table>";
 
			mysqli_close($con);
			?>
				
	</p>
</body>
</html>
