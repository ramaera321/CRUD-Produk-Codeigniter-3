# Aplikasi CRUD Produk
## Pengenalan Aplikasi

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

## Kode dan Program
### Migrasi Tabel
Setiap data yang digunakan pada project ini disimpan pada sebuah database yang didalamnya terdapat beberapa tabel data untuk menyimpan data berdasarkan kategori data tersebut. Untuk membuat tabel data, project ini menggunakan fitur `migrasi` pada framework `Codeigniter 3` sehingga tidak perlu membuat data tabel secara manual.

Kode program untuk melakukan migrasi disimpan pada direktori `/application/migrations/`, pada direktori tersebut terdapat 3 file migrasi yaitu :
* **001_status.php**

Pada file ini terdapat class `Migration_Status` yang memiliki _method_ `up()`. _Method_ tersebut digunakan untuk membuat sebuah tabel status yang memiliki kolom `id_status` dan `nama_status`. Berikut _code_ yang terdapat pada class `Migration_Status`.
```
class Migration_Status extends CI_Migration { 
    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }
    public function up() { 
        $this->dbforge->add_field(array(
            'id_status' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'nama_status' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ),
        ));
        $this->dbforge->add_key('id_status', TRUE);
        $this->dbforge->create_table('status');
    }

    public function down()
    {
        $this->dbforge->drop_table('status');
    }
}
```

* **002_kategori.php**

Pada file ini terdapat class `Migration_Kategori` yang memiliki _method_ `up()`. _Method_ tersebut digunakan untuk membuat sebuah tabel status yang memiliki kolom `id_kategori` dan `nama_kategori`. Berikut _code_ yang terdapat pada class `Migration_Kategori`.
```
class Migration_Kategori extends CI_Migration { 
    public function __construct()
    {
        $this->load->dbforge();
        $this->load->database();
    }
    public function up() { 
        $this->dbforge->add_field(array(
            'id_kategori' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'nama_kategori' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '100'
            ),
        ));
        $this->dbforge->add_key('id_kategori', TRUE);
        $this->dbforge->create_table('kategori');
    }

    public function down()
    {
        $this->dbforge->drop_table('kategori');
    }
}
```

* **002_produk.php**

Pada file ini terdapat class `Migration_Produk` yang memiliki _method_ `up()`. _Method_ tersebut digunakan untuk membuat sebuah tabel status yang memiliki kolom `id_produk`, `nama_produk`, `harga`, `kategori_id` dan `status_id`. Berikut _code_ yang terdapat pada class `Migration_Produk`.
```
class Migration_Produk extends CI_Migration { 

        public function __construct()
        {
                $this->load->dbforge();
                $this->load->database();
        }

        public function up() { 
                $this->dbforge->add_field(array(
                'id_produk' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 5,
                        'unsigned' => TRUE,
                        'auto_increment' => FALSE
                ),
                'nama_produk' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '255'
                ),
                'harga' => array(
                        'type' => 'INT',
                        'constraint' => 11
                ),
                'kategori_id' => array(
                        'type' => 'INT',
                        'constraint' => 5
                ),
                'status_id' => array(
                        'type' => 'INT',
                        'constraint' => 5
                ),
                ));
                $this->dbforge->add_key('id_produk', TRUE);
                $this->dbforge->create_table('produk');
        }

        public function down()
        {
                $this->dbforge->drop_table('produk');
        }
}
```

### Model
File model berisikan class model yang mempresentasikan sebuah data yang akan disimpan pada sebuah tabel. Class model biasanya digunakan untuk mengelola data yang akan disimpan pada sebuah tabel pada database seperti proses `menyimpan`, `membaca`, `mengubah` serta `menghapus` data. Dengan adanya class model ini, kita akan lebih mudah melakukan pengelolaan data pada sebuah tabel. Biasanya model dibuat sesuai dengan tabel yang dibuat pada database. Berikut model yang dibuat pada projek ini :
**1. Status_model.php**

Class `Status_model` digunakan untuk mengelola data status yang didapatkan dari `api`. pada class tersebut memiliki beberapa _method_ seperti _method_ `getAll()` untuk mengambil semua data status, _method_ `saveBatch` untuk menyimpan beberapa data status (multiple data). Berikut _code_ yang ada pada class `Status_model`.
```
class Status_model extends CI_Model{
    private $table = 'status';

    public function getAll(){
        $this->db->from($this->table);
        $this->db->order_by("id_status", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function saveBatch($data)
    {
        if($this->db->insert_batch($this->table, $data)){
            if($this->session->userdata('status')){
                $this->session->unset_userdata('status');
            }
            $status = $this->toArray($this->getAll(), 'nama_status', 'id_status');
            $this->session->set_userdata(['status' => $status]);
            return true;
        } else {
            return false;
        }
    }

}
```
  
**2. Kategori_model.php**

Class `Kategori_model` digunakan untuk mengelola data kategori yang didapatkan dari `api`. pada class tersebut memiliki beberapa _method_ seperti _method_ `getAll()` untuk mengambil semua data kategori, _method_ `saveBatch` untuk menyimpan beberapa data kategori (multiple data). Berikut _code_ yang ada pada class `Kategori_model`.
```
class Kategori_model extends CI_Model{
    private $table = 'kategori';

    public function getAll(){
        $this->db->from($this->table);
        $this->db->order_by("id_kategori", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function saveBatch($data)
    {
        if($this->db->insert_batch($this->table, $data)){
            if($this->session->userdata('kategori')){
                $this->session->unset_userdata('kategori');
            }
            $kategori = $this->toArray($this->getAll(), 'nama_kategori', 'id_kategori');
            $this->session->set_userdata(['kategori' => $kategori]);
            return true;
        } else {
            return false;
        }
    }

}
```

**3. Produk_model.php**

Pada class `Produk_model` terdapat beberapa _mothod_ yang digunakan untuk mengelola data produk. Beberapa _method_ yang digunakan pada class `Produk_model` adalah sebagai berikut :

* **rules()**

Digunakan untuk melakukan validasi form yang digunakan untuk menambahkan data produk sehingga data yang disimpan sesuai dengan ketentuan yang diinginkan.
```
public function rules()
    {
        return [
            [
                'field' => 'nama_produk',
                'label' => 'Nama Produk',
                'rules' => 'required'
            ],
            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'kategori_id',
                'label' => 'Kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'status_id',
                'label' => 'Status',
                'rules' => 'required'
            ],
        ];
    }
```

* **getById()**

Digunakan untuk mengambil data produk berdasarkan data `id_produk` tertentu.
```
public function getById($id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('status', 'status.id_status = ' . $this->table . '.status_id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = ' . $this->table . '.kategori_id', 'left');
        $this->db->where('id_produk', $id);

        return $this->db->get()->row();
    }
```

* **apiSave()**

Digunakan untuk mengelola data produk yang diambil dari api yang kemudian data tersebut akan disimpan kedalam tabel produk.
```
public function apiSave($data, $data_id){
        $array_data = array();
        $kategori = $this->session->userdata('kategori');
        $status = $this->session->userdata('status');
        foreach($data as $d) {
            if(in_array($d->id_produk, $data_id)){
                $dt = array(
                    'id_produk' => $d->id_produk,
                    'nama_produk' => $d->nama_produk,
                    'harga' => $d->harga,
                    'kategori_id' => array_search($d->kategori, $kategori),
                    'status_id' => array_search($d->status, $status),
                );
                
                array_push($array_data, $dt);
            }
        }

        if(count($array_data) != 0) {
            if($this->saveBatch($array_data)){
                return true;
            }
        }
        
        return false;      
    }
```

* **saveBatch()**

Digunakan untuk menyimpan beberapa data produk (multiple data). _Method_ ini pula yang dipanggil pada _method_ `saveApi()` untuk digunakan menyimpan beberapa data yang diambil dari api. Selain itu pada _method_ ini juga terdapat baris kode untuk menyimpan data produk pada session.
```
public function saveBatch($data)
    {
        if($this->db->insert_batch($this->table, $data)){
            if($this->session->userdata('produk')){
                $this->session->unset_userdata('produk');
            }
            $produk = $this->toArray($this->getAll(), 'id_produk', 'id_produk');
            $this->session->set_userdata(['id_produk' => $produk]);
            return true;
        } else {
            return false;
        }
    }
```

* **getWithJoinTable()**

Digunakan untuk mengambil semua data produk beserta relasi data status dan data kategori yang ada produk tersebut.
```
public function getWithJoinTable($select, array $table_join, $limit = null, $start = null, array $where = array()){
        $this->db->select($select);
        $this->db->from($this->table);
        foreach($table_join as $table){
            $this->db->join($table['name'], $table['name'] . '.' . $table['id'] . ' = ' . $this->table . '.' . $table['name'] . '_id', 'left');
        }
        if($where != null){
            foreach($where as $w){
                $this->db->where($w['table'] . '.' . $w['column'], $w['value']);
            }
        }
        if($limit != null){
            $this->db->limit($limit, $start);
        }
            $this->db->order_by('id_produk', 'DESC');
        return $this->db->get()->result();
    }
```

* **getAll()**

Digunakan untuk mengambil semua data produk tanpa relasi data.
```
public function getAll(){
        $this->db->from($this->table);
        $this->db->order_by("id_produk", "desc");
        $query = $this->db->get();
        return $query->result();
    }
```

* **save()**

Digunakan untuk menyimpan data produk yang diinputkan melalui form data produk yang ada pada halaman frontend aplikasi.
```
public function save()
    {
        $this->db->select('id_produk');
        $this->db->from($this->table);
        $this->db->like("id_produk", "%-M");
        $this->db->order_by("id_produk", "DESC");
        $this->db->limit(1);
        $query = $this->db->get()->row();
        if($query == null) {
            $id_produk = 1;
        } else {
            $dt_array = explode("-", $query->id_produk);
            $id_produk = $dt_array[0] + 1;
        }
        $data = array(
            "id_produk" => $id_produk . '-M',
            "nama_produk" => $this->input->post('nama_produk'),
            "harga" => $this->input->post('harga'),
            "kategori_id" => $this->input->post('kategori_id'),
            "status_id" => $this->input->post('status_id'),
        );
        if($this->db->insert($this->table, $data)){
            if($this->session->userdata('produk')){
                $this->session->unset_userdata('produk');
            }
            $produk = $this->toArray($this->getAll(), 'id_produk', 'id_produk');
            $this->session->set_userdata(['id_produk' => $produk]);
            return true;
        } else {
            return false;
        }
    }
```

* **update()**

Digunakan untuk mengubah data produk yang telah ada sebelumnya.
```
public function update()
    {
        $data = array(
            "nama_produk" => $this->input->post('nama_produk'),
            "harga" => $this->input->post('harga'),
            "kategori_id" => $this->input->post('kategori_id'),
            "status_id" => $this->input->post('status_id'),
        );
        return $this->db->update($this->table, $data, array('id_produk' => $this->input->post('id_produk')));
    }
```

* **delete()**

Digunakan untuk menghapus data produk berdasarkan `id_produk` tertentu yang tidak diperlukan lagi.
```
public function delete($id)
    {
        return $this->db->delete($this->table, array("id_produk" => $id));
    }
```
