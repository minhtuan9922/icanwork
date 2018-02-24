<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_05102017_create_table_language extends CI_Migration {

	protected $table = 'language';
	protected $fields;
	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->fields= [
			'lang_id' => [
           			'type'  			=>  'INT',
           			'constraint' 		=>	'11',
           			'unsigned'      =>  TRUE,
                'auto_increment'  =>  TRUE
           	],
           	'lang_name' => [
           			'type'  			=>  'VARCHAR',
           			'constraint' 		=>	'255',
           			'null'				=>	TRUE,
           	],
           	'lang_status' 	=> [
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
		$this->dbforge->add_key('lang_id', TRUE);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table($this->table,TRUE,$attributes);
	}

	public function down() {
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file 005_05102017_create_table_language.php */
/* Location: ./application/migrations/005_05102017_create_table_language.php */