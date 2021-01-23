<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. 歡迎使用員工派遣系統.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">重置 密碼</a>
        <a href="logout.php" class="btn btn-danger">登出 帳號</a>
    </p>
    <p>
        <a href="/staff_info/staff_info.php" class="btn btn-info">員工基本資料表</a>
	    <a href="/country_info/country_info.php" class="btn btn-info">國家資料表</a>
	    <a href="/staff_expatriate/staff_expatriate.php" class="btn btn-info">員工派駐資料表</a>
        <a href="/familydependent/familydependent.php" class="btn btn-info">眷屬資料表</a>
    </p>
</body>
</html>
