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

### View

Bagian/Halaman view digunakan untuk mengatur tampilan bagi pengguna. Pada bagian ini pengguna akan berinteraksi dengan projek aplikasi yang dibuat seperti membaca data produk, kategori dan status serta mengubah dan menghapus. Pada framework `Codeigniter 3` bagian view terdapat pada direktori `/application/views/`. Pada project ini hanya ada 1 halaman view dengan nama `welcome_message.php`.

Berikut merupakan potongan kode yang ada pada halaman view.

* **Menampilkan data pada tabel**
```
<table class="table table-striped table-bordered">
	<thead class="thead-dark">
		<tr>
			<th scope="col" width="5%" class="text-center">No.</th>
			<th scope="col" width="25%">Nama Produk</th>
			<th scope="col" width="15%">Kategori</th>
			<th scope="col" width="15%">Harga</th>
			<th scope="col" width="15%">Status</th>
			<th scope="col" width="20%" class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if(count($data_produk) != 0){
			foreach ($data_produk as $key => $produk){
		?>
			<tr>
				<th scope="row" class="text-center"><?= ++$key + $page; ?></th>
				<td><?= $produk->nama_produk; ?></td>
				<td><?= $produk->nama_kategori; ?></td>
				<td><?= $produk->harga; ?></td>
				<td><?= $produk->nama_status; ?></td>
				<td class="text-center">
					<button type="button" class="btn btn-sm btn-primary w-100 mb-2 btn-edit" data-id="<?= $produk->id_produk; ?>">Edit</button>
					<button type="button" class="btn btn-sm btn-danger w-100 btn-hapus" data-id="<?= $produk->id_produk; ?>">Hapus</button>
				</td>
			</tr>
		<?php 
			}
		}
		else {
		?>
			<tr>
				<td scope="row" class="text-center" colspan="6">Data kosong</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
```

Pada bagian ini data produk yang ada pada tabel produk akan ditampilkan menggunakan tabel data. Data yang diambil akan di _mapping_ menggunakan perintah `foreach` pada setiap baris tabel data. pada tabel ini pula terdapat tombol untuk melakukan pengubahan data produk dan penghapusan data produk.

* **Singkronisasi dan Tambah Data**
```
<div class="col-sm-6 text-right">
	<button type="button" class="btn btn-info" id="btn-singkronisasi">Singkronisasi Api</button>
	<button type="button" class="btn btn-success" id="btn-tambah">Tambah Produk</button>
</div>
```

Pada bagian ini terdapat tombol untuk melakukan singkronisasi dan tambah data produk baru. Pada bagian tombol `Singkronisasi` akan memanggil fungsi `jquery ajax` ketika diklik. Fungsi itulah yang akan memanggil fungsi pada `controller` untuk melaukan singkronisasi data produk, kategori dan status. Berikut potongan kode `jquery ajax` tersebut.
```
$('#btn-singkronisasi').click(function(){
	$.ajax({
		url: '<?php echo base_url() ?>welcome/singkronisasi/',
		method: 'get',
		dataType: 'json',
		success: function(response) {
			if(response.status == 200){
				Swal.fire({
					title: capitalize(response.message),
					text: "Silakan reload halaman ini!",
					icon: "success",
					confirmButtonColor: "#3085d6",
					confirmButtonText: "Reload"
				}).then((result) => {
					if (result.isConfirmed) {
						location.reload();
					}
				});
			} else if(response.status == 400){
				Swal.fire({
					title: capitalize(response.message),
					text: "Coba singkronisasi beberapa saat lagi.",
					icon: "error",
				});
			}
		}
	});
});
```

Kemudain pada tombol `Tambah Data` akan memanggil fungsi `jquery` untuk menampilkan form input data produk. Pada form itu pengguna dapat mengisikan data produk yang akan ditambahkan ke database. Pada form ini pula error ketika proses validasi data akan ditampilkan. Berikut potongan kode tersebut.

**kode ajax untuk menampilkan modal form input**
```
$('#btn-tambah').click(function(){
	let id = $(this).attr('data-id');
	$('#modal-title').html('Tambah Produk');
	$('#nama_produk').val(null);
	$('#harga').val(null);
	$('#status_id').val(null);
	$('#kategori_id').val(null);
	$('#id_produk').val(null);
	cleanForm();

	$('#insertData').modal('show');
	$('#form-data-produk').attr('action', '<?php echo base_url() ?>welcome/insert');
});
```

**kode html modal form input**
```
<div class="modal fade" id="insertData" tabindex="-1" aria-labelledby="insertDataLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<form method="POST" id="form-data-produk" action="">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modal-title">Tambah Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body px-4">
					<input type="hidden" name="id_produk" id="id_produk" value="">
					<div class="form-group">
						<label for="nama_produk">Nama Produk</label>
						<input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Masukkan nama produk">
						<div class="invalid-feedback" id="nama_produk_error">
						</div>
					</div>
					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select class="form-control" id="kategori_id" name="kategori_id">
							<option value="" selected disabled hidden>Pilih Kategori</option>
							<?php foreach($kategori as $k): ?>
								<option value="<?= $k->id_kategori; ?>"><?= $k->nama_kategori; ?></option>
							<?php endforeach; ?>
						</select>
						<div class="invalid-feedback" id="kategori_id_error">
						</div>
					</div>
					<div class="form-group">
						<label for="status">Status</label>
						<select class="form-control" id="status_id" name="status_id">
							<option value="" selected disabled hidden>Pilih Status</option>
							<?php foreach($status as $s): ?>
								<option value="<?= $s->id_status; ?>"><?= $s->nama_status; ?></option>
							<?php endforeach; ?>
						</select>
						<div class="invalid-feedback" id="status_id_error">
						</div>
					</div>
					<div class="form-group">
						<label for="harga">Harga</label>
						<input name="harga" type="text" class="form-control" id="harga" placeholder="Masukkan harga">
						<div class="invalid-feedback" id="harga_error">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="save-produk">Save</button>
				</div>
			</div>
		</form>
	</div>
</div>
```

Setelah form data produk telah dilengkapi, selanjutnya untuk menyimpan data tersebut bisa menekan tombol `Save' dimana tombol tersebut akan memanggil fungs `jquery ajax` untuk memanggil controller yang melakukan proses penyimpanan data. Berikut potongan kode tersebut.
```
$('#save-produk').click(function(){
	let formData = $('#form-data-produk');
	$.ajax({
		url: formData.attr('action'),
		method: 'post',
		data: formData.serialize(),
		dataType: 'json',
		success: function(response) {
			if(response.status == 200){
				Swal.fire({
					title: capitalize(response.message),
					text: "Silakan reload halaman ini!",
					icon: "success",
					confirmButtonColor: "#3085d6",
					confirmButtonText: "Reload"
				}).then((result) => {
					if (result.isConfirmed) {
						location.reload();
					}
				});
				$('#insertData').modal('hide');
			} else if(response.status == 400){
				for(var property in response.message){
					if(response.message[property] != ""){
						$(`#${property}`).addClass('is-invalid');
						$(`#${property}_error`).html(response.message[property]);
						$(`#${property}_error`).addClass('invalid-feedback');
					} else {
						$(`#${property}`).removeClass('is-invalid');
						$(`#${property}_error`).removeClass('invalid-feedback');
						$(`#${property}_error`).addClass('valid-feedback');
						$(`#${property}_error`).html("");
					}
				}
			}
		}
	});
});
```

* **Tombol Edit dan Hapus**

Tombol `Edit` akan memanggil fungsi `jquery` untuk menampilkan form edit data. Form tersebut akan menampilkan detail data yang akan diedit sehingga akan memudahkan pengguna untuk mengubah data yang sudah ada. Berikut potongan kode tersebut.

**kode fungsi jquery menampilkan form edit**
```
$('.btn-edit').click(function(){
	let id = $(this).attr('data-id');
	$.ajax({
		url: '<?php echo base_url() ?>welcome/findProduck/',
		method: 'get',
		data: {
			id: id
		},
		dataType: 'json',
		success: function(response) {
			const produk = response['produk'];

			$('#modal-title').html('Edit Produk');
			$('#nama_produk').val(produk['nama_produk']);
			$('#harga').val(produk['harga']);
			$('#status_id').val(produk['status_id']);
			$('#kategori_id').val(produk['kategori_id']);
			$('#id_produk').val(produk['id_produk']);
			cleanForm();

			$('#insertData').modal('show');
			$('#form-data-produk').attr('action', '<?php echo base_url() ?>welcome/update');
		}
	});
});
```

Kemudian untuk tombol hapus akan memanggil fungsi `jquery` untuk memanggil fungsi controller untuk menghapus data produk. Sebelum data benar-benar terhaapus, akan muncul alert konfirmasi apakah pengguna akan melanjutkan proses penghapusan atau tidak. Berikut potongan kode tersebut.

**menampilkan alert konfirmasi**
```
$('.table').on('click', '.btn-hapus', function() {
	id = $(this).attr('data-id');
	$('#myModalDelete').modal('show');
});
```

**modal alert konfirmasi**
```
<div class="modal fade" id="myModalDelete" tabindex="-1" aria-labelledby="myModalDeleteLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalDeleteLabel">Konfirmasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				Anda ingin menghapus data ini?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-danger" id="btdelete">Lanjutkan</button>
			</div>
		</div>
	</div>
</div>
```

**fungsi ajax untuk memanggil fungsi controller**
```
$('#btdelete').click(function() {
	$.ajax({
		url: '<?php echo base_url() ?>welcome/delete/',
		method: 'get',
		data: {
			id: id
		},
		dataType: 'json',
		success: function(response) {
			$('#myModalDelete').modal('hide');
			if(response.status == 200){
				Swal.fire({
					title: capitalize(response.message),
					text: "Silakan reload halaman ini!",
					icon: "success",
					confirmButtonColor: "#3085d6",
					confirmButtonText: "Reload"
				}).then((result) => {
					if (result.isConfirmed) {
						location.reload();
					}
				});
			} else if(response.status == 400){
				Swal.fire({
					title: capitalize(response.message),
					text: "Coba hapus produk beberapa saat lagi.",
					icon: "error",
				});
			}
		}
	});
});
```

* **Clear Form Input**

Pada halaman view `welcome_message` juga terdapat potongan kode untuk membersihkan form input dari pesan error maupun data yang sebelumnya telah ditampilkan (ketika melakukan edit data). Berikut potongan kode `clearForm()`.
```
function cleanForm(){
	$(`#nama_produk`).removeClass('is-invalid');
	$(`#nama_produk_error`).removeClass('invalid-feedback');
	$(`#nama_produk_error`).html('');
	$(`#kategori_id`).removeClass('is-invalid');
	$(`#kategori_id_error`).removeClass('invalid-feedback');
	$(`#kategori_id_error`).html('');
	$(`#status_id`).removeClass('is-invalid');
	$(`#status_id_error`).removeClass('invalid-feedback');
	$(`#status_id_error`).html('');
	$(`#harga`).removeClass('is-invalid');
	$(`#harga_error`).removeClass('invalid-feedback');
	$(`#harga_error`).html('');
}
```

### Controller

Controller merupakan bagian yang menjembatani antara `model` dan `view`. bagian ini digunakan untuk membuat _method_ yang akan menjembatani bagian `view` dalam mengelola data melalui bagian `model`. Pada projek ini ada 2 contoller yakni `Welcome.php` dan `Migration.php`.

**1. Migration.php**

Pada controller ini hanya terdapat 1 _method_ yakni _method_ `index()` yang mana digunakan untuk melakukan proses migrasi dari file migrasi yang ada pada direktori `/application/migrations`. Berikut potongan kode pada _method_ `index()`.
```
public function index() { 
        $this->load->library('migration');
        if ($this->migration->latest() === FALSE)
        {
            echo $this->migration->error_string();
        }else{
            $this->session->sess_destroy();
            echo "Table Migrated Successfully.";
        }
    }
```

**2. Welcome.php**

Controller ini digunakan untuk menjembatani pengolahan data produk. selain itu controller ini diatur sebagai controller _default_ yang akan dipanggil pertama kali ketika `base url` dijalankan. Ada beberapa _method_ pada controller ini yakni :

* **index()**

_Method_ ini akan dipanggil secara otomatis ketika kita menjalankan/memanggil controller `Welcome.php`. _method_ ini digunakan untuk menampilkan halaman 'welcome_message.php` serta memanggil data produk beserta relasi data status dan data kategori yang kemudian akan dikirimkan menuju halaman `welcome_message.php`. Berikut potongan kode pada _method_ `index()`.
```
public function index()
{
	$Produk_model = $this->Produk_model;
	$this->load->library('pagination');

	$config['base_url'] = site_url('welcome/');
	$config['total_rows'] = count($Produk_model->getWithJoinTable(
		'*',
		[
			['id' => 'id_kategori', 'name' => 'kategori'], 
			['id' => 'id_status', 'name' => 'status']
		],
		null,
		null,
		[
			['table' => 'status', 'column' => 'nama_status', 'value' => 'bisa dijual']
		], 
	));
	$config['per_page'] = 10;
	$config['uri_segment'] = 2;
	$choice = $config["total_rows"] / $config["per_page"];
	$config["num_links"] = floor($choice);

	$config['first_link']       = 'First';
	$config['last_link']        = 'Last';
	$config['next_link']        = 'Next';
	$config['prev_link']        = 'Prev';
	$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
	$config['full_tag_close']   = '</ul></nav></div>';
	$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	$config['num_tag_close']    = '</span></li>';
	$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	$config['next_tag_close']  	= '<span aria-hidden="true"></span></span></li>';
	$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	$config['prev_tag_close']  	= '</span></li>';
	$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	$config['first_tag_close'] 	= '</span></li>';
	$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	$config['last_tag_close']  	= '</span></li>';

	$this->pagination->initialize($config);
	$data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	$data['data_produk'] = $Produk_model->getWithJoinTable(
		'*',
		[
			['id' => 'id_kategori', 'name' => 'kategori'], 
			['id' => 'id_status', 'name' => 'status']
		],
		$config["per_page"], 
		$data['page'],	
		[
			['table' => 'status', 'column' => 'nama_status', 'value' => 'bisa dijual']
		], 
	);
	$data['pagination'] = $this->pagination->create_links();
	$data['kategori'] = $this->Kategori_model->getAll();
	$data['status'] = $this->Status_model->getAll();

	$this->load->view('welcome_message', $data);
}
```

Selain itu pada _mothod_ `index()` juga terdapat konfigurasi untuk paginasi data produk yang akan ditampilkan.

* **singkronisasi()**

_Method_ ini digunakan untuk melakukan proses singkronisasi produk dari api. Pada _method_ pula dilakukan _generate_ username dan password untuk pengambilan data api. setelah data produk dari api didapatkan, maka selanjutnya data tersebut akan _dimapping_ dan dikelompokkan menjadi data kategori, data status dan data produk. setelah itu _method_ `singkronisasi()` akan memanggil fungsi pada model untuk melakukan penyimpanan data. Berikut potongan kode pada _method_ `singkronisasi()`.
```
public function singkronisasi(){
	date_default_timezone_set("Asia/Jakarta");
	$hours = date('H');
	$minutes = date('i');
	$hours = ($minutes > 1 ? $hours + 1 : $hours);
	$username = 'tesprogrammer' . date('dmy') . 'C' . ($hours < 10 ? '0' . $hours : $hours) ;
	$password = 'bisacoding-' . date('d-m-y');

	$this->db->trans_begin();

	$api = $this->getData($username, md5($password));
	$data_status = $this->getUniqueData('status', $api->data, 'db', 'nama_status');
	$data_kategori = $this->getUniqueData('kategori', $api->data, 'db', 'nama_kategori');
	$data_id = $this->getUniqueData('id_produk', $api->data, 'db', 'id_produk', true);
	$Produk = $this->Produk_model;
	$Kategori = $this->Kategori_model;
	$Status = $this->Status_model;

	if(count($data_kategori) != 0){
		$Kategori->saveBatch($data_kategori);
	}
	if(count($data_status) != 0){
		$Status->saveBatch($data_status);
	}

	$status_produk = $Produk->apiSave($api->data, $data_id);

	if ($this->db->trans_status() === FALSE && $status_produk)
	{
		$this->db->trans_rollback();
		$data['status'] = 400;
		$data['message'] = 'gagal singkronisasi data';

		echo json_encode($data);
	}
	else
	{
		$this->db->trans_commit();
		$data['status'] = 200;
		$data['message'] = 'berhasil singkronisasi data';

		echo json_encode($data);
	}

}
```

* **insert()**

_Method_ `insert()` digunakan untuk proses penyimpanan data dimana method ini akan memanggil fungsi `rules()` pada model `Produk_model` untuk memvalidasi data yang dikirimkan. Apabila data tersebut tidak sesuai, maka _method_ ini akan mengembalikan pesan error dari proses validasi tersebut. Apabila data yang dikirimkan sesuai dengan rules validasi, maka selanjutnya _method_ `insert()` akan memanggil fungsi `save()` pada model `Produk_model` untuk menyimpan data produk. Berikut potongan kode pada _method_ `insert()`.
```
public function insert(){
	$Produk = $this->Produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($Produk->rules());
        
        if ($validation->run()) {
            	$Produk->save();
		$data['status'] = 200;
		$data['message'] = 'Berhasil insert data produk';
		echo json_encode($data);
        } else {
		$data['status'] = 400;
		foreach($_POST as $key => $value){
			$data['message'][$key] = form_error($key);
		}
			$data['message']['kategori_id'] = form_error('kategori_id');
			$data['message']['status_id'] = form_error('status_id');

		echo json_encode($data);
	}
}
```

* **update()**

_Method_ `update()` memliki alur yang hampir sama dengan _method_ `insert()`. Dimana _method_ ini akan melakukan validasi data yang dikirimkan. Apabila data yang dikirmkan sesuai dengan rule makan akan disimpan, dan apabila data tidak sesuai dengan rule validasi makan _method_ akan mengembalikan pesan error dari proses validasi tersebut. Berikut potongan kode pada _method_ `update()`.
```
public function update(){
	$Produk = $this->Produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($Produk->rules());
        
        if ($validation->run()) {
            	$Produk->update();
            
		$data['status'] = 200;
		$data['message'] = 'Berhasil update data produk';
		echo json_encode($data);
        } else {
		$data['status'] = 400;
		foreach($_POST as $key => $value){
			$data['message'][$key] = form_error($key);
		}
			$data['message']['kategori_id'] = form_error('kategori_id');
			$data['message']['status_id'] = form_error('status_id');

		echo json_encode($data);
	}
}
```

* **findProduk()**

_Method_ `findProduk()` digunakan untuk memanggil fungsi `getById()` pada model `Produk_model` yang mana fungsi tersebut akan mengambil sebuah data produk berdasarkan `id_produk` yang dikirimkan. _Method_ ini dipanggil untuk menampilkan data produk sebelum data tersebut diubah pada halaman `welcome_message.php`. Berikut potongan kode pada _method_ `findProduk()`.
```
public function findProduck(){
	$Produk_model = $this->Produk_model;
	$id = $this->input->get('id');
	$data['produk'] = $Produk_model->getById($id);

	$this->output->set_output(json_encode($data));
}
```

* **delete()**

_Method_ `delete()` digunakan untuk memanggil fungsi `delete()` pada model `Produk_model` yang berfungsi untuk menghapus data produk. _Method_ ini akan menerima data `id_produk` yang dikirimkan dan kemudian _method_ `delete()` akan memanggil fungs `delete()` pada model `Produk_model` untuk menghapus data tersebut. Berikut potongan kode pada _method_ `delete()`.
```
public function delete()
{
        $id = $this->input->get('id');
        if (!isset($id)) show_404();

	$this->db->trans_begin();
        $this->Produk_model->delete($id);
    
	if ($this->db->trans_status() === FALSE)
	{
		$this->db->trans_rollback();
		$data['status'] = 400;
		$data['message'] = 'gagal insert data';

		echo json_encode($data);
	}
	else
	{
		$this->db->trans_commit();
		$data['status'] = 200;
		$data['message'] = 'berhasil insert data';

		echo json_encode($data);
	}
}
```

### Kontak

Apabila ada pertanyaan mengenai projek ini bisa hubungi saya pada kontak dibawah ini.

* ramaera321@gmail.com

