# WebcomMediaGuestBook


<h3>Настройки</h3>
<hr size=1px>
1. Забираем проект с гита: git clone https://github.com/Chelestino/WebcomMediaGuestBook.git или zip-архив там же</br>
2. Открываем файл Bootstrap.php и передаем в переменные:</br>
                $dbParams = Ваши настройки подключения к БД</br>
                $absolutePath = абсолютный путь до корневой папки приложения(например http://localhost/WebcomMediaGuestBook/)
3. Далее создаем БД: Из корневой папки выполняем </br>
                vendor/bin/doctrine orm:schema-tool:create </br>
                vendor/bin/doctrine orm:schema-tool:update --force </br>
                или создаем БД из дампа( Лежит в корневой папке guestbook.sql)
