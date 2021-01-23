<?php
$con=mysqli_connect("bbbrryannttt.me","kobe","blackmamba24","thu_staff");
// Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 $result = mysqli_query($con,"SELECT * FROM Expatriate_info");
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>員工派駐資料</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>員工派駐資料表</h1>
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
				<th><font size="5">派駐國家代碼</font></th>
				<th><font size="5">員工身分證字號</font></th>
				<th><font size="5">員工姓名</font></th>
				<th><font size="5">到職日期</font></th>
				<th><font size="5">大使姓名</font></th>
				<th><font size="5">派駐狀態</font></th>
				
			</tr>
			<tr>
			<?php 
			
			while($row = mysqli_fetch_array($result)){
				
				echo "<td>"."<font size='4'>". $row["Countrycode"]."</font></td>";
				echo "<td>"."<font size='4'>". $row["uid"]."</font></td>";
				echo "<td>"."<font size='4'>".  $row["Name"]."</font></td>"; 
				echo "<td>"."<font size='4'>".  $row["Date"]."</font></td>";
				echo "<td>"."<font size='4'>".  $row["Ambassador_Name"]."</font></td>";
				echo "<td>"."<font size='4'>".  $row["Expatriate_status"]."</font></td>";

				echo "</tr>"; 
			}
			echo "</table>";
 
			mysqli_close($con);
			?>
				
	</p>
</body>
</html>