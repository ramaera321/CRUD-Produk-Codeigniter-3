###################
Pengenalan Aplikasi
###################

Aplikasi CRUD Produk dibuat dan dikembangkan untuk melakukan proses CRUD data produk baik dari API maupun secara manual. Aplikasi ini dibangun menggunakan framework Codeigniter 3 serta beberapa library tambahan seperti Bootstrap untuk mempercantik tampilan aplikasi website dan sweetalert 2 untuk menampilkan pesan ketika melakukan proses CRUD data.

*******************
Fitur
*******************
![My Image](image1.jpg)

*  **Singkronisasi Data API**
Fitur ini dibuat untuk menyingkronkan data produk, kategori dan status yang diambil dari data api. Kemudian data tersebut dimasukkan kedalam tabel sesuai dengan data yang telah diambil. Fitur ini bisa digunakan dengan menekan tombol ~Singkronisasi~ pada bagian kanan atas disebelah tombol tambah data.

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
