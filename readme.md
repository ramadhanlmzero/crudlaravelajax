# Test CRUD Laravel dengan Ajax dan Highchart

## Tutorial Setup

1. Pastikan sudah terinstall composer untuk menginstall dependecies Laravel. Ketik pada terminal :
    ```
    composer install
    ```

2. Selanjutnya, buat duplikat file **.env.example** menjadi file **.env**. Bisa dengan cara manual atau dengan mengetik pada terminal :
    ```
    cp .env.example .env
    ```
   
3. Generate app key yang terenkripsi ke file **.env** dengan cara mengetik pada terminal :
    ```
    php artisan key:generate
    ```
   
4. Buat database baru, kosongan, tanpa isi.
   
5. Modifikasi *DB_HOST*, *DB_PORT*, *DB_DATABASE*, *DB_USERNAME*, dan *DB_PASSWORD* pada file **.env** sesuai database yang telah dibuat.
   
6. Migrasikan database dengan mengetik pada terminal :
    ```
    php artisan migrate
    ```
   
7. Setelah itu program dapat dijalankan dengan mengetik pada terminal :
    ```
    php artisan serve
    ```