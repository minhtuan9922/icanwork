<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_05102017_create_table_post_recruit extends CI_Migration {

	protected $fields;
	protected $table = 'post_recruit';

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->fields= [
			'post_id' 			=> [
           		'type'  			=> 'INT',
           		'constraint' 		=> '254',
           		'unsigned'			=> TRUE,
           		'auto_increment'	=> TRUE,
           	],
           	'recruit_id' 		=> [
           		'type'  			=> 'INT',
           		'constraint' 		=> '254',
           		'unsigned'			=> TRUE,
           	],
           	'job' 				=> [ // vị trí tuyển dụng
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'number' 			=> [
           		'type'  			=> 'INT',
           		'null'				=> TRUE,
           	],
           	'rank' 				=> [	// cấp bậc mong muốn
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'type_work' 		=> [	//loại hình công việc
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'wage' 				=> [	//mức lương
           		'type'  			=> 'INT', 
           		'unsigned'			=> TRUE,
           		'null'				=> TRUE,
           	],
            'percent'        => [  //phần trăm
              'type'        => 'INT', 
              'unsigned'      => TRUE,
              'null'        => TRUE,
            ],
           	'experience' 		=> [	//kinh nghiệm
           		'type'  			=> 'INT', 
           		'unsigned'			=> TRUE,
           		'null'				=> TRUE,
           	],
           	'literacy' 			=> [	// trình độ học vấn/bằng cấp
           		'type'  			=> 'INT',
           		'unsigned'			=> TRUE,
           		'null'				=> TRUE,
           	],
           	'gender' 			=> [ // 0 là không yeu cầu
           		'type'  			=> 'INT',
           		'constraint' 		=> '11',
           		'null'				=> TRUE,
           	],
           	'location' 			=> [	//đỉa điểm làm việc
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'type_work' 		=> [	//loại hình công việc
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'career' 			=> [	//ngành nghè
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'description' 		=> [	//Miêu tả công việc
           		'type'  			=> 'TEXT',
           		'null'				=> TRUE,
           	],
           	'interest' 			=> [	//quyền lợi
           		'type'  			=> 'TEXT',
           		'null'				=> TRUE,
           	],
           	'requirement_job' 	=> [	//yêu cầu công việc
           		'type'  			=> 'TEXT',
           		'null'				=> TRUE,
           	],
           	'date_deadline'  	=> [	// hạn nộp hồ sơ
                'type'        		=> 'DATETIME',
                'null'        		=> TRUE,
            ],
            'language_profile' 	=> [	//ngôn ngữ hồ sơ
           		'type'  			=> 'INT',
           		'null'				=> TRUE,
           	],
           	'user_contact_post_json' => [	//người liên hệ cho bài đăng này
           		'type'  			=> 'TEXT',
           		'null'				=> TRUE,
           	],
           	'date_update' 		=> [	//ngày cập nhật
           		'type'       => 'DATETIME',
           		'null'				=> TRUE,
           	],
           	'admin_confrim' 	=> [	//admin xác nhận
           		'type'  			=> 'INT',
           		'null'				=> TRUE,
           	],
           	'date_confrim' 		=> [	//ngày xác nhận
           		'type'  			=> 'DATETIME',
           		'null'				=> TRUE,
           	],
           	'status' 			=> [	//0:no active,1:normal,2:new,3:hot
           		'type'  			=> 'INT',
           		'null'				=> TRUE,
           	],
		];
		$this->dbforge->add_field($this->fields);
		$this->dbforge->add_key('post_id', TRUE);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table($this->table,TRUE,$attributes);
	}

	public function down() {
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file 004_05102017_create_table_post_recruit.php */
/* Location: ./application/migrations/004_05102017_create_table_post_recruit.php */