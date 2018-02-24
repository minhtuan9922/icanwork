<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_05102017_create_table_service extends CI_Migration {

	protected $table = 'service';
	protected $fields;
	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->fields= [
			'service_id' 		=> [
           		'type'  			=>  'INT',
           		'constraint' 		=>	'11',
           		'unsigned'			=>	TRUE,
           		'auto_increment'	=>	TRUE
           	],
           	'name' 				=> [
           		'type'  			=>  'VARCHAR',
           		'constraint' 		=>	'255',
           		'null'				=>	TRUE,
           	],
           	'description' 		=> [
           		'type'  			=>  'TEXT',
           		'null'				=>	TRUE,
           	],
           	'admin_id_create' 	=> [
           		'type'  			=>  'INT',
           		'constraint' 		=>	'11',
           		'null'				=>	TRUE,
           	],
           	'admin_id_update' 	=> [
           		'type'  			=>  'INT',
           		'constraint' 		=>	'11',
           		'null'				=>	TRUE,
           	],
           	'date_create' 		=> [
           		'type'  			=>  'DATETIME',
           		'null'				=>	TRUE,
           	],
           	'date_update' 		=> [
           		'type'  			=>  'DATETIME',
           		'null'				=>	TRUE,
           	],
           	'lang' 			=> [
           		'type'  			=>  'INT',
           		'constraint' 		=>	'11',
           		'null'				=>	TRUE,
           	],
           	'status' 			=> [
           		'type'  			=>  'INT',
           		'constraint' 		=>	'11',
           		'null'				=>	TRUE,
           	],
		];
		$this->dbforge->add_field($this->fields);
		$this->dbforge->add_key('service_id', TRUE);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table($this->table,TRUE,$attributes);
	}

	public function down() {
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file 015_05102017_create_table_service.php */
/* Location: ./application/migrations/015_05102017_create_table_service.php */