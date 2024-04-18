<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="libs/css/custom.css" />
</head>

<style>
.tt{
    background: #31b0d5;
    color:white;
}
.nav{
    margin: 25px 0px 25px 50px;
}
</style>
<body>

<nav class="nav justify-content-center">
    <ul class="nav nav-pills justify-content-center">
      <li class="nav-item">
        <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/index.php' ? 'active tt' : '' ?>" aria-current="page" href="index.php">ТОВАРЫ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/read_category.php' ? 'active tt' : '' ?>" href="read_category.php">КАТЕГОРИИ</a>
      </li>
    </ul>
  </nav>
    <div class="container">
    <div class="page-header">
        <h1> <?php echo $page_title; ?></h1>
    </div>