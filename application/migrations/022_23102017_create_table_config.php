<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_23102017_create_table_config extends CI_Migration {

	protected $table = 'config';
	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$fields= [
			'key' 		=> [
           		'type'  			=>  'VARCHAR',
           		'constraint' 		=>	'150',
           	],
           	'value' 		=> [
           		'type'  			=>  'VARCHAR',
           		'constraint' 		=>	'255',
           		'null'				=>	TRUE,
           	],
		];
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('key', TRUE);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table($this->table,TRUE,$attributes);
	}

	public function down() {
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file 022_23102017_create_table_config.php */
/* Location: ./application/migrations/022_23102017_create_table_config.php */