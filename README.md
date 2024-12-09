1git clone https://github.com/Maatkul-Pengembangan-Aplikasi-Web/221410093_Muhamad_Epul_Fauzy_Syahrulloh.git

2. composer install
3. Salin .env.examplefile ke .envfolder root. Anda dapat mengetik copy .env.example .envjika menggunakan command prompt Windows atau cp .env.example .envjika menggunakan terminal, Ubuntu
Buka berkas Anda .envdan ubah nama basis data ( DB_DATABASE) menjadi apa pun yang Anda miliki, nama pengguna ( DB_USERNAME) dan DB_PASSWORDbidang kata sandi ( ) sesuai dengan konfigurasi Anda.
4. php artisan key:generate
5. hapus folder image di /public/image
6. php artisan storage:link
7. php artisan migrate
8. php artisan serve
9. npm install 

url login = http://127.0.0.1:8000/login
url register = http://127.0.0.1:8000/register
