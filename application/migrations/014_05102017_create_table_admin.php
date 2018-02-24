<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_05102017_create_table_admin extends CI_Migration {

	protected $table = 'admin';
	protected $fields;
	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->fields= [
			'id' 				=> [
           		'type'  			=>  'INT',
           		'constraint' 		=>	'11',
           		'unsigned'			=>	TRUE,
           		'auto_increment'	=>	TRUE
           	],
           	'username' 			=> [
           		'type'  			=>  'VARCHAR',
           		'constraint' 		=>	'255',
           		'null'				=>	TRUE,
           	],
           	'password' 			=> [
           		'type'  			=>  'VARCHAR',
           		'constraint' 		=>	'255',
           		'null'				=>	TRUE,
           	],
           	'fullname' 			=> [
           		'type'  			=>  'VARCHAR',
           		'constraint' 		=>	'255',
           		'null'				=>	TRUE,
           	],
           	'admin_id_create' 	=> [
           		'type'  			=>  'INT',
           		'constraint' 		=>	'11',
           		'null'				=>	TRUE,
           	],
           	'date_create' 		=> [
           		'type'  			=>  'DATETIME',
           		'null'				=>	TRUE,
           	],
           	'status' 			=> [
           		'type'  			=>  'INT',
           		'constraint' 		=>	'11',
           		'null'				=>	TRUE,
           	],
           
		];
		$this->dbforge->add_field($this->fields);
		$this->dbforge->add_key('id', TRUE);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table($this->table,TRUE,$attributes);
	}

	public function down() {
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file 014_05102017_create_table_admin.php */
/* Location: ./application/migrations/014_05102017_create_table_admin.php */