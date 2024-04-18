<?php
// $page = isset($_GET['page']) ? $_GET['page'] : 1;
// $records_per_page = 5;
// $from_record_num = ($records_per_page * $page) - $records_per_page;
//Содержит переменные пагинации
require_once './config/core.php';
//файлы для работы с БД и файлы с объектами
require_once './config/database.php';
require_once './objects/product.php';
require_once './objects/category.php';

//получение соединения в БД
$database = new Database();
$db = $database->connect_pdo();

$product = new Product($db);
$category = new Category($db);

$page_title = "Вывод товаров";
require_once "layout_header.php";

//Получение товаров
$stmt = $product->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();

// Укажем страницу на которой используется пагинация
$page_url = "index.php?";

//Подсчет общего кол-ва строк (используется для разбивки на страницы)
$total_rows = $product->countAll();

//Контролирует, как ьудет отображаться список продуктов

require_once "read_template.php";

// //содержит наш JavaScript и закрывающие теги html
// require_once "layout_footer.php";
// $num = $stmt->rowCount();

?>

<!-- здесь будет контент -->
<div class="left-button-margin" style='width: 300px; height: 80px;'>
    <a href="create_product.php" class="btn btn-danger btn-block">Добавить товар</a>
</div>

<?php
//Отображаем товары, если они есть
if($num > 0){
    //Здесь будет пагинация
    //Страница, на которой используется пагинация
        $page_url = "index.php?";
        // подсчет всех товаров в базе данных, чтобы подсчитать общее кол-во страниц
        $total_rows = $product->countAll();
        //пагинация
        require_once 'paging.php';
}
//Сообщим пользователю, что товаров нет
else {
    echo "<div class='alert alert-info'>Товары не найдены.</div>";
}
?>

<?php //подвал
require_once "layout_footer.php"
?>