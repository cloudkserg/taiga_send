# taiga_send
taiga_send

# Инсталяция
composer install

# Использование
Код лежит в work.php

Внутри параметры, которые необходимо прописать

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

Название задачи
<pre>$name = 'Title'; </pre>
Текст задачи
<pre>$msg = 'Message'; </pre>
