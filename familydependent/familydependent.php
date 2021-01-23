<?php
$con=mysqli_connect("bbbrryannttt.me","kobe","blackmamba24","thu_staff");
// Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 $result = mysqli_query($con,"SELECT * FROM FamilyDependent_info");
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>眷屬資料表</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>眷屬資料表</h1>
    </div>
    <p>
        <a href="/../welcome.php" class="btn btn-warning">返回</a>
        <a href="country_create.php" class="btn btn-warning">新增</a>
		<a href="country_delete.php" class="btn btn-danger">刪除</a>
		<a href="country_edit.php" class="btn btn-warning">修改</a>
		<a href="country_print.php" class="btn btn-warning">查詢</a>
    </p>
	<p>
		<table border='1' align="center">
			<tr>
				<th><font size="5">員工身分證字號</font></th>
				<th><font size="5">眷屬身分證字號</font></th>
				<th><font size="5">眷屬名字</font></th>
				<th><font size="5">眷屬性別</font></th>
				<th><font size="5">眷屬關係</font></th>
				<th><font size="5">眷屬生日</font></th>
				<th><font size="5">眷屬狀態</font></th>

			</tr>
			<tr>
			<?php 
			
			while($row = mysqli_fetch_array($result)){
				
				echo "<td>"."<font size='4'>". $row["uid"]."</td>";
				echo "<td>"."<font size='4'>". $row["Dependent_uid"]."</td>";
				echo "<td>"."<font size='4'>". $row["Dependent_name"]."</td>"; 
				echo "<td>"."<font size='4'>". $row["Dependent_gender"]."</td>";
				echo "<td>"."<font size='4'>". $row["Dependent_relation"]."</td>";
				echo "<td>"."<font size='4'>". $row["Dependent_birthday"]."</td>";
				echo "<td>"."<font size='4'>". $row["Dependent_status"]."</td>";
					
					
				echo "</tr>"; 
			}
			echo "</table>";
 
			mysqli_close($con);
			?>
	</p>
</body>
</html>