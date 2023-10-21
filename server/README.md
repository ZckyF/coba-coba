# API POS Barqun

Projek ini adalah pembuatan API POS Barqun.

## Memulai

Instruksi di bawah ini akan membantu Anda menyalin proyek ini ke penyimpanan lokal Anda dan menjalankan API Laravel.

### Prasyarat

Sebelum memulai, pastikan Anda telah menginstal beberapa perangkat lunak berikut:

-   [Composer](https://getcomposer.org/)
-   [PHP](https://www.php.net/)
-   [MySQL](https://dev.mysql.com/) (Database boleh berbeda)

### Instalasi

1. Clone repositori ini ke komputer lokal Anda:

    ```bash
    git clone https://github.com/ZckyF/api-pos-barqun.git
    ```

2. Masuk ke folder 'api-pos-barqun':

    ```bash
    cd api-pos-barqun
    ```

3. Instal dependensi PHP menggunakan Composer:

    ```bash
    composer install
    ```

4. Salin file '.env.example' menjadi '.env':

    ```bash
    cp .env.example .env
    ```

5. Generate kunci aplikasi:

    ```bash
    php artisan key:generate
    ```

6. Buat database kosong (contoh nama database adalah 'pos_barqun').

7. Konfigurasi koneksi database Anda dengan mengedit file '.env':

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=pos_barqun
    DB_USERNAME=root
    DB_PASSWORD=
    ```

8. Migrasi database:

    ```bash
    php artisan migrate:fresh --seed
    ```

9. Jalankan server pengembangan Laravel:

    ```bash
    php artisan serve
    ```

Proyek ini akan berjalan di http://127.0.0.1:8000 (Jika tidak diubah port defaultnya). Anda dapat mengaksesnya melalui peramban web Anda.

## Open API

Untuk mengakses rute API, buka file pos-barqun.json, salin semua kontennya, lalu kunjungi [Swagger Editor](https://editor.swagger.io/). Kemudian tempelkan kontennya di dalam editor. Jika Anda memiliki ekstensi OpenAPI (Swagger Editor) dalam editor kode Anda, Anda juga dapat langsung menjalankan file tersebut.

## Lisensi

Proyek ini dilindungi oleh hak cipta dan hanya untuk penggunaan internal. Tidak ada izin untuk mendistribusikan, menyalin, atau menggunakan proyek ini tanpa izin tertulis dari pemilik hak cipta.
