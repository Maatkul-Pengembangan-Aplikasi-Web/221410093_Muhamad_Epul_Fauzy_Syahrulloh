1. composer install
2. Salin .env.examplefile ke .envfolder root. Anda dapat mengetik copy .env.example .envjika menggunakan command prompt Windows atau cp .env.example .envjika menggunakan terminal, Ubuntu
Buka berkas Anda .envdan ubah nama basis data ( DB_DATABASE) menjadi apa pun yang Anda miliki, nama pengguna ( DB_USERNAME) dan DB_PASSWORDbidang kata sandi ( ) sesuai dengan konfigurasi Anda.
3. php artisan key:generate
4. hapus folder image di /public/image
5. php artisan storage:link
6. php artisan migrate
7. php artisan serve
8. npm install 

login = http://127.0.0.1:8000/login
register = http://127.0.0.1:8000/register
