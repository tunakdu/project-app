git clone https://github.com/tunakdu/project-app.git
cd project-app
Laravel Sail Kurulumu

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
Projeyi ayağa kaldırma

./vendor/bin/sail up
Artisan komut örneği

./vendor/bin/sail artisan migrate
Tabloların yüklenmesi

./vendor/bin/sail artisan db:seed
Tablolara örnek veri yüklenmesi

./vendor/bin/sail artisan passport:install
Passport aktivasyon

Login işlemi için oluşan userlardan birinin mailini alıp şifresini 123456 yapmanız yeterli. Aşağıda paylaştığım postman collection adresinden login kısmına gelip tokenı alabilirsiniz.

https://www.postman.com/tunakdu/workspace/task-app/collection/14060286-272a5dde-58f3-439f-b473-79c303fb776b?action=share&creator=14060286
