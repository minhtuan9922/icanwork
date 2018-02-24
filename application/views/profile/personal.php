<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <!-- info personal -->
                <h2 class="page-title"><i class="glyphicon glyphicon-user"></i>&nbsp;THÔNG TIN CÁ NHÂN<span data-toggle="collapse" data-target="#info-personal" id="click-personal" class="glyphicon glyphicon-chevron-down" style="float:right;cursor: pointer;"></span></h2>
                <div class="row collapse in" id="info-personal">
                    <div class="entry">
                        <div class="panel panel-default profile">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="photo-user" style="text-align: center;">
                                            <label for="img-user">
                                                <img src="<?php echo (!empty($info['img'])) ? base_url($info['img']) : base_url('asset/img/user-128.png'); ?>"  alt="">
                                                <div>
                                                    <i class="fa fa-camera"></i>&nbsp;Ảnh đại diễn
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="dpres">
                                                    <i class="fa fa-font"></i><span><b>&nbsp;Họ Tên:</b></span>&nbsp;
                                                    <span class="lspan"><?php echo $info['name']; ?></span>
                                                </div>
                                                <div class="dpres">
                                                    <img style="width: 13px;" src="<?php echo base_url('asset/img/icon/envelope.png'); ?>" alt=""><span><b>&nbsp;Email:</b></span>&nbsp;
                                                    <span class="lspan"><?php echo $info['account_email']; ?></span>
                                                </div>
                                                <div class="dpres">
                                                    <i class="fa fa-intersex"></i><span><b>&nbsp;Giới tính:</b></span>&nbsp;
                                                    <span class="lspan"><?php echo ($info['gender'] == 1) ? 'Nam' : 'Nữ'; ?></span>
                                                </div>
                                                <div class="dpres">
                                                    <i class="glyphicon glyphicon-map-marker"></i><span><b>&nbsp;Đỉa chỉ:</b></span>&nbsp;
                                                    <span class="lspan"><?php echo $info['address']; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="dpres">
                                                    <i class="glyphicon glyphicon-phone"></i><span><b>&nbsp;Số điện thoại:</b></span>&nbsp;
                                                    <span class="lspan"><?php echo $info['phone']; ?></span>
                                                </div>
                                                <div class="dpres">
                                                    <i class="glyphicon glyphicon-calendar"></i><span><b>&nbsp;Ngày sinh:</b></span>&nbsp;
                                                    <span class="lspan"><?php echo date_format(date_create($info['birthday']),'d/m/Y'); ?></span>
                                                </div>
                                                <div class="dpres">
                                                    <i class="fa fa-child"></i><span><b>&nbsp;Tình trạng hôn nhận:</b></span>&nbsp;
                                                    <span class="lspan"><?php echo ($info['marriage'] == 1) ? 'Độc thân' : 'Đã kết hôn'; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-pers">
                                            <a class="btn btn-default" href="<?php echo base_url('account'); ?>" role="button"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end info personal -->
                <!-- info general -->
                <?php $this->load->view('profile/personal/info_general'); ?>
                <!-- end info general -->
                <!-- target -->
                <?php $this->load->view('profile/personal/target'); ?>
                <!-- end target -->
                <!-- education -->
                <?php $this->load->view('profile/personal/education'); ?>
                <!-- end educaton -->
                <!-- language -->
                <?php $this->load->view('profile/personal/language'); ?>
                <!-- end language -->
                <!-- exp job -->
                <?php $this->load->view('profile/personal/exp_job'); ?>
                <!-- end job -->
            </section>
            <!-- RIGHT -->
            <aside class="sidebar col-sm-3">
                <?php $this->load->view('profile/profile_right'); ?> 
            </aside>
            <!-- end RIGHT -->
        </div>
    </div>
</main>
<script type="text/javascript">
    //info general
    
</script>
<script>
    //collapse
    //$(document).ready(function(){
        $("#info-personal").on("hide.bs.collapse", function(){
            $("#click-personal").attr('class','glyphicon glyphicon-chevron-up');
        });
        $("#info-personal").on("show.bs.collapse", function(){
            $("#click-personal").attr('class','glyphicon glyphicon-chevron-down');
        });
        $("#info-general").on("hide.bs.collapse", function(){
            $("#click-general").attr('class','glyphicon glyphicon-chevron-up');
        });
        $("#info-general").on("show.bs.collapse", function(){
            $("#click-general").attr('class','glyphicon glyphicon-chevron-down');
        });
        $("#info-target").on("hide.bs.collapse", function(){
            $("#click-target").attr('class','glyphicon glyphicon-chevron-up');
        });
        $("#info-target").on("show.bs.collapse", function(){
            $("#click-target").attr('class','glyphicon glyphicon-chevron-down');
        });
        $("#info-education").on("hide.bs.collapse", function(){
            $("#click-education").attr('class','glyphicon glyphicon-chevron-up');
        });
        $("#info-education").on("show.bs.collapse", function(){
            $("#click-education").attr('class','glyphicon glyphicon-chevron-down');
        });
        $("#info-language").on("hide.bs.collapse", function(){
            $("#click-language").attr('class','glyphicon glyphicon-chevron-up');
        });
        $("#info-language").on("show.bs.collapse", function(){
            $("#click-language").attr('class','glyphicon glyphicon-chevron-down');
        });
        $("#info-exp-job").on("hide.bs.collapse", function(){
            $("#click-exp-job").attr('class','glyphicon glyphicon-chevron-up');
        });
        $("#info-exp-job").on("show.bs.collapse", function(){
            $("#click-exp-job").attr('class','glyphicon glyphicon-chevron-down');
        });
    //});
</script>