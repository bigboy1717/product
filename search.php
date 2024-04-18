<?php
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

//Получение поискового запроса
$search_term = isset($_GET['s']) ? $_GET['s'] :'';

$page_title = "Вы искали \"{$search_term}\"";
require_once "layout_header.php";

//Запрос товаров
$stmt = $product->search($search_term, $from_record_num, $records_per_page);

//Указываем страницу, на которой используется пагинация
$page_url = "search.php?s={$search_term}&";

//подсчитываем общее кол-во строк - используется для разбивки на страницы
$total_rows = $product->countAll_BySearch($search_term);

//Шаблон для отображения списка товаров
require_once "read_template.php";

//Содержит наш JavaScript и закрывающие теги html
require_once "layout_footer.php";
?>