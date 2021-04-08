<html lang="uk">
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
<link href="css/header.css" rel="stylesheet"/>
<link href="css/landing.css" rel="stylesheet"/>
<link href="css/footer.css" rel="stylesheet"/>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastro center</title>
</head>
<body>
<?php include('header.php'); ?>
<?php
$page = $_GET['page'];
$page = trim($page);
$page = strip_tags($page);
$chars = array("'","*","\\","/","<",">",";",":","(",")","^","%","#"," ");
$page = str_replace($chars,"",$page);
if($page == ""):
    $page = "landing";
endif;
switch ($page){
    case "pronas":
        require "pro_nas.php";
        break;
    case "search":
        require "Search.php";
        break;
    case "doctors":
        require "doctors.php";
        break;
    case "landing":
        require "landing.php";
        break;
}
include('footer.php'); ?>
</body>
</html>

