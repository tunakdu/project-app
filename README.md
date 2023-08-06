<------------------------------>

git clone https://github.com/tunakdu/project-app.git

<------------------------------>

cd project-app

<------------------------------>

composer install --ignore-platform-reqs
Projeyi ayağa kaldırma

<------------------------------>

.env.example adlı dosyayı .env şeklinde değiştiriyoruz
DB ile ilgili kısmı şu şekilde güncelliyoruz.

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=project_app
DB_USERNAME=sail
DB_PASSWORD=password

<------------------------------>

sail up

<------------------------------>

php artisan key:generate

<------------------------------>

sail artisan migrate:fresh

<------------------------------>

sail artisan db:seed

<------------------------------>

sail artisan passport:install

<------------------------------>

Login işlemi için rastgele oluşan userlardan birinin mailini alıp şifresini 123456 yapmanız yeterli. Aşağıda paylaştığım postman collection adresinden login kısmına gelip tokenı alabilirsiniz.

https://www.postman.com/tunakdu/workspace/task-app/collection/14060286-272a5dde-58f3-439f-b473-79c303fb776b?action=share&creator=14060286
