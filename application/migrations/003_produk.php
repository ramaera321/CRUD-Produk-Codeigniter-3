<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
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