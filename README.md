*UNTUK INSTALL*
buat folder untuk menyimpan codingan hasil cloning
lalu buka cmd di folder yang telah di buat
git clone https://github.com/ripaldi04/bina_haramain.git
cd bina_haramain
npm install
composer install
code .
copy .env.example .env
sesuaikan .env nya
php artisan key:generate
php artisan storage:link

*UNTUK MENJALANKAN*
npm run dev
php artisan serve
