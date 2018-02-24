<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_05102017_create_table_account extends CI_Migration {

	protected $fields;
	protected $table = 'account';

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->fields= [
				'email' 			=> [
	           			'type'  			=> 'VARCHAR',
	           			'constraint' 		=> '150',
	           	],
	           	'password' 			=> [
	           			'type'  			=> 'VARCHAR',
	           			'constraint' 		=> '255',
	           	],
	           	'active_code' 		=> [
	           			'type'  			=> 'VARCHAR',
	           			'constraint' 		=> '255',
	           			'null'				=> TRUE,
	           	],
	           	'type' 				=> [
	           			'type'  			=> 'INT',
	           			'unsigned'			=> TRUE,
	           			'null'				=> TRUE,
	           	],
	           	'date_create' 	=> [
			           	'type'  			=> 'DATETIME',
			           	'null'				=> TRUE,
	           	],
	            'status'  			=> [
	                	'type'        		=> 'INT',
	                	'unsigned'			=> TRUE,
	                	'constraint'    	=> '11',
	                	'null'        		=> TRUE,
	            ]
		];
		$this->dbforge->add_field($this->fields);
		$this->dbforge->add_key('email', TRUE);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table($this->table,TRUE,$attributes);
		$sql = "ALTER TABLE `account` CHANGE `status` `status` INT(11) NULL DEFAULT NULL COMMENT '0:not active, 1:account normal, 2:account leve 1'";
		$this->db->query($sql);
		$sql = "ALTER TABLE `account` CHANGE `type` `type` INT(11) NULL DEFAULT NULL COMMENT '1:candidate, 2:recruit'";
		$this->db->query($sql);
	}

	public function down() {
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file 001_05102017_create_table_user.php */
/* Location: ./application/migrations/001_05102017_create_table_user.php */