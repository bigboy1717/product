<?php
require_once "config/database.php";
require_once "objects/Category.php";

$page_title = "Создание категории";
require_once("layout_header.php");

$database = new Database();
$db = $database->connect_pdo();

$category = new Category($db);
?>

<!-- move button right -->
<div class="mb-3">
  <a href="read_category.php" class="btn btn-primary pull-right">Просмотр всех категорий</a>
</div>

<?php
if ($_POST) {
  if ($category->create($_POST['name'])) {
    echo "<div class='alert alert-success'>Категория была успешно создана!</div>";
  } else {
    echo "<div class='alert alert-danger'>Невозможно создать категорию</div>";
  }
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
  <table class="table table-hover table-responsive table-bordered">
    <tr>
      <td>Название</td>
      <td><input type="text" name="name" class="form-control" /></td>
    </tr>
    <tr>
      <td></td>
      <td><button type="submit" class="btn btn-primary">Создать</button></td>
    </tr>
  </table>
</form>
<?php
require_once("layout_footer.php");
?>