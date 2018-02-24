<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_26102017_add_columc_post_recruit extends CI_Migration {

	protected $table = 'post_recruit';

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$fields = [
			'icon' => [
				'type'  			=> 'INT',
           		'constraint' 		=> '11',
           		'null'				=> TRUE,
			],
		];
		$this->dbforge->add_column($this->table, $fields);
	}

	public function down() {
		$this->dbforge->drop_column($this->table, 'icon');
	}

}

/* End of file 023_26102017_add_columc_post_recruit.php */
/* Location: ./application/migrations/023_26102017_add_columc_post_recruit.php */