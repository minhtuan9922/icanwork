 <!-- slider -->
 <?php $this->load->view('general/slider'); ?>
<!-- end slider -->
<!--slider left-->
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <hr>
    <?php foreach ($career as $key => $value): ?>
        <a href="#"><i class="glyphicon glyphicon-arrow-right"></i>&nbsp;<?php echo $value['career_name']; ?></a>
    <?php endforeach ?>
</div>
<div class="slider-fade"></div>
<script type="text/javascript">
    /* Set the width of the side navigation to 250px */
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        $('.slider-fade').css('display','block');
    }
    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        $('.slider-fade').css('display','none');
    }
    $('.slider-fade').click(function(){
        closeNav();
    });
</script>
<section class="bread-crumb">
    <nav class="navbar navbar-default" style="background: #EBEBEB">
        <div class="container">
            <!--data-target="#bscareer-navbar-collapse" -->
            <button type="button" class="navbar-toggle collapsed" onclick="openNav()"  data-toggle="collapse" >
                <span class="sr-only">Toggle Navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bscareer-navbar-collapse">
                <ul class="nav navbar-nav main-navbar-nav nav-career" >
                    <?php foreach ($career as $key => $value): ?>
                        <?php if ($key < $this->config->item('home_career')): ?>
                        <li><a href="#" title=""><?php echo $value['career_name']; ?><b class="oil-large"> > </b></a></li>
                        <?php else: ?>
                            <?php break; ?>
                        <?php endif ?>
                    <?php endforeach ?>
                    <li><a href="javascript:void(0)" onclick="openNav()" title="">Xem thêm</a></li>
                </ul>                       
            </div>
            <!-- /.navbar-collapse -->                
            <!-- END MAIN NAVIGATION -->
        </div>
    </nav>
</section>
<section class="boxes_area">
    <div class="container">
        <div class="row">
            <?php if (!$this->session->userdata('email')): ?>
            <div class="col-sm-4">
                <a href="<?php echo base_url('quan-ly-tuyen-dung/dang-tuyen-dung'); ?>">
                    <div class="box">
                        <div class="col-md-3">
                            <i class="fa fa-newspaper-o"></i>
                        </div>
                        <div class="col-md-9">
                            <h3>ĐĂNG TIN MIỄN PHÍ</h3>
                            <p>Tiếp cận hàng triệu hồ sơ</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="<?php echo base_url('quan-ly-ho-so'); ?>">
                    <div class="box">
                        <div class="col-md-3">
                            <i class="fa fa-edit"></i>
                        </div>
                        <div class="col-md-9">
                            <h3>TẠO HỒ SƠ</h3>
                            <p>Tiếp cận hàng triệu việc làm</p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif ?>
            <?php if ($this->session->userdata('type') == 2): ?>
            <div class="col-sm-4">
                <a href="<?php echo base_url('quan-ly-tuyen-dung/dang-tuyen-dung'); ?>">
                    <div class="box">
                        <div class="col-md-3">
                            <i class="fa fa-newspaper-o"></i>
                        </div>
                        <div class="col-md-9">
                            <h3>ĐĂNG TIN MIỄN PHÍ</h3>
                            <p>Tiếp cận hàng triệu hồ sơ</p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif ?>
            <?php if ($this->session->userdata('type') == 1): ?>
            <div class="col-sm-4">
                <a href="<?php echo base_url('quan-ly-ho-so/ho-so-ca-nhan'); ?>">
                    <div class="box">
                        <div class="col-md-3">
                            <i class="fa fa-edit"></i>
                        </div>
                        <div class="col-md-9">
                            <h3>TẠO HỒ SƠ</h3>
                            <p>Tiếp cận hàng triệu việc làm</p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif ?>
            <?php if ($this->session->userdata('email')): ?>
            <div class="col-sm-4">
                <?php if ($this->session->userdata('type') == 2): ?>
                    <a href="<?php echo base_url('quan-ly-tuyen-dung'); ?>">
                <?php else: ?>
                    <a href="<?php echo base_url('quan-ly-ho-so'); ?>">
                <?php endif ?>
                    <div class="box">
                        <div class="col-md-3">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="col-md-9">
                            <h3>QUẢN LÝ HỒ SƠ</h3>
                            <?php if ($this->session->userdata('type') == 2): ?>
                                <p>Quản lý hồ sơ nhà tuyển dụng.</p>
                            <?php else: ?>
                                <p>Quản lý hồ sơ của ứng viên.</p>
                            <?php endif ?>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif ?>
            <?php if ($this->session->userdata('email')): ?>
            <div class="col-sm-4">
                <a href="#">
                    <div class="box">
                        <div class="col-md-3">
                            <i class="fa fa-question"></i>
                        </div>
                        <div class="col-md-9">
                            <h3>CÂU HỎI</h3>
                            <?php if ($this->session->userdata('type') == 2): ?>
                                <p>Những câu hỏi thường gặp của nhà tuyển dụng.</p>
                            <?php else: ?>
                                <p>Những câu hỏi thường gặp của ứng viên.</p>
                            <?php endif ?>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif ?>
            <?php if (!$this->session->userdata('email')): ?>
            <div class="col-sm-2">
                <div id="login-user">
                    <div class="box" id="login" style="display: block">
                        <i class="fa fa-user" style="padding-bottom: 10px;"></i><h3>ĐĂNG NHẬP</h3>
                    </div>
                    <div class="action-user">
                        <a href="<?php echo base_url('login/2'); ?>"  title="Đăng nhập nhà tuyển dụng"><i class="fa fa-group"></i>&nbsp;Nhà tuyển dụng</a>
                    </div>
                    <div class="action-user">
                        <a href="<?php echo base_url('login/1'); ?>"  title="Đăng nhập ứng viên"><i class="fa fa-address-card-o"></i>&nbsp;Ứng viên</a>
                    </div>
                </div>  
            </div>
            <script type="text/javascript">
                $('#login-user').hover(function(e){
                    $('#login').css("display", "none");
                    $('.action-user').css("display", "block");
                    }, function(){
                    $('#login').css("display", "block");
                    $('.action-user').css("display", "none");
                });
            </script>
            <div class="col-sm-2">
                <div id="register-user">
                    <div class="box" id="register" style="display: block;font-style: normal;">
                        <i class="fa fa-key" style="padding-bottom: 10px;"></i><h3>ĐĂNG KÝ</h3>
                    </div>
                    <div class="register-user">
                        <a href="<?php echo base_url('register/2'); ?>"  title="Đăng ký nhà tuyển dụng"><i class="fa fa-group"></i>&nbsp;Nhà tuyển dụng</a>
                    </div>
                    <div class="register-user">
                        <a href="<?php echo base_url('register/1'); ?>"  title="Đăng ký ứng viên"><i class="fa fa-address-card-o"></i>&nbsp;Ứng viên</a>
                    </div>
                </div> 
            </div>
            <script type="text/javascript">
                $('#register-user').hover(function(e){
                    $('#register').css("display", "none");
                    $('.register-user').css("display", "block");
                }, function(){
                    $('#register').css("display", "block");
                    $('.register-user').css("display", "none");
                });
            </script>
            <?php endif ?>
        </div>
    </div>
</section>
<!-- <section class="services">
    <h2 class="section-title">DỊCH VỤ CỦA CHÚNG TÔI</h2>
    <p class="desc">Mãi mãi phát triển hướng tới người dùng</p>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="media">
                    <div class="media-left media-middle">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo base_url('service'); ?>">Đăng tin tuyển dụng</a></h4>
                        <p>Lorem ipsum dolor amet,consectetur adipiscing elit. Proin id pulvinar magna. Aenean accumsan iaculis lorem, nec sodales lectus auctor tempor.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="media">
                    <div class="media-left media-middle">
                        <i class="fa fa-user-md"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo base_url('service'); ?>">Tạo hồ sơ người tìm việc</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id pulvinar magna. Aenean accumsan iaculis lorem, nec sodales lectus auctor tempor.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="media">
                    <div class="media-left media-middle">
                        <i class="fa fa-stethoscope"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo base_url('service'); ?>">Đăng banner quảng cáo</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id pulvinar magna. Aenean accumsan iaculis lorem, nec sodales lectus auctor tempor.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="media">
                    <div class="media-left media-middle">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo base_url('service'); ?>">Tư vấn định hướng nghề nghiệp</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id pulvinar magna. Aenean accumsan iaculis lorem, nec sodales lectus auctor tempor.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="media">
                    <div class="media-left media-middle">
                        <i class="fa fa-file-text-o"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo base_url('service'); ?>">Hộ trợ tìm kiếm việc làm</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id pulvinar magna. Aenean accumsan iaculis lorem, nec sodales lectus auctor tempor.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="media">
                    <div class="media-left media-middle">
                        <i class="fa fa-heartbeat"></i>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="<?php echo base_url('service'); ?>">Xem tất cả</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin id pulvinar magna. Aenean accumsan iaculis lorem, nec sodales lectus auctor tempor.</p>
                    </div>
                </div>
            </div>                     
        </div>
    </div>
</section> -->
<!-- jop news-->
<section id="job-news">
    <div class="home_content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12"><h2 class="sub_title" style="margin:0px;"><a href="" title="Xem tất cả">VIỆC LÀM MỚI</a></h2></div>
                <div class="home_list">
                     <ul>
                        <?php foreach ($post_new as $key => $value): ?>
                        <?php if ($key < $this->config->item('number_post_new')): ?>
                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div  class="thumbnail job">
                                <div class="caption">
                                    <h5><a href="#"><?php echo $value['job']; ?></a>
                                        <?php if ($value['icon'] == 1): ?>
                                            <img class="hot-gif" src="<?php echo base_url('asset/img/icon/hot1.gif'); ?>">
                                        <?php endif ?>
                                    </h5>
                                    <p><?php echo $value['name_company']; ?></p>
                                    <div style="display: -webkit-box">
                                        <div class="money" style="">
                                            <i style="color: #e4305a" class="fa fa-money">
                                                <strong>
                                                    <?php foreach ($wage as $k => $val): ?>
                                                        <?php  
                                                        if ($val['wage_id'] == $value['wage'])
                                                        {
                                                            echo $val['wage_name'];
                                                        }
                                                        ?>
                                                    <?php endforeach ?>
                                                </strong>
                                            </i>
                                        </div>
                                        <div class="date-update" style="">
                                            <i class="fa fa-calendar">&nbsp;<strong><?php echo date_format(date_create($value['date']), 'd-m-Y') ?></strong></i>
                                        </div>
                                        <div class="more" >
                                            <a href="#" class="btn btn-link" role="button"><i>Chi tiết</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>                                        
                        </li>
                        <?php else: ?>
                            <?php break; ?>
                        <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end job news -->
<!-- banner quảng cáo -->
<section>
    <div class="home_content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <img src="<?php echo base_url('asset/'); ?>img/h1.jpeg" alt="Post" title="banner Quảng Cáo" >
                </div>
                <div class="col-md-3 col-sm-3">
                    <img src="<?php echo base_url('asset/'); ?>img/h3.jpeg" alt="Post" title="banner Quảng Cáo" >
                </div>
                <div class="col-md-3 col-sm-3">
                    <img src="<?php echo base_url('asset/'); ?>img/h4.jpeg" alt="Post" title="banner Quảng Cáo" >
                </div>
                <div class="col-md-3 col-sm-3">
                    <img src="<?php echo base_url('asset/'); ?>img/h2.jpg" class="img-responsive" alt="Post" title="banner Quảng Cáo">
                </div>
                   
            </div>
        </div>
    </div>
</section>
<!-- end banner quảng cáo -->
<section style="margin-bottom: 0px;">
    <div class="home_content">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <h2  style="margin-bottom: 10px;" class="sub_title" style="margin:0px;"><a href="" title="Xem tất cả">VIỆC LÀM NỔI BẬT</a></h2>
                    <div class="table-responsive">    
                    <table class="table table-hover" id="table-job">
                        <thead>
                            <tr>
                                <th class="col-left" >Vị trí tuyển dụng</th>
                                <th>Khu vực</th>
                                <th>Mức lương</th>
                                <th>Hạn nộp hồ sơ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($post_hot as $key => $value): ?>
                            <?php if ($key < $this->config->item('number_post_hot')): ?>
                            <tr>
                                <td class="col-left">
                                <div style="display: inline-flex;">
                                        <div>
                                           <img src="<?php echo base_url($value['logo']); ?>" width="50" height="50" alt="">
                                        </div>
                                        <div style="margin: 7px;">
                                            <p>
                                                <b><a href=""><?php echo $value['job']; ?></a>
                                                    <?php if ($value['icon'] == 1): ?>
                                                    <img class="hot-gif" src="<?php echo base_url('asset/img/icon/hot1.gif'); ?>">
                                                <?php endif ?> 
                                                </b>
                                            </p>
                                            <span><?php echo $value['name_company']; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    $arr_location = explode(',',$value['location']);
                                    $n = count($arr_location) - 1;
                                    foreach ($arr_location as $i => $item)
                                    {
                                        foreach ($location as $k => $vl)
                                        {
                                            if ($item == $vl['loca_id'])
                                            {
                                                echo '<div>'.$vl['loca_name'].'</div>';
                                                break;
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td><div style="color: #e4305a">
                                        <strong>
                                        <?php foreach ($wage as $k => $val): ?>
                                            <?php if ($value['wage'] == $val['wage_id']): ?>
                                                <?php echo $val['wage_name']; break; ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                        </strong>
                                    </div>
                                </td>
                                <td><?php echo date_format(date_create($value['date_deadline']),'d-m-Y'); ?></td>
                            </tr>
                            <?php else: ?>
                                <?php break; ?>
                            <?php endif ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="col-sm-3">
                    <h2 class="sub_title" ><a href="" title="Xem tất cả">VIỆC LÀM TUYỂN GẤP</a></h2>
                    <div class="fast-job">
                        <?php foreach ($post_fast as $key => $value): ?>
                            <?php if ($key < $this->config->item('number_fast')): ?>
                            <div class="item-job">
                                <div>
                                    <b><a href=""><?php echo $value['job'] ?></a></b>
                                    <?php if ($value['icon'] == 1): ?>
                                    <img class="hot-gif" src="<?php echo base_url('asset/img/icon/hot1.gif'); ?>">
                                    <?php endif ?>
                                </div>
                                <div>
                                    <span><?php echo $value['name_company'] ?></span>
                                </div>
                                <div style="display: -webkit-box;height: 22px;">
                                    <div class="money" >
                                        <i style="color: #e4305a;height: auto" class="fa fa-money">&nbsp;
                                            <strong >
                                                <?php foreach ($wage as $k => $val): ?>
                                                    <?php if ($value['wage'] == $val['wage_id']): ?>
                                                        <?php echo $val['wage_name']; break; ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </strong>
                                        </i>
                                    </div>
                                    <div class="exp" >
                                    <i  class="fa fa-info-circle">&nbsp;
                                        <strong >
                                            <?php foreach ($experience as $k => $val): ?>
                                                <?php if ($value['experience'] == $val['exp_id']): ?>
                                                    <?php echo $val['exp_name']; break; ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </strong>
                                    </i>
                                    </div>
                                    <div class="more" >
                                        <a href="#" style="" class="btn btn-link" role="button"><i>Chi tiết</i></a>
                                    </div> 
                                </div>
                                <hr>
                            </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
<!-- end job hot -->
<section class="home-area">
    <div class="home_content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12"><h2 class="sub_title">TIN TỨC</h2></div>
                <div class="home_list">
                    <ul>
                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div class="thumbnail">
                                <img src="<?php echo base_url('asset/'); ?>img/h1.jpeg" alt="Post">
                                <div class="caption">
                                    <h3><a href="#">Lấn đầu phỏng vấn</a></h3>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                    <i class="fa fa-calendar">&nbsp;<strong>27-09-2017</strong></i>
                                    <a href="#" class="btn btn-link" role="button">More</a>
                                </div>
                            </div>                                        
                        </li>
                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div class="thumbnail">
                                <img src="<?php echo base_url('asset/'); ?>img/h2.jpg" class="img-responsive" alt="Post">
                                <div class="caption">
                                    <h3><a href="#">Những câu hỏi thường gặp khi phỏng vấn</a></h3>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                    <i class="fa fa-calendar">&nbsp;<strong>27-09-2017</strong></i>
                                    <a href="#" class="btn btn-link" role="button">More</a>
                                </div>
                            </div>                                        
                        </li>
                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div class="thumbnail">
                                <img src="<?php echo base_url('asset/'); ?>img/h3.jpeg" class="img-responsive" alt="Post">
                                <div class="caption">
                                    <h3><a href="#">Nhưng lời nói hứa của nhà tuyển dụng</a></h3>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                    <i class="fa fa-calendar">&nbsp;<strong>27-09-2017</strong></i>
                                    <a href="#" class="btn btn-link" role="button">More</a>
                                </div>
                            </div>                                        
                        </li>
                        <li class="col-md-3 col-sm-6 col-xs-12">
                            <div class="thumbnail">
                                <img src="<?php echo base_url('asset/'); ?>img/h4.jpeg" class="img-responsive" alt="Post">
                                <div class="caption">
                                    <h3><a href="#">Cẩn thận với tình trạng lừa đảo</a></h3>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                                    <i class="fa fa-calendar">&nbsp;<strong>27-09-2017</strong></i>
                                    <a href="#" class="btn btn-link" role="button">More</a>
                                </div>
                            </div>                                        
                        </li>                                    
                    </ul>
                </div>
                
                <div class="col-sm-9 home_bottom">
                    <h2 class="sub_title">CÔNG TY ĐỐI TÁC</h2>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="6000" id="myCarousel1">
                            <div class="carousel-inner" style="height: auto">
                                <div class="item active">
                                    <div class="col-md-2 col-sm-6 col-xs-12 p10">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l1.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12 p10">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l2.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l3.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l4.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l5.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l6.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l7.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l8.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12 p10">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l1.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12 p10">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l2.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l3.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l4.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l5.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l6.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l7.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                        <a href="#"><img src="<?php echo base_url('asset/'); ?>img/l8.jpg" class="img-responsive" alt="Reference"></a>
                                    </div>
                                </div>                                        
                            </div>
                            <a class="left carousel-control" href="#myCarousel1" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a class="right carousel-control" href="#myCarousel1" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>                            
                </div>
                <div class="col-sm-3">
                    <h2 class="sub_title w10">EMAIL TƯ VẤN</h2>
                    <div class="clearfix"></div>
                    <div class="login-form-1">
                        <form id="login-form" class="text-left">
                            <div class="login-form-main-message"></div>
                            <div class="main-login-form">
                                <div class="login-group">
                                    <div class="form-group">
                                        <label for="ad" class="sr-only">Name</label>
                                        <input type="text" class="form-control" id="ad" name="ad" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="tel" class="sr-only">Email</label>
                                        <input type="text" class="form-control" id="tel" name="tel" placeholder="Email">
                                    </div>
                                </div>
                                <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                            </div>
                        </form>
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</section>