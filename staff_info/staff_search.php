<?php
$con=mysqli_connect("bbbrryannttt.me","kobe","blackmamba24","thu_staff");
// Check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	
$result = mysqli_query($con,"SELECT * FROM Staff_info WHERE Status = '正常'");


if($_SERVER['REQUEST_METHOD'] === 'POST'){

	if($_POST['uid']){
		$uid_value = $_POST['uid'];
		
		$result = mysqli_query($con,"SELECT * FROM Staff_info WHERE `uid` LIKE '$uid_value'");
		
		
	}
	else if($_POST['Rank']){
		$Rank_value = $_POST['Rank'];
		$result = mysqli_query($con,"SELECT * FROM Staff_info WHERE `Rank` LIKE '$Rank_value'");
		
	}
	

	
	
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查詢員工</title>
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
        <h1>查詢員工</h1>
    </div>
    <p style='margin-top:50px;margin-bottom:50px;'>
        <a href="staff_info.php" class="btn btn-warning">員工資料總表</a>
        <a href="staff_create.php" class="btn btn-warning">新增</a>
		<a href="staff_delete.php" class="btn btn-danger">刪除</a>
		<a href="staff_edit.php" class="btn btn-warning">修改</a>
		<a href="staff_search.php" class="btn btn-warning">查詢</a>
		<a href="staff_garbage.php" class="btn btn-info">垃圾桶</a>
    </p>
	<p >

		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style='margin-bottom:50px;' >
			
			身分證字號: <input type="text" name="uid" />
			<input type="submit" class='btn btn-primary' value = "查詢"/>
		</form>	
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style='margin-bottom:50px;' >
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
			
			<input type="submit" class='btn btn-primary' value = "查詢"/>
		</form>
		
		<form>
			<input type="button" value="列印查詢結果" onClick="printDiv('print-content')" class= 'btn btn-primary' />
		</form>



	</p>
	<div id ="print-content">
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
				
	</div>
	
	
	
	
<script type="text/javascript">

function printDiv(divName) {
	var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

}

</script>




</body>
</html>