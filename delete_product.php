<?php
//Проверим было ли получено значение в $_POST
if($_POST){
    //подключаем файлы для работы с базой данных и файлы с объектами
    require_once './config/database.php';
    require_once './objects/product.php';

    //Получаем соединение с базой данных
    $database = new Database();
    $db = $database->connect_pdo();

    //Подготавливаем объекты Product
    $product = new Product($db);

    //Устанавливаем ID товара для удаления
    $product->id = $_POST['object_id'];

    //Удаляем товар
    if($product->delete()){
        echo "Товар был удалён.";
    }
    //если невозможно удалить товар
    else{
        echo "Невозможно удалить товар.";
    }
}
?>