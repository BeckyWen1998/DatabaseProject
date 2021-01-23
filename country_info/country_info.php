<?php
$con=mysqli_connect("bbbrryannttt.me","kobe","blackmamba24","thu_staff");
// Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 $result = mysqli_query($con,"SELECT * FROM Country_info");
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>國家資料</title>
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
        <h1>國家資料表</h1>
    </div>
    <p style='margin-top:50px;margin-bottom:50px;'>
        <a href="/../welcome.php" class="btn btn-warning">返回</a>
        <a href="country_create.php" class="btn btn-warning">新增</a>
		<a href="country_delete.php" class="btn btn-danger">刪除</a>
		<a href="country_edit.php" class="btn btn-warning">修改</a>
		<a href="country_search.php" class="btn btn-warning">查詢</a>
		<a href="country_garbage.php" class="btn btn-info">垃圾桶</a>
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