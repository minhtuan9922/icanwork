<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeder extends CI_Controller {

	protected $faker;
	public function __construct()
	{
		parent::__construct();
		//faker
		$this->faker = Faker\Factory::create();
		//model
		$this->load->model('location_model');
        $this->load->model('scale_model');
        $this->load->model('education_model');
        $this->load->model('experience_model');
        $this->load->model('career_model');
        $this->load->model('type_work_model');
        $this->load->model('wage_model');
        $this->load->model('rank_model');
        $this->load->model('target_model');
        $this->load->model('classify_model');
        $this->load->model('language_model');
        $this->load->model('certificate_model');
	}

	public function index()
	{
		
		
	}

	public function seederAll()
	{
		try 
        {
    		seederLocation();
            seederScale();
            seederEducation();
            seederExperience();
            seederCareer();
            seederTypeWork();
            seederWage();
            seederRank();
            seederTarget();
            seederClassify();
            seederLanguage();
        } catch (Exception $e){ var_dump($e->getMessage()); }
	}

    public function seederLocation()
    {
        // purge existing data
        $this->location_model->truncate();
        $name = ['TP.HCM', 'Hà Nội', 'Bình Dương', 'Vũng Tàu', 'Đồng Nai', 'Đà nặng'];
        $limit = count($name);
        for ($i=0; $i < $limit; $i++) { 
            $data = [
                'loca_name'         => $name[$i],
                'loca_status'      => '1',
                'lang'              => '1',    
            ];
            $this->location_model->insert($data);
        }
    }

    public function seederScale()
    {
        // purge existing data
        $this->scale_model->truncate();
        $name = ['Không xác định', '10 - 20 người', '20 - 50 người', '50 - 100 người', 'Trên 100 người', 'Trên 1000 người'];
        $limit = count($name);
        for ($i=0; $i < $limit; $i++) { 
            $data = [
                'scale_name'         => $name[$i],
                'scale_status'      => '1',
                'lang'              => '1',    
            ];
            $this->scale_model->insert($data);
        }
    }

    public function seederEducation()
    {
        // purge existing data
        $this->education_model->truncate();
        $name=['Đại Học','Cao Đẳng'];
        $limit=count($name);
        for ($i=0; $i < $limit; $i++) { 
            $data = [
                'edu_name'          => $name[$i],
                'edu_status'        => '1',
                'lang'              => '1',    
            ];
            $this->education_model->insert($data);
        }
    }

    public function seederExperience()
    {
        // purge existing data
        $this->experience_model->truncate();
        $name=['Chưa có kinh nghiệm','1 Năm','2 Năm'];
        $limit=count($name);
        for ($i=0; $i < $limit; $i++) { 
            $data = [
                'exp_name'          => $name[$i],
                'exp_status'        => '1',
                'lang'              => '1',    
            ];
            $this->experience_model->insert($data);
        }
    }

    public function seederCareer()
    {
        // purge existing data
        $this->career_model->truncate();
        $name=['IT phần mềm','IT phần cứng','Tài chính ngân hàng','Kinh doanh','Điện tử tin học','Bưu chính viễn thông','Bán hàng','Quản lý điều hành','Xây dựng','Bất động sản','Thực phẩm/DV ăn uống','Thiết kế mỹ thuật','Ngoại ngữ','Y tế','Bán hàng','Chăm sóc khách hàng','Phát triển thị trường','Nhân sự','Tư vấn bảo hiểm','Nông lâm sản','Điện ảnh'];
        $limit=count($name);
        for ($i=0; $i < $limit; $i++) { 
            $data = [
                'career_name'          => $name[$i],
                'career_status'        => '1',
                'lang'                 => '1',    
            ];
            $this->career_model->insert($data);
        }
    }

    public function seederTypeWork()
    {
        // purge existing data
        $this->type_work_model->truncate();
        $name=['Toàn thời gian','Bán thời gian','Thời vụ','Ngoài giờ','Khác'];
        $limit=count($name);
        for ($i=0; $i < $limit; $i++) { 
            $data = [
                'work_name'          => $name[$i],
                'work_status'        => '1',
                'lang'               => '1',    
            ];
            $this->type_work_model->insert($data);
        }
    }

    public function seederWage()
    {
        // purge existing data
        $this->wage_model->truncate();
        $name=['1 - 3 triệu','3 - 5 triệu','10 triệu','> 10 triệu','Thương lượng'];
        $limit=count($name);
        for ($i=0; $i < $limit; $i++) { 
            $data = [
                'wage_name'          => $name[$i],
                'wage_status'        => '1',
                'lang'               => '1',    
            ];
            $this->wage_model->insert($data);
        }
    }

    public function seederRank()
    {
        // purge existing data
        $this->rank_model->truncate();
        $name=['Nhân viên','Giám đốc','Phó giám đốc','Trưởng nhóm','Khác'];
        $limit=count($name);
        for ($i=0; $i < $limit; $i++) { 
            $data = [
                'rank_name'          => $name[$i],
                'rank_status'        => '1',
                'lang'               => '1',    
            ];
            $this->rank_model->insert($data);
        }
    }

    public function seederTarget()
    {
        // purge existing data
        $this->target_model->truncate();
        $name=['Mong muốn tìm được chổ làm ổn định','Mong muốn có cơ hội thăng tiến','Mong muốn mức lương hấp dẫn'];
        $limit=count($name);
        for ($i=0; $i < $limit; $i++) { 
            $data = [
                'target_name'          => $name[$i],
                'target_status'        => '1',
                'lang'                 => '1',    
            ];
            $this->target_model->insert($data);
        }
    }

    public function seederClassify()
    {
        // purge existing data
        $this->classify_model->truncate();
        $name=['Xuất xắc','Giỏi','Khá','Trung bình','Khác'];
        $limit=count($name);
        for ($i=0; $i < $limit; $i++) { 
            $data = [
                'class_name'          => $name[$i],
                'class_status'        => '1',
                'lang'                => '1',    
            ];
            $this->classify_model->insert($data);
        }
    }

    public function seederLanguage()
    {
        // purge existing data
        $this->language_model->truncate();
        $this->certificate_model->truncate();
        $name                   = ['Tiếng Anh','Tiếng Nhật','Tiếng Việt Nam'];
        $certificate_enghlish   = ['TOEIC','IELTS','TOEFL','SAT','GMAT','GRE'];
        $certificate_japan      = ['N1','N2','N3','N4','N5'];
        $certificate_vietnam    = ['TIỂU HỌC','TRUNG HỌC','PHỔ THÔNG'];
        $certificate            = '';
        $arr                    = [];
        $limit=count($name);
        $count_en = count($certificate_enghlish);
        $count_jp = count($certificate_japan);
        $count_vn = count($certificate_vietnam);
        for ($i=0; $i < $limit; $i++) {
            if ($i==0) { $certificate = $count_en; $arr = $certificate_enghlish; }
            if ($i==1) { $certificate = $count_jp; $arr = $certificate_japan; }
            if ($i==2) { $certificate = $count_vn; $arr = $certificate_vietnam ;}
            $data = [
                'lang_name'     => $name[$i],
                'lang_status'   => '1',
                'lang'          => '1',    
            ];
            $id = $this->language_model->insert($data);
            for ($k=0; $k < $certificate; $k++)
            {
               $data = [
                'cer_name'     => $arr[$k],
                'cer_language' => $id,
                'cer_status'   => '1',
                ];
                $this->certificate_model->insert($data);
            }
        }
    }

    public function seederConfig()
    {
        // purge existing data
        $this->config_model->truncate();
        $key  = ['number_recruit','home_career'];
        $name = [10,9];
        $limit=count($name);
        for ($i=0; $i < $limit; $i++) { 
            $data = [
                'key'          => $key[$i],
                'value'        => $name[$i],
            ];
            $this->config_model->insert($data);
        }
    }

	/*function _seed_time_job($limit)
    {
        try 
        {
            // create a bunch of base buyer accounts
            $name=['Toàn thời gian','Bán thời gian','Thực tập','Bán thời gian tạm thời','Khác'];
            for ($i = 0; $i < $limit; $i++) 
            {
                $data = array(
                'name' => $name[$i], // get a unique nickname
                'status' => '1',
                'LangId' => '1',*/
                /*'name' => $this->faker->unique()->userName, // get a unique nickname
                'status' => mt_rand(0,1) ? '0' : '1',
                'LangId' => mt_rand(0,2) ? '1' : '2',*/
                /*'password' => md5('12345'), // run this via your password hashing function
                'firstname' => $this->faker->firstName,
                'lastName' => $this->faker->lastName,
                'gender' => rand(0, 1) ? 'male' : 'female',
                'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, rem, est! Omnis perferendis, nisi obcaecati modi aliquam, neque! Culpa quia, animi itaque numquam praesentium nemo ut repudiandae eius, debitis nulla.',
                'address' => $this->faker->streetAddress,
                'city' => $this->faker->city,
                'state' => $this->faker->state,
                'country' => $this->faker->country,
                'postcode' => $this->faker->postcode,
                'email' => $this->faker->email,
                'email_verified' => mt_rand(0, 1) ? '0' : '1',
                'phone' => $this->faker->phoneNumber,
                'birthdate' => $this->faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
                'registration_date' => $this->faker->dateTimeThisYear->format('Y-m-d H:i:s'),
                'ip_address' => mt_rand(0, 1) ? $this->faker->ipv4 : $this->faker->ipv6,
                'status' => $i === 0 ? true : rand(0, 1),*/
               /* );

                $this->time_job_model->insert($data);
            }
        }
        catch (Exception $e) 
        {

          var_dump($e->getMessage());
        }
    }*/
 
    /*private function _truncate_db()
    {
        $this->time_job_model->truncate();
    }*/




}

/* End of file seeder.php */
/* Location: ./application/controllers/seeder.php */