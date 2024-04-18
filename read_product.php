<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: отсутствует ID.');

require_once './config/database.php';
require_once './objects/category.php';
require_once './objects/product.php';

$database = new Database();
$db = $database->connect_pdo();

$product = new Product($db);
$category = new Category($db);

$product->id = $id;

$product->readOne();


$page_title = "Страница товара (чтение одного товара)";
require_once "layout_header.php";
?>

<div calss='right-button-margin'>
    <a href='index.php' class='btn btn-primary pull-right' style="margin-bottom: 10px;">
        <span class='glyphicon glyphicon-list'></span> Просмотр всех товаров
    </a>
</div>

<style>
img{
    width: 300px;
}
</style>

<table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Название</td>
        <td>
            <?php echo $product->name; ?>
        </td>
    </tr>
    <tr>
        <td>Цена</td>
        <td>
            <?php echo $product->price; ?>
        </td>
    </tr>
    <tr>
        <td>Описание</td>
        <td>
            <?php echo $product->description; ?>
        </td>
    </tr>
    <tr>
        <td>Категория</td>
        <td>
            <?php 
            $category->id = $product->category_id;
            $category->readName();
            echo $category->name;
            ?>
        </td>
    <tr>
        <td>Изображение</td>
        <td>
            <?php echo $product->image ? "<img src='uploads/{$product->image}' style='width:300px;' />" : "Изображение не найдено.";?>
        </td>
    </tr>
    </tr>
</table>

<?php
require_once "layout_footer.php";
?>