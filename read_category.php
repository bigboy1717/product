<?php
require_once "config/database.php";
require_once "objects/category.php";

$page_title = "Все категории";
require_once("layout_header.php");

$database = new Database();
$db = $database->connect_pdo();

$category = new Category($db);
$categories = $category->getAllOrdered();
?>

<div style="padding: 10px;" class="mb-3 col-md-3">
  <a href="create_category.php" class="btn btn-danger btn-block">Создать категорию</a>
</div>

<table class="table table-hover table-responsive table-bordered">
  <thead>
    <tr>
      <td>Номер</td>
      <td>Название</td>
    </tr>
  </thead>
  <?foreach ($categories as $category) : ?>
    <tr>
      <td><?= $category['id'] ?></td>
      <td><?= $category['name'] ?></td>
      <td class="text-center">
        <a href="update_category.php?id=<?= $category['id'] ?>&amp;name=<?= $category['name']?>" class="btn btn-info">
          <span class="glyphicon glyphicon-edit">Изменить</span>
        </a>
        <a href="delete_category.php?id=<?= $category['id'] ?>" id="deleteProduct" data-bs-toggle="modal" data-bs-target="#exampleModal" delete-id="<?= $category['id'] ?>" class="btn btn-danger">
          <span class="glyphicon glyphicon-remove">Удалить</span>
        </a>
      </td>
    </tr>
  <? endforeach;?>
</table>



<?php
require_once 'modal.php';
require_once 'layout_footer.php'
?>