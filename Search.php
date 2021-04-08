<html lang="uk">
<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
<link href="css/search.css" rel="stylesheet"/>
<link href="css/header.css" rel="stylesheet"/>
<link href="css/footer.css" rel="stylesheet"/>
<link href="css/search_.css" rel="stylesheet"/>
<link href="css/ask_form.css" rel="stylesheet"/>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
include('header.php');
if(empty($_GET["search_str"]))
{
    header("Location: http://localhost/Gastro_center/index.php");
    exit();
}
$str = htmlspecialchars($_GET["search_str"])
?>
<div class="big_div">
    <div class="search_wrap">
        <?php include('search_form.php')?>
    </div>
    <div class="wrap_search">
        <header class="header1">РЕЗУЛЬТАТИ ПОШУКУ</header>
        <span>По запиту "<?php echo $str; ?>" знайдено результатів : 0</span>
    </div>
    <?php include('Ask_form.php'); ?>
</div>
<?php include('footer.php'); ?>
</body>
</html>







