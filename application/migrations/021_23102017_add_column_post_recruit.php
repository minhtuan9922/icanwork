<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_23102017_add_column_post_recruit extends CI_Migration {

	protected $table = 'post_recruit';

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$fields = [
			'view' => [
				'type'  			=> 'INT',
           		'constraint' 		=> '11',
           		'unsigned'			=> TRUE,
           		'null'				=> TRUE,
			],
			'num_recruitment' => [
				'type'  			=> 'INT',
           		'constraint' 		=> '11',
           		'unsigned'			=> TRUE,
           		'null'				=> TRUE,
			],
		];
		$this->dbforge->add_column($this->table, $fields);
	}

	public function down() {
		$this->dbforge->drop_column($this->table, 'view,num_recruitment');
	}

}

/* End of file 021_23102017_add_column_post_recruit.php */
/* Location: ./application/migrations/021_23102017_add_column_post_recruit.php */