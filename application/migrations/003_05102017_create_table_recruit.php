<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_05102017_create_table_recruit extends CI_Migration {

	protected $fields;
	protected $table = 'recruit';

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->fields= [
			'recruit_id' 		        => [
           		'type'  			    => 'INT',
           		'constraint' 		  => '254',
           		'unsigned'			  => TRUE,
           		'auto_increment'	=> TRUE,
           	],
           	'account_email' 	=> [
           		'type'  			    => 'VARCHAR',
           		'constraint' 		  => '150',
           	],
           	'name_company' 		=> [
           		'type'  			    => 'VARCHAR',
           		'constraint' 		  => '255',
           		'null'				    => TRUE,
           	],
           	'logo' 				    => [
           		'type'  			    => 'TEXT',
           		'null'				    => TRUE,
           	],
           	'phone_company' 	=> [
           		'type'  			    => 'VARCHAR',
           		'constraint' 		  => '255',
           		'null'				    => TRUE,
           	],
            'description'     => [
              'type'           => 'TEXT',
              'null'           => TRUE,
            ],
           	'city' 				    => [
           		'type'  			   => 'INT',
           		'constraint' 		 => '11',
           		'null'				   => TRUE,
           	],
           	'birthday_company'=> [
           		'type'  			   => 'DATE',
           		'null'				   => TRUE,
           	],
           	'address_company' => [
           		'type'  			    => 'VARCHAR',
           		'constraint' 		  => '255',
           		'null'				    => TRUE,
           	],
           	'scale' 			   => [	//Qui mô công ty
           		'type'  			    => 'INT',
           		'constraint' 		  => '11',
           		'null'				    => TRUE,
           	],
           	'fax' 				  => [	
           		'type'  			    => 'VARCHAR',
           		'constraint' 		  => '255',
           		'unsigned'			  => TRUE,
           		'null'				    => TRUE,
           	],
           	'website' 			=> [	
           		'type'  			    => 'VARCHAR',
           		'constraint' 		  => '255',
           		'unsigned'			  => TRUE,
           		'null'				    => TRUE,
           	],
           	'user_contact_json' 	=> [	//người liên hệ : tên , email , sdt
           		'type'  			    => 'TEXT', 
           		'null'				    => TRUE,
           	],
           	'date_update' 		=> [
		        'type'  			     => 'DATETIME',
		        'null'				     => TRUE,
           	],
		];
		$this->dbforge->add_field($this->fields);
		$this->dbforge->add_key('recruit_id', TRUE);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table($this->table,TRUE,$attributes);
	}

	public function down() {
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file 003_05102017_create_table_recruit.php */
/* Location: ./application/migrations/003_05102017_create_table_recruit.php */