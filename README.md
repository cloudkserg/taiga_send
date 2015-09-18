# taiga_send
taiga_send

# Инсталяция
composer install

# Использование
Код лежит в work.php

Внутри параметры, которые необходимо прописать

//хост подключения для тайги
$taigaUrl = 'http://xxx.com/'; 

// логин для тайги
$login = 'xxx@gmail.com'; 

// пароль для тайги
$pass = 'xxxx'; 

//От какого автора создается (id)
$taigaAuthorId = 16;  
//id пользователя находится легко - по выпадающим спискам

// В каком проект создается (id) 
$taigaProjectId = 7; 
//id проекта можно взять через slug $api->getProjectId($slug)

$name = 'Title'; //Название задачи
$msg = 'Message'; // Текст задачи
