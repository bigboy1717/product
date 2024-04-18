<?php
echo "<ul class='pagination'>";

//button для первой страницы
if ($page > 1) {
    echo "<li><a href='{$page_url}' title='Переход к первой странице.'>";
    echo "Первая";
    echo "</a></li>";
}

// подсчёт всех товаров в БД, чтобы подсчитать общее кол-во страниц
$total_pages = ceil($total_rows / $records_per_page);
// диапазон ссылок для отображения 
$range = 2;
// отображаем ссылки на 'диапазон страниц' вокруг 'текущей страницы' 
$initial_num = $page - $range;
$condition_limit_num = ($page + $range) + 1;

for ($x = $initial_num; $x < $condition_limit_num; $x++) {

    // убедимся, что '$x больше 0' и 'меньше или равно $total_pages' 
    if (($x > 0) && ($x <= $total_pages)) {

        // текущая страница 
        if ($x == $page) {
            echo "<li class='active'><a href=\"#\">$x <span class=\"sr-only\">(current)</span></a></li>";
        }

        // НЕ текущая страница 
        else {
            echo "<li><a href='{$page_url}page=$x'>$x</a></li>";
        }
    }
}

// ссылка на последнюю страницу 
if ($page < $total_pages) {
    echo "<li><a href='" . $page_url . "page={$total_pages}' title='Последняя страница из {$total_pages}.'>";
    echo "Последняя";
    echo "</a></li>";
}

echo "</ul>";