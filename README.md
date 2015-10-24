# taiga_send
taiga_send

# Инсталяция
composer install

# Использование
Два варианта
1) Из консоли
php work_console.php <name of Issue> <text of Issue>

2) Код из work_example.php вставляется куда-нибудь в готовую систему php
заменяется в нем переменные $messageName и $messageText

#Настройка
Создаем файл config.php
Все параметры хранятся в файле config.php, созданного на основе config.php.dest

хост подключения для тайги
<pre>$taigaUrl = 'http://xxx.com/'; </pre>

логин для тайги
<pre>$login = 'xxx@gmail.com'; </pre>

пароль для тайги
<pre>$pass = 'xxxx'; </pre>

От какого автора создается (id)
<pre>$taigaAuthorId = 16;  </pre>
id пользователя находится легко - по выпадающим спискам

В каком проект создается (id) 
<pre>$taigaProjectId = 7; </pre>
id проекта можно взять через slug <pre>$api->getProjectId($slug)</pre>

