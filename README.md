# taiga_send
taiga_send

# Инсталяция
composer install

# Использование
Код лежит в work.php

Внутри параметры, которые необходимо прописать

$taigaUrl = 'http://xxx.com/'; //хост подключения для тайги
$login = 'xxx@gmail.com'; // логин для тайги
$pass = 'xxxx'; // пароль для тайги
$taigaAuthorId = 16;  //От какого автора создается (id)
//id пользователя находится легко - по выпадающим спискам
$taigaProjectId = 7; // В каком проект создается (id) 
//id проекта можно взять через slug $api->getProjectId($slug)

$name = 'Title'; //Название задачи
$msg = 'Message'; // Текст задачи
