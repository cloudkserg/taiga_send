# taiga_send php script
Скрипт для создания issue в тайге

#Настройка
Создаем файл config.php
Все параметры хранятся в файле config.php, созданного на основе config.php.dest

#Запуск
Два варианта
1) Из консоли
php work_console.php <name of Issue> <text of Issue>

2) Код из work_example.php вставляется куда-нибудь в готовую систему php
заменяется в нем переменные $messageName и $messageText
