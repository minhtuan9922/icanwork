<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_05102017_create_table_message extends CI_Migration {

	protected $table = 'message';
	protected $fields;
	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->fields= [
			'message_id' 		=> [
           		'type'  			=>  'INT',
           		'constraint' 		=>	'11',
           		'unsigned'			=>	TRUE,
           		'auto_increment'	=>	TRUE
           	],
           	'email_send' 		=> [
           		'type'  			=>  'VARCHAR',
           		'constraint' 		=>	'255',
           		'null'				=>	TRUE,
           	],
           	'email_receive' 	=> [
           		'type'  			=>  'VARCHAR',
           		'constraint' 		=>	'255',
           		'null'				=>	TRUE,
           	],
           	'title' 			=> [
           		'type'  			=>  'VARCHAR',
           		'constraint' 		=>	'255',
           		'null'				=>	TRUE,
           	],
           	'title' 			=> [
           		'type'  			=>  'VARCHAR',
           		'constraint' 		=>	'255',
           		'null'				=>	TRUE,
           	],
           	'content' 			=> [
           		'type'  			=>  'TEXT',
           		'null'				=>	TRUE,
           	],
           	'date_send' 	=> [
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
		$this->dbforge->add_key('message_id', TRUE);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table($this->table,TRUE,$attributes);
	}

	public function down() {
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file 017_05102017_create_table_message.php */
/* Location: ./application/migrations/017_05102017_create_table_message.php */