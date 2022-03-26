
# Logistic API

### Instalasi 
Jalankan perintah berikut :
```bash
git clone https://github.com/wisnubaldas/tes-logistic.git
cd tes-logistic
composer install
cp .env.example .env
```
konfigurasi database pada file ``.env``
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=logistic
DB_USERNAME=wisnubaldas
DB_PASSWORD=password
```
lanjut, buat key
```bash
php artisan key-generate
php artisan migrate:fresh --seed
php artisan serve
```

### Endpoint API
- untuk melihat dokumentasi api, buka aplikasi dengan browser ```localhost:8000```
- login aplikasi path ```localhost:8000/api/**``` 
![enter image description here](https://github.com/wisnubaldas/tes-logistic/blob/51b36acf73bfdc8e51801ed2bc13e0e3e519a1d0/screenshot-localhost_8000-2022.03.26-13_57_59.png)
