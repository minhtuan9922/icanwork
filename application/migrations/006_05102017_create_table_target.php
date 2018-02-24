<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_05102017_create_table_target extends CI_Migration {

	protected $table = 'target';
	protected $fields;
	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->fields= [
			'target_id' => [
           			'type'  			=>  'INT',
           			'constraint' 		=>	'11',
           			'unsigned'			=>	TRUE,
           			'auto_increment'	=>	TRUE
           	],
           	'target_name' => [
           			'type'  			=>  'VARCHAR',
           			'constraint' 		=>	'255',
           			'null'				=>	TRUE,
           	],
           	'target_status' 	=> [
           			'type'  			=>  'INT',
           			'constraint' 		=>	'11',
           			'null'				=>	TRUE,
           	],
           	'lang'  	=> [
           			'type'  			=>  'INT',
           			'constraint' 		=>	'11',
           			'null'				=>	TRUE,
           	],
		];
		$this->dbforge->add_field($this->fields);
		$this->dbforge->add_key('target_id', TRUE);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table($this->table,TRUE,$attributes);
	}

	public function down() {
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file 006_05102017_create_table_target.php */
/* Location: ./application/migrations/006_05102017_create_table_target.php */