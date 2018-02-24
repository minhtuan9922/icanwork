<header class="site-header">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p>Chào bạn đến với icanwork</p>
                </div>
                <div class="col-sm-6">
                    <ul class="list-inline pull-right">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope-o"></i></a></li>
                        <li><a href="tel:+902222222222"><i class="fa fa-phone"></i> +84 09 09 947 311</a></li>
                    </ul>                        
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-default color-primary" id="header-top1">
        <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs1-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-collapse">
                <ul class="nav navbar-nav main-navbar-nav" >
                    <li <?php echo (isset($active) && $active == 'home') ? 'class="hactive"' : ''; ?> ><a href="<?php echo base_url(''); ?>" title="">TRANG CHỦ</a></li>
                    <li <?php echo (isset($active) && $active == 'recruit') ? 'class="hactive"' : ''; ?> ><a href="<?php echo base_url('tuyen-dung'); ?>" title="">TUYỂN DỤNG</a></li>
                    <li <?php echo (isset($active) && $active == 'candidate') ? 'class="hactive"' : ''; ?> ><a href="<?php echo base_url('ung-vien'); ?>" title="">ỨNG VIÊN</a></li>
                    <li <?php echo (isset($active) && $active == 'service') ? 'class="hactive"' : ''; ?> ><a href="<?php echo base_url('dich-vu'); ?>" title="">DỊCH VỤ</a></li>
                    <li <?php echo (isset($active) && $active == 'contact') ? 'class="hactive"' : ''; ?> ><a href="<?php echo base_url('lien-he'); ?>" title="">LIÊN HỆ</a></li>
                    <li><a href="#" title="">CÔNG TY ĐỐI TÁC</a></li>
                    <li><a href="#" title="">TIN TỨC</a></li>
                </ul>                       
            </div>
            <div class="collapse navbar-collapse" id="bs1-navbar-collapse" style="float: right;">
                <ul class="nav navbar-nav main-navbar-nav" >
                    <li class="dropdown">
                        <a href="#" title=""  <?php if ($this->session->userdata('email')): ?> id="email-header" <?php endif ?> class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>&nbsp;<?php echo ($this->session->userdata('email')) ? $this->session->userdata('email') : 'Đăng Nhập' ; ?></a>
                        <ul class="dropdown-menu">
                            <!-- before login -->
                            <?php if (!$this->session->userdata('email')): ?>
                                <li><a href="<?php echo base_url('login/2'); ?>" title=""><span class="fa fa-group"></span>&nbsp;Nhà tuyển dụng</a></li>
                                <hr>
                                <li><a href="<?php echo base_url('login/1'); ?>" title=""><span class="fa fa-address-card-o"></span>&nbsp;Ứng viên</a></li>
                            <?php endif ?>
                            <!-- end before login -->
                            <!-- after login candidate -->
                            <?php if ($this->session->userdata('type') == 1): ?>
                            <li><a href="<?php echo base_url('account'); ?>" title=""><span class="fa fa-info-circle"></span>&nbsp;Tài Khoản</a></li>
                            <hr>
                            <li><a href="<?php echo base_url('quan-ly-ho-so'); ?>" title=""><span class="glyphicon glyphicon-book"></span>&nbsp;Quản lý hồ sơ</a></li>
                            <hr>
                            <li><a href="<?php echo base_url('viec-lam-da-luu'); ?>" title=""><span class="glyphicon glyphicon-save"></span>&nbsp;Việc làm đã lưu</a></li>
                            <hr>
                            <li><a href="<?php echo base_url('viec-lam-da-ung-tuyen'); ?>" title=""><span class="glyphicon glyphicon-open"></span>&nbsp;Việc làm đã ứng tuyển</a></li>
                            <hr>
                            <li><a href="<?php echo base_url('cau-hinh-thong-bao'); ?>" title=""><span class="fa fa-cog"></span>&nbsp;Cấu hình thông báo</a></li>
                            <hr>
                            <?php endif ?>
                            <!-- begin recruit -->
                            <?php if ($this->session->userdata('type') == 2): ?>
                            <li><a href="<?php echo base_url('thong-tin-nha-tuyen-dung'); ?>" <?php echo (isset($user_active) && $user_active == 'application') ? 'id="user-active"' : ''; ?> title=""><span class="fa fa-info-circle" ></span>&nbsp;Thông tin nhà tuyển dụng</a></li>
                            <hr>
                            <li><a href="<?php echo base_url('quan-ly-tuyen-dung'); ?>" <?php echo (isset($user_active) && $user_active == 'application') ? 'id="user-active"' : ''; ?> title=""><span class="glyphicon glyphicon-book" ></span>&nbsp;Quản lý tuyển dụng</a></li>
                            <hr>
                            <li><a href="<?php echo base_url('ho-so-da-luu'); ?>" <?php echo (isset($user_active) && $user_active == 'save') ? 'id="user-active"' : ''; ?> title=""><span class="glyphicon glyphicon-save" ></span>&nbsp;Hồ sơ đã lưu</a></li>
                            <hr>
                            <li><a href="<?php echo base_url('ho-so-da-ung-tuyen'); ?>" <?php echo (isset($user_active) && $user_active == 'application') ? 'id="user-active"' : ''; ?> title=""><span class="glyphicon glyphicon-open" ></span>&nbsp;Hồ sơ đã ứng tuyển</a></li>
                            <?php endif ?>
                            <!-- end recruit-->
                            <?php if ($this->session->userdata('email')): ?>
                            <li><a href="<?php echo base_url('logout'); ?>" title=""><span class="glyphicon glyphicon-log-out"></span>&nbsp;Đăng xuất</a></li>
                            <?php endif ?>
                            <!--end after login -->
                        </ul>
                    </li>
                    <li class=""><a href="index.html" title="" class="message" style="padding: 15px 0px;"><img style="width: 20px;" src="<?php echo base_url('asset/img/icon/mail.png'); ?>" alt=""><span class="badge">5</span></a></li>
                    <li class=""><a href="index.html" title=""><img style="width: 23px;" src="<?php echo base_url('asset/img/icon/en.gif'); ?>" alt="">&nbsp;English</a></li>
                </ul>                       
            </div>
            <!-- /.navbar-collapse -->                
            <!-- END MAIN NAVIGATION -->
        </div>
    </nav>
    <nav class="navbar navbar-default" id="header-top2">
     <div class="container" style="padding: 5px;">
        <div class="row">
            <div class="col-md-3" style="height: 60px;">
                <a href="<?php echo base_url(''); ?>" class="navbar-brand">
                    <img style="width: 80%" src="<?php echo base_url('asset/'); ?>img/logo/logo.png" alt="Post">
                </a>
            </div>
            <div class="col-md-9">
                <div class="search">
                    <div class="search-text">
                        <input type="text" placeholder="Nhập việc bạn muốn tìm">
                    </div>
                    <div class="select-box">
                        <select name="" id="search-carrer" >
                            <option value="">Chọn ngành nghề</option>
                            <option value="">IT</option>

                        </select> 
                    </div>
                    <div class="select-box">
                        <select name="" id="search-location" >
                            <option value="">Chọn vị trí</option>
                            <option value="">TP.HCM</option>
                        </select>

                    </div>
                    <button id="btn-search"></button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#search-carrer').select2({
           
        });
        $('#search-location').select2();
    </script>
</nav>         
</header>
<script type="text/javascript">
    $(document).ready(function() {
        $(function(){
            var headerTop  = $('#header-top1').offset().top;
            if($('.bread-crumb').length > 0 )
            {
                var breadTop   = $('.bread-crumb').offset().top;
            }
            $(window).scroll(function(){
                if( $(window).scrollTop() > headerTop ) {
                    $('#header-top1').css({position: 'fixed', top: '0px'});
                    $('#header-top1').css('display', 'block');
                    $('#header-top1').css('z-index', '100');
                    $('#header-top2').css({position: 'fixed', top: '50px'});
                    $('#header-top2').css('display', 'block');
                    $('#header-top2').css('z-index', '99');
                } else {
                    $('#header-top1').css({position: 'static', top: '0px'});
                    $('#header-top2').css({position: 'static', top: '0px'});
                }
                if (typeof breadTop != "undefined")
                {
                    if( $(window).scrollTop() > breadTop ) 
                    {
                        if ($("body").width() > 1000)
                        {
                                $('.bread-crumb').css({position: 'fixed', top: '110px', left: '0px', right: '0px'});
                                $('.bread-crumb').css('display', 'block');
                                $('.bread-crumb').css('z-index', '88');
                        }
                        else {
                            $('.bread-crumb').css({position: 'static', top: '0px'});
                        }
                    } else 
                    {
                        $('.bread-crumb').css({position: 'static', top: '0px'});
                    }
                }
            });
        });
    });
</script>