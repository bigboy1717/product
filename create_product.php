<?php

//Подключим файлы необходимые для подключения к базе данных и файлы с объектами
require_once './config/database.php';
require_once './objects/category.php';
require_once './objects/product.php';


//Получаем соединение с базой данных
$database = new Database();
$db = $database->connect_pdo();

//Создадим экземпляры классов Product и Category
$category = new Category($db);
$product = new Product($db);


//Установка заголовка страницы
$page_title = "Создание товара";
require_once "layout_header.php";
?>
<!--Здесь будет html-форма 'create product'-->

<!--Здесь будет PHP код-->
<?php
// Если форма была отправлена
if ($_POST) {
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->description = $_POST['description'];
    $product->category_id = $_POST['category_id'];

    $image = !empty($_FILES['image']['name'])?sha1_file($_FILES['image']['tmp_name'])."-" . basename($_FILES ['image']['name']):"";
    $product->image = $image;
    // создание товара
    if ($product->create()) {
        echo "<div class='alert alert-success'>Товар был успешно создан.</div>";
        echo $product->uploadPhoto();
    }
    // Если не удается создать товар, сообщим об это пользователю
    else {
        echo "<div class='alert alert-danger'>Невозможно создать товар.</div>";
    }
}
?>

<!--HTML-формы для создания товара-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Название</td>
            <td><input type="text" name="name" class='form-control' />
            </td>
        </tr>
        <tr>
            <td>Цена</td>
            <td><input type="text" name="price" class='form-control' />
            </td>
        </tr>
        <tr>
            <td>Описание</td>
            <td><textarea name="description" class="form-control"></textarea></td>
        </tr>
        <tr>
            <td>Категория</td>
            <td>
                <!-- здесь будут категории из базы данных -->
                <?php
                // Читаем категории товаров из базы данных
                $stmt = $category->read();
                // помещаем их в выпадающий список
                echo "<select class='form-control' name='category_id'>";
                echo "<option selected hidden>Выбрать категорию...</option>";

                while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row_category);
                    echo "<option value='{$id}'>{$name}</option>";
                }
                echo "</select>";
                ?>
            </td>
        </tr>
        <tr>
            <td>Изображение</td>
            <td><input type="file" name="image" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Создать
                </button>
            </td>
        </tr>
    </table>
</form>

<!--Здесь будет контент-->
<div class='right-button-margin'>
    <a href='index.php' class='btn btn-primary pull-right'>Просмотр всех товаров</a>
</div>

<?php
require_once "layout_footer.php";
?>