<?php

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: отсутствует ID.');

require_once './config/database.php';
require_once './objects/product.php';
require_once './objects/category.php';

$database = new Database();
$db = $database->connect_pdo();

$product = new Product($db);
$category = new Category($db);

$product->id = $id;

$product->readOne();

$page_title = "Обновление товара";

require_once "layout_header.php";
?>
<?php
if ($_POST) {
    $product->name = $_POST["name"];
    $product->price = $_POST["price"];
    $product->description = $_POST["description"];
    $product->category_id = $_POST['category_id'];
    if ($product->update()) {
        echo "<div calss='alert alert-success alert-dismissable'>";
        echo "Товар был обновлен.";
        echo "</div>";
    }
    else {
        echo "<div calss='alert alert-danger alert-dismissable'>";
        echo "Невозможно обновить товар.";
        echo "</div>";
    }
}
?>
<style>
    img {
        width: 300px;
    }
</style>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" enctype="multipart/form-data">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Название</td>
            <td><input type="text" name='name' value='<?php echo $product->name; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Цена</td>
            <td><input type="text" name="price" value='<?php echo $product->price; ?>' class='form-control' /></td>
        </tr>
        <tr>
            <td>Описание</td>
            <td><textarea name='description' class='form-control'><?php echo $product->description; ?></textarea></td>
        </tr>
        <tr>
            <td>Категория</td>
            <td>
                <?php
                $stmt = $category->read();
                echo "<select class='form-control' name='category_id'>";
                echo "<option>Пожалуйста выберите...</option>";
                while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $category_id = $row_category['id'];
                    $category_name = $row_category['name'];
                    if ($product->category_id == $category_id) {
                        echo "<option value='$category_id' selected>";
                    } else {
                        echo "<option value='$category_id'>";
                    }
                    echo "$category_name</option>";
                }
                echo "</select>";
                ?>
            </td>
        <tr>
            <td>Изображение</td>
            <td><img src="<?= $product->image ?>" alt=""></td>
        </tr>
        <tr>
            <td>Изменить изображение</td>
            <td><input type="file" name="image" /></td>
        </tr>
        </tr>
        <tr>
            <td></td>
            <td>
            <button type="submit" class="btn btn-primary">Обновить</button>
            </td>
        </tr>
    </table>
</form>


<?php 
require_once "layout_footer.php"
?>