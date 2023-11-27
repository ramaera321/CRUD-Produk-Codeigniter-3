# Pengenalan Aplikasi

Aplikasi CRUD Produk dibuat dan dikembangkan untuk melakukan proses CRUD data produk baik dari API maupun secara manual. Aplikasi ini dibangun menggunakan framework Codeigniter 3 serta beberapa library tambahan seperti Bootstrap untuk mempercantik tampilan aplikasi website dan sweetalert 2 untuk menampilkan pesan ketika melakukan proses CRUD data.

## Fitur

![My Image](https://github.com/ramaera321/CRUD-Produk-Codeigniter-3/blob/master/image1.jpg)

*  **Singkronisasi Data API**
  
Fitur ini dibuat untuk menyingkronkan data produk, kategori dan status yang diambil dari data api. Kemudian data tersebut dimasukkan kedalam tabel sesuai dengan data yang telah diambil. Fitur ini bisa digunakan dengan menekan tombol `Singkronisasi` pada bagian kanan atas disebelah tombol tambah data.

*  **Memasukkan/membuat data (create data)**

Fitur ini dibuat untuk menambahkan data produk baru ke dalam database. Data yang ditambahakn harus memiliki Nama Produk, Kategori, Status dan Harga. Selain itu data Harga yang dimasukkan harus berupa angka, bukan character atau huruf. Fitur ini bisa digunakan dengan menekan tombol `Tambah Data` pada kanan atas, kemudian akan muncul `form input` untuk memasukkan data produk. Selanjutnya klik tombol `Save` untuk menyimpan data tersebut.

*  **Menampilkan/membaca data (read data)**
  
Fitur ini digunakan untuk menampilkan semua data produk yang telah dimasukkan ke dalam database. Data yang telah dimasukkan akan ditampulkan pada sebuah tabel data dimana data Nama Produk, Kategori, Harga dan Status akan ditampilkan pada tabel tersebut. Pada aplikasi ini, hanya data yang memiliki status bisa dibaca yang ditampilkan.

*  **Mengubah data (update data)**
  
Fitur ini digunakan untuk mengubah data produk di database. Data yang telah dimasukkan sebelumnya bisa diedit kembali apabila dirasa data tersebut mengalami perubahan data atau ada data yang tidak sesuai. Fitur ini bisa digunakan dengan menekan tombol `Edit` pada kolom aksi di bagian kanan setiap data yang ditampilkan. Kemudian akan muncul `form data` yang berisi data produk tersebut dan bisa diubah dengan data yang baru.

*  **Menghapus data (delete data)**
  
Fitur ini digunakan untuk menghapus data produk di database. Data yang tidak dibutuhkan bisa dihapus menggunakan fitur ini. Fitur ini bisa digunakan dengan menekan tombol `Hapus` pada kolom aksi di bagian kanan setiap data yang ditampilkan. Kemudian akan muncul `modal peringatan` untuk mengkonfirmasi aksi penghapusan data tersebut.

*  **Paginasi data (pagination)**
  
Fitur pagination digunakan untuk membagi data yang ditampilkan sehingga lebih rapi dan mudah dibaca. fitur ini berada di bawah tabel data. Anda bisa berpindah halaman untuk untuk melihat data yang lain dengan menekan tombol halaman tersebut.

## Instalasi
### Clone Project
Silakan _clone_ aplikasi `CRUD Produk` pada repository github ini. Bisa mendownload aplikasi dalam bentuk `.zip`. Atau _clone_ menggunakan link github dibawah ini.
```
git clone https://github.com/ramaera321/CRUD-Produk-Codeigniter-3.git
```
Setelah itu jalankan aplikasi `web server` yang anda gunakan untuk menjalankan project aplikasi `CRUD Produk` ini. Saya menggunakan aplikasi `web server` **Xampp Apache** untuk menjalankan aplikasi ini.

### Konfigurasi
Setelah project selesai diunduh(_clone_), selanjutnya perlu dilakukan penyesuaian/konfigurasi pada file `config.php` dan `database.php` pada folder `application/config/`.
Pada file `config.php` silakan sesuaikan _code_ dibawah ini dengan `base url` pada web server anda.
```
*/
$config['base_url'] = 'http://localhost:8080/CRUD-Produk-Codeigniter-3/';
/*
```
Selanjutnya pada file `database.php` silakan sesuaikan konfigurasi untuk koneksi database. pada project aplikasi ini menggunakan database `PostgreSQL` dengan nama database `db_produk_api`. Silakan sesuaikan _code_ dibawah ini dengan database yang anda gunakan.
```
$db['default'] = array(
	'dsn'	=> '',
	'port' => 5432,
	'hostname' => 'localhost',
	'username' => 'postgres',
	'password' => 'postgres',
	'database' => 'db_produk_api',
	'dbdriver' => 'postgre',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```

Setelah proses konfigurasi selesai, kemudian buat database menggunakan nama yang anda gunakan pada konfigurasi database sebelumnya. jika disamakan dengan konfigurasi bawaan project, maka silakan membuat database dengan nama `db_produk_api` menggunakan database `PostgreSQL`.

### Migrasi Tabel
Setelah proses konfigurasi dan pembuatan database telah selesai, selanjutnya lakukan proses migrasi tabel database dengan menjalankan `url` dibawah ini. sesuaikan `base url` yang anda gunakan, kemudian tambahkan url `/migration` dibelakangnya.
```
http://localhost:8080/CRUD-Produk-Codeigniter-3/migration
```
Setelah proses migrasi berhasil, pastikan pada database yang anda gunakan terdapat tabel `produk`, `kategori` dan `status`. jika tidak ada, silakan cek konfigurasi database anda kemudian jalankan perintah/url tersebut kembali.

### Run Project
Setelah proses migrasi telah selesai, anda bisa menjalankan aplikasi ini dengan mengakses `base url` yang sudah anda buat sebelumnya. jika menggunakan konfigurasi default/ konfigurasi awal project, anda bisa menjalankan `url` dibawah ini.
```
http://localhost:8080/CRUD-Produk-Codeigniter-3/
```
