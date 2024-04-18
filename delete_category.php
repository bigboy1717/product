<?php
require_once "config/database.php";
require_once "objects/category.php";
require_once "objects/product.php";

$page_title = "Удаление категории";
require_once("layout_header.php");

$database = new Database();
$database->connect_pdo();

$category = new Category($database->getInfPDO());

if ($_GET['id']) {
  $id = $_GET['id'];

  $res = $category->delete($id);
  if ($res) : ?>
    <div class="alert alert-danger">Категория удалена</div>
  <? else : ?>
    <div class="alert alert-success">Категория не удалена</div>
<? endif;
}
