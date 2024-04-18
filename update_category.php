<?
$page_title = 'Изменение категории';
require_once "config/database.php";
require_once "objects/category.php";
require_once "objects/product.php";

include_once 'layout_header.php';

$database = new Database();
$database->connect_pdo();

$category = new Category($database->getInfPDO());

if (isset($_GET['id']) && isset($_POST['name'])) {
  $name = $_POST['name'];
  $id = $_GET['id'];
  if (!$category->update($id, $name)) : ?>
    <div class="alert alert-danger">Категория не изменена</div>
  <? else : ?>
    <div class="alert alert-success">Категория успешно изменена</div>
<? endif;
} ?>
<div class="ml-auto w-fit">
  <a href="read_category.php" class="btn btn-primary pull-right">Просмотр всех категорий</a>
</div>
<br>
<form method="POST" class="flex flex-col gap-4">
  <div class="form-group py-2">
    <label for="name">Название</label>
    <input type="text" value="<?= $_GET['name']?>" name="name" placeholder="Название категории">
  </div>
  <button type="submit" class="btn btn-primary text-black w-fit px-4 py-2">Изменить</button>
</form>
<? include_once 'layout_footer.php'; ?>