В корне проекта нужно набрать следующие команды:<br>
$<code>composer install</code><br>
$<code>npm install</code><br>
$<code>npm run dev</code><br>
$<code>docker-compose build</code><br>
$<code>docker-compose up -d</code><br>
$<code>docker-compose exec web /bin/bash</code> и внутри контейнера $<code>php artisan migrate</code><br>
После этого на порту 8181 снаружи появится веб-сервер
