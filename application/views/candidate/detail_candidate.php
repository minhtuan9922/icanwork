<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<!-- breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<!-- end breadcrumb -->
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title"><i class="fa fa-address-card"></i>&nbsp;HỒ SƠ ỨNG VIÊN <?php echo $info['name']; ?></h2>
                <div class="entry">
                   <div class="row">
                       <div class="col-md-3">
                            <div class="photo-user" style="text-align: center;">
                                <label for="img-user">
                                    <?php if (!empty($info['img'])): ?>
                                        <img src="<?php echo base_url($info['img']); ?>"  alt="">
                                    <?php else: ?>
                                        <img src="<?php echo base_url('asset/img/user-128.png'); ?>"  alt="">
                                    <?php endif ?>
                                    
                                </label>
                            </div>
                       </div>
                       <div class="col-md-9">
                        <h3 style="margin-top:0px;"><b><?php echo $info['name']; ?></b></h3>
                        <h4 style="color:#0091cf;"><b><?php echo $info['title']; ?></b></h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="details-candidate">
                                    <span><b>Ngày sinh:</b></span>&nbsp;
                                    <span><?php echo date_format(date_create($info['birthday']), 'd/m/Y'); ?></span>
                                </div>
                                <div class="details-candidate">
                                    <span><b>Giới tính:</b></span>&nbsp;
                                    <span><?php echo ($info['gender'] == 1) ? 'Nam' : 'Nữ'; ?></span>
                                </div>
                                <div class="details-candidate">
                                    <span><b>Email:</b></span>&nbsp;
                                    <span><?php echo $info['account_email']; ?></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="details-candidate">
                                    <span><b>Điện thoại:</b></span>&nbsp;
                                    <span><?php echo $info['phone']; ?></span>
                                </div>
                                <div class="details-candidate">
                                    <span><b>Hôn nhân:</b></span>&nbsp;
                                    <span><?php echo ($info['marriage'] == 1) ? 'Độc thân' : 'Đã kết hôn'; ?></span>
                                </div>
                                <div class="details-candidate">
                                    <span><b>Chổ ở hiện tại:</b></span>&nbsp;
                                    <span><?php echo $info['address']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>                                          
                </div>
                <h4 class="title-info"><b>Thông tin chung</b></h4>
                <hr style="border-top: 1px solid #0091cf;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="details-candidate">
                            <span><b>Ngành nghề:</b></span>&nbsp;
                            <span>
                                <?php 
                                $arr_career = explode(',',$info['career']);
                                $n = count($arr_career) - 1;
                                foreach ($arr_career as $key => $value)
                                {
                                    foreach ($career as $k => $vl)
                                    {
                                        if ($value == $vl['career_id'] && $key < $n)
                                        {
                                            echo $vl['career_name'].' - ';
                                            break;
                                        } 
                                        else if ($value == $vl['career_id'] && $key == $n)
                                        {
                                            echo $vl['career_name'];
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </span>
                        </div>
                        <div class="details-candidate">
                            <span><b>Trình độ học vấn:</b></span>&nbsp;
                            <span>
                                <?php foreach ($education as $key => $value): ?>
                                    <?php if ($info['literacy'] == $value['edu_id']): ?>
                                        <?php echo $value['edu_name']; break; ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </span>
                        </div>
                        <div class="details-candidate">
                            <span><b>Kinh nghiệm làm việc:</b></span>&nbsp;
                            <span>
                                <?php foreach ($experience as $key => $value): ?>
                                    <?php if ($info['experience'] == $value['exp_id']): ?>
                                        <?php echo $value['exp_name']; break; ?>
                                    <?php endif ?>
                                <?php endforeach ?> 
                            </span>
                        </div>
                        <div class="details-candidate">
                            <span><b>Loại hình công việc:</b></span>&nbsp;
                            <span>
                                <?php 
                                $arr_type_work = explode(',',$info['type_work']);
                                $n = count($arr_type_work) - 1;
                                foreach ($arr_type_work as $key => $value)
                                {
                                    foreach ($type_work as $k => $vl)
                                    {
                                        if ($value == $vl['work_id'] && $key < $n)
                                        {
                                            echo $vl['work_name'].' - ';
                                            break;
                                        } 
                                        else if ($value == $vl['work_id'] && $key == $n)
                                        {
                                            echo $vl['work_name'];
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-candidate">
                            <span><b>Mức lương mong muốn:</b></span>&nbsp;
                            <span>
                                <?php foreach ($wage as $key => $value): ?>
                                    <?php if ($info['wage'] == $value['wage_id']): ?>
                                        <?php echo $value['wage_name']; break; ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </span>
                        </div>
                        <div class="details-candidate">
                            <span><b>Nơi làm việc:</b></span>&nbsp;
                            <span>
                                <?php 
                                $arr_location = explode(',',$info['location']);
                                $n = count($arr_location) - 1;
                                foreach ($arr_location as $key => $value)
                                {
                                    foreach ($location as $k => $vl)
                                    {
                                        if ($value == $vl['loca_id'] && $key < $n)
                                        {
                                            echo $vl['loca_name'].' - ';
                                            break;
                                        } 
                                        else if ($value == $vl['loca_id'] && $key == $n)
                                        {
                                            echo $vl['loca_name'];
                                            break;
                                        }
                                    }
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <h4 class="title-info"><b>Mục tiêu nghề nghiệp</b></h4>
                <hr style="border-top: 1px solid #0091cf;">
                <div class="row">
                    <div class="col-md-12">
                        <?php 
                        $arr_target = explode("%^&*", $info['target']);
                        $n = count($arr_target);
                        ?>
                        <?php foreach ($arr_target as $k => $val): ?>
                            <?php foreach ($target as $key => $value): ?>
                                <?php if ($val == $value['target_id']): ?>
                                <div class="details-candidate">
                                    <i class="fa fa-check"></i>&nbsp;<span><?php echo $value['target_name']; ?></span>
                                </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endforeach ?>
                    </div>
                    <div class="col-md-12">
                        <?php if (!empty($arr_target[$n-1]) && strlen($arr_target[$n-1]) > 49): ?>
                            <div class="details-candidate">
                                <span><?php echo $arr_target[$n-1]; ?></span>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <?php 
                $json_exp_job = json_decode($info['work_experience_json']);
                if (!empty($json_exp_job))
                {
                ?>
                <h4 class="title-info"><b>Kinh nghiệm làm việc</b></h4>
                <hr style="border-top: 1px solid #0091cf;">
                <div class="row">
                    <?php foreach ($json_exp_job as $key => $value): ?>
                    <div class="col-md-12">
                        <div class="details-candidate">
                            <span><b><?php echo $value->office; ?></b></span> tại <span><?php echo $value->name_company; ?></span>
                            <p style="color:#e4305a;"><i class="fa fa-calendar"></i>&nbsp;<?php  echo date_format(date_create($value->time_start),'d/m/Y'); ?> - <?php echo date_format(date_create($value->time_end),'d/m/Y'); ?></p>
                            <p><i class="fa fa-money"></i>&nbsp;<?php echo number_format($value->num_wage,0,'.','.'); ?></p>
                            <p><i class="fa fa-info-circle"></i>&nbsp;Mô tả công việc:</p>
                            <p style="padding-left: 10px;color:gray;"><?php echo $value->description; ?></p>
                        </div>
                        <hr >
                    </div>
                    <?php endforeach ?>
                </div>
                <?php
                }
                ?>
                <h4 class="title-info"><b>Học vấn</b></h4>
                <hr style="border-top: 1px solid #0091cf;">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" id="table-education">
                            <thead>
                                <tr>
                                    <th>Thời gian</th>
                                    <th>Tên trường</th>
                                    <th>Chuyên ngành</th>
                                    <th>Xếp loại tốt nghiệp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                $json_education = json_decode($info['education_json']);
                                if (!empty($json_education))
                                { 
                                ?>
                                <?php foreach ($json_education as $k => $val): ?>
                                    <tr>
                                        <td><?php  echo date_format(date_create($val->edu_begin),'d/m/Y'); ?> - <?php echo date_format(date_create($val->edu_end),'d/m/Y'); ?></td>
                                        <td><?php echo $val->school; ?></td>
                                        <td><?php echo $val->specialized; ?></td>
                                        <td>
                                            <?php foreach ($classify as $key => $value): ?>
                                                <?php if ($value['class_id'] == $val->classify): ?>
                                                    <span class="lspan" id="edu-classify-<?php echo $val->id; ?>" value="<?php echo $value['class_id']; ?>"> 
                                                    <?php echo $value['class_name']; break; ?>
                                                    </span>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </td>
                                    </tr>
                                 <?php endforeach ?>
                                <?php 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php  
                $json_language = json_decode($info['language_json']);
                if (!empty($json_language))
                { 
                    ?>
                <h4 class="title-info"><b>Ngôn ngữ</b></h4>
                <hr style="border-top: 1px solid #0091cf;">
                <div class="row">
                    <div class="col-md-12">
                        <?php foreach ($json_language as $k => $val): ?>
                        <div class="details-candidate">
                            <i class="fa fa-check"></i>&nbsp;<span><b>
                             <?php foreach ($certificate as $key => $value): ?>
                                    <?php if ($value['lang_id'] == $val->language): ?>
                                        <?php echo $value['lang_name']; break; ?>
                                    </b></span>
                                <?php endif ?>
                            <?php endforeach ?>:
                        &nbsp;
                        </b>
                        <?php foreach ($certificate as $key => $value): ?>
                            <?php if ($value['cer_id'] == $val->certificate): ?>
                                <span id="cer-<?php echo $val->id; ?>" value="<?php echo $val->certificate; ?>"><b>
                                    <?php echo $value['cer_name']; break; ?>
                                </b>
                            </span>
                        <?php endif ?>
                        <?php endforeach ?> 
                        (<?php echo $val->point; ?>)</span>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <?php
                }  
                ?>
                <hr class="hhr">
                <!-- file đính kèm -->
                <?php if (!empty($info['status_file'])): ?>
                <h2 class="page-title"><i class="fa fa-paperclip"></i>&nbsp;HỒ SƠ ĐÍNH KÈM</h2>
                <div class="entry">
                    <iframe src="<?php echo base_url($info['file_path']); ?>" style="width:100%; height:400px; border:0;"></iframe>
                    <!-- <iframe src="https://docs.google.com/gview?url=https://mywork.com.vn//data/files/CVs/test201709150845.pdf&amp;embedded=true" style="width:100%; height:400px; border:0;"></iframe> -->
                </div>
                <?php endif ?>
                <!-- end file đính kèm -->
                <!-- profile silimar -->
                <hr class="hhr">
                <?php if (!empty($silimar)): ?>
                <h2 class="page-title">DANH SÁCH HỒ SƠ ỨNG VIÊN TƯƠNG TỰ</h2>
                <div class="entry">
                    <table class="table table-hover" id="table-job">
                        <thead>
                            <tr>
                                <th class="col-left" >Tiêu đề hồ sơ</th>
                                <th>Trình độ/Kinh nghiệm </th>
                                <th>Mức lương</th>
                                <th>Khu vực</th>
                                <th>Thời gian cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($silimar as $i => $item): ?>
                            <tr>
                                <td class="col-left">
                                    <div style="display: inline-flex;">
                                        <div>
                                            <?php if (!empty($item['img'])): ?>
                                               <img src="<?php echo base_url($item['img']); ?>" width="50" height="50" alt="">   
                                           <?php else: ?>
                                                <img src="<?php echo base_url('asset/img/user-128.png'); ?>" width="50" height="50" alt="">
                                            <?php endif ?>
                                        </div>
                                        <div style="margin: 7px;">
                                            <p><b><a href="<?php echo base_url('ung-vien/'.$item['candidate_id'].'/'.$this->my_string->remove_vn_unicode(str_replace(" ","-",$item['name']))); ?>"><?php echo $item['title']; ?></a></b></p>
                                            <span><?php echo $item['name']; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <?php foreach ($education as $key => $value): ?>
                                            <?php if ($item['literacy'] == $value['edu_id']): ?>
                                                <?php echo $value['edu_name']; break; ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                    <div>
                                        <?php foreach ($experience as $key => $value): ?>
                                            <?php if ($item['experience'] == $value['exp_id']): ?>
                                                <?php echo $value['exp_name']; break; ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #e4305a">
                                        <?php foreach ($wage as $key => $value): ?>
                                            <?php if ($item['wage'] == $value['wage_id']): ?>
                                                <?php echo $value['wage_name']; break; ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    $arr_location = explode(',',$item['location']);
                                    $n = count($arr_location) - 1;
                                    foreach ($arr_location as $key => $value)
                                    {
                                        foreach ($location as $k => $vl)
                                        {
                                            if ($value == $vl['loca_id'])
                                            {
                                                echo '<div>'.$vl['loca_name'].'</div>';
                                                break;
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td><?php echo date_format(date_create($item['date_update']),"d/m/Y"); ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- <div class="hcenter">
                        <a class="btn btn-primary hbtn" href="#" role="button">Xem thêm khác</a>
                    </div> -->
                </div>
                 <?php endif ?>
                <!-- end profile silimar -->
            </div>
            </section>
            <aside class="sidebar col-sm-3">
                <div class="widget">
                    <h4 style="margin-left: 0px;"><i class="fa fa-info-circle"></i>&nbsp;THÔNG TIN THÊM</h4>
                    <div class="fast-job" >
                        <div class="entry">
                            <div class="details-candidate">
                                <span><b>Mã hồ sơ:</b></span><span> <?php echo $info['candidate_id']; ?></span>
                            </div>
                            <?php if (!empty($info['status_profile'])): ?>
                                <div class="details-candidate">
                                    <span><b>Người duyệt:</b></span><span> <?php echo $info['confrim_admin']; ?></span>
                                </div>
                                <div class="details-candidate">
                                    <span><b>Ngày duyệt:</b></span><span> <?php  echo date_format(date_create($info['date_confrim_admin']),'d/m/Y'); ?></span>
                                </div>
                                <div class="details-candidate">
                                    <span><b>Số lượt xem:</b></span><span> <?php echo $info['view'] ?></span>
                                </div>
                            <?php else: ?>
                                <div class="details-candidate">
                                    <span><b>Trạng thái:</b></span><span style="color:red;"> Chưa duyệt</span>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <h4 style="margin-left: 0px;"><i class="fa fa-list"></i>&nbsp;CHỨC NĂNG</h4>
                    <div class="fast-job">
                        <div class="entry">
                            <div class="details-candidate">
                                <span class="fa fa-comments-o"></span>
                                <a href=""><b>Gửi tin nhắn</b></a>
                            </div>
                            <hr>
                            <div class="details-candidate">
                                <span class="fa fa-print"></span> 
                                <a href=""><b>In hồ sơ</b></a>
                            </div>
                            <hr>
                            <div class="details-candidate">
                                <span class="fa fa-download"></span> 
                                <a href=""><b>Lưu hồ sơ</b></a>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- search -->
                    <?php $this->load->view('candidate/search_candidate'); ?>
                    <!-- end search -->
                    <!-- candidate highlight -->
                    <?php $this->load->view('candidate/candidate_highlight'); ?>
                    <!-- end highlight -->
                </div>
            </aside>
        </div>
    </div>
</main>