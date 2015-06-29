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
4. Для корректной работы ЧПУ на Nginx необходимо в настройках server block проекта прописать:
</br> 
<code>
location ~ [^/]\.php(/|$) {
                limit_except GET HEAD POST { deny all; }

                fastcgi_split_path_info ^((?U).+\.php)(.*)$;

                try_files $fastcgi_script_name =404;

                set             $wtf              $fastcgi_path_info;
                fastcgi_param   PATH_INFO         $wtf;
                fastcgi_param   REQUEST_METHOD    $request_method;
                fastcgi_param   PATH_TRANSLATED   $document_root$fastcgi_script_name;
                fastcgi_param   SCRIPT_FILENAME   $request_filename;
                fastcgi_param   DOCUMENT_URI      $document_uri;

                fastcgi_pass unix:/var/run/php5-fpm.sock;
                fastcgi_index index.php;
        }
        
        </br>
  </code>      
        На apache работает без mod_rewrite
 
