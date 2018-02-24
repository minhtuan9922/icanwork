<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_05102017_create_table_candidate extends CI_Migration {

	protected $fields;
	protected $table = 'candidate';

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->fields= [
			'candidate_id' 			=> [
           		'type'  			=> 'INT',
           		'constraint' 		=> '254',
           		'unsigned'			=> TRUE,
           		'auto_increment'	=> TRUE,
           	],
           	'account_email' 			=> [
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '150',
           	],
           	'name' 				=> [
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'img' 				=> [
           		'type'  			=> 'TEXT',
           		'null'				=> TRUE,
           	],
           	'phone' 			=> [
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'gender' 			=> [
           		'type'  			=> 'INT',
           		'constraint' 		=> '11',
           		'null'				=> TRUE,
           	],
           	'birthday' 			=> [
           		'type'  			=> 'DATE',
           		'null'				=> TRUE,
           	],
           	'marriage' 			=> [
           		'type'  			=> 'INT',
           		'constraint' 		=> '11',
           		'null'				=> TRUE,
           	],
           	'address' 			=> [
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'title' 			=> [	//tiêu đề hồ sơ
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'literacy' 			=> [	// trình độ học vấn
           		'type'  			=> 'INT',
           		'unsigned'			=> TRUE,
           		'null'				=> TRUE,
           	],
           	'experience' 		=> [	//kinh nghiệm
           		'type'  			=> 'INT', 
           		'unsigned'			=> TRUE,
           		'null'				=> TRUE,
           	],
           	'career' 			=> [	//ngành nghè
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'location' 			=> [	//vị trí làm việc
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'type_work' 		=> [	//loại hình công việc
           		'type'  			=> 'VARCHAR',
           		'constraint' 		=> '255',
           		'null'				=> TRUE,
           	],
           	'rank' 				=> [	//cấp bậc
           		'type'  			=> 'INT', 
           		'unsigned'			=> TRUE,
           		'null'				=> TRUE,
           	],
           	'wage' 				=> [	//mức lương
           		'type'  			=> 'INT', 
           		'unsigned'			=> TRUE,
           		'null'				=> TRUE,
           	],
           	'target' 			=> [	//muc tiêu nghề nghiệp
           		'type'  			=> 'TEXT', 
           		'null'				=> TRUE,
           	],
           	'education_json' 	=> [	//học vấn
           		'type'  			=> 'TEXT', 
           		'null'				=> TRUE,
           	],
           	'language_json' 	=> [	//ngôn ngữ
           		'type'  			=> 'TEXT', 
           		'null'				=> TRUE,
           	],
           	'work_experience_json' 	=> [	//kinh nghiệm làm việc
           		'type'  			=> 'TEXT', 
           		'null'				=> TRUE,
           	],
           	'date_update' 		=> [
		        'type'  			=> 'DATETIME',
		        'null'				=> TRUE,
           	],
            'status_profile'  	=> [
                'type'        		=> 'INT',
                'unsigned'			=> TRUE,
                'constraint'    	=> '11',
                'null'        		=> TRUE,
            ],
            'file_name' 		=> [
    		        'type'  			=> 'VARCHAR',
    		        'constraint'		=> '255',
    		        'null'				=> TRUE,
           	],
           	'file_path' 		=> [
    		        'type'  			=> 'TEXT',
    		        'null'				=> TRUE,
           	],
           	'date_file_update' 		=> [
    		        'type'  			=> 'DATETIME',
    		        'null'				=> TRUE,
           	],
           	'status_file'  	=> [
                'type'        		=> 'INT',
                'unsigned'			=> TRUE,
                'constraint'    	=> '11',
                'null'        		=> TRUE,
            ],
            'status_search'  	=> [ //cho phép nhà tuyển dụng tìm kiếm
                'type'        		=> 'INT',
                'unsigned'			=> TRUE,
                'constraint'    	=> '11',
                'null'        		=> TRUE,
            ],
            'confrim_admin'  	=> [ //mã admin duyệt
                'type'        		=> 'INT',
                'unsigned'			=> TRUE,
                'constraint'    	=> '11',
                'null'        		=> TRUE,
            ],
            'date_confrim_admin'  	=> [
                'type'        		=> 'DATETIME',
                'null'        		=> TRUE,
            ],
            'view'   => [
                'type'            => 'INT',
                'constraint'      => '11',
                'null'            => TRUE,
            ],
		];
		$this->dbforge->add_field($this->fields);
		$this->dbforge->add_key('candidate_id', TRUE);
		$attributes = array('ENGINE' => 'InnoDB');
		$this->dbforge->create_table($this->table,TRUE,$attributes);
		$sql = "ALTER TABLE `candidate` CHANGE `gender` `gender` INT(11) NULL DEFAULT NULL COMMENT '1:male, 2:female'";
		$this->db->query($sql);
		$sql = "ALTER TABLE `candidate` CHANGE `status_profile` `status_profile` INT(11) NULL DEFAULT NULL COMMENT '0:no active,1:normal, 2:new, 3:hot'";
		$this->db->query($sql);
	}

	public function down() {
		$this->dbforge->drop_table($this->table);
	}

}

/* End of file 002_05102017_create_table_candidate.php */
/* Location: ./application/migrations/002_05102017_create_table_candidate.php */