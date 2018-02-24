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
                <h2 class="page-title">NHÂN VIÊN LẬP TRÌNH PHP<img class="hot-gif" src="<?php echo base_url('asset/img/icon/hot1.gif'); ?>"></h2>
                <div class="entry">
                   <div class="info-hight">
                       <div class="row">
                           <div class="col-sm-10">
                                <span>Ngày cập nhật: 19-11-2017</span>|
                                <span>Lượt xem: 100</span>
                           </div>
                           <div class="col-sm-2">
                                <button class="send-records" type=""><i class="fa fa-send"></i>&nbsp;NỘP HỒ SƠ</button>
                           </div>
                       </div>
                   </div>
                   <div class="info-post">
                        <h5>Công Ty TNHH Quốc Tế Bình Minh</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <b>Nơi làm việc:</b> Thành Phố HCM
                                </div>
                                <div>
                                    <b>Mức lương:</b>&nbsp;<span style="color:#e4305a">10 -15 triệu + phần trăm hoa hồng</span>
                                    <span></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <b>Loại hình công việc:</b> Toàn thời gian cố định
                                </div>
                                <div>
                                    <b>Ngành nghề:</b> IT Phần mềm
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="info-hight">
                       <div class="row">
                           <div class="col-sm-2 hl">
                                <div><b>Cấp bậc</b></div>
                                <span>Nhân viên</span>
                           </div>
                           <div class="col-sm-2 hl">
                                <div><b>Số lượng</b></div>
                                <span>0</span>
                           </div>
                           <div class="col-sm-2 hl">
                                <div><b>Giới tính</b></div>
                                <span>Không yêu cầu</span>
                           </div>
                           <div class="col-sm-3 hl">
                                <div><b>Kinh nghiệm</b></div>
                                <span>Không yêu cầu</span>
                           </div>
                           <div class="col-sm-3" style="text-align: center;">
                                <div><b>Trình độ học vấn</b></div>
                                <span>Đại học</span>
                           </div>
                       </div>
                   </div>
                   <div class="info-requirement">
                       <h4>Mô tả công việc</h4>
                       <div>
                            <p>
                                <?php echo nl2br($info_all['interest']); ?>
                            </p>
                       </div>
                       <h4>Yêu cầu công việc</h4>
                       <div>
                            <p>
                                <?php echo nl2br($info_all['interest']); ?>
                            </p>
                       </div>
                       <h4>Quyền lợi được hưởng</h4>
                       <div>
                            <p>
                                <?php echo nl2br($info_all['interest']); ?>
                            </p>
                       </div>
                       <h4>Thông tin liên hệ</h4>
                       <div>
                           <table class="table">
                               <tbody>
                                   <tr>
                                       <td>abc</td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>
                   </div>
                </div>
            </section>
            <aside class="sidebar col-sm-3">
                <div class="widget">
                    <h4 style="margin-left: 0px;margin-top: 3px;"><i class="fa fa-info-circle"></i>&nbsp;GIỚI THIỆU CÔNG TY</h4>
                    <div class="fast-job">
                        <div class="logo-company">
                            <img src="<?php echo base_url('asset/img/logo_company/090994731175706481.png') ?>" alt="">
                        </div>
                        <div class="info-company">
                            <h5>Công Ty TNHH Quốc Tế Bình Minh</h5>
                            <div>
                                <i class="glyphicon glyphicon-map-marker"></i>
                                130 Ni Sư Huỳnh Liên P.10 Quận TB
                            </div>
                            <div>
                                <img width="15px" src="<?php echo base_url('asset/img/icon/web.png') ?>" alt="">
                                www.icanwork.com
                            </div>
                            <div>
                                <i class="fa fa-group"></i>
                                10 - 20 người
                            </div>
                            <a href="#">Xem thêm</a>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <h4 style="margin-left: 0px;margin-top: 3px;"><i class="fa fa-search"></i>TÌM KIẾM VIỆC LÀM</h4>
                    <!-- search -->
                    <?php $this->load->view('recruit/search_recruit'); ?>
                    <!-- end search -->
                </div>
            </aside>
        </div>
    </div>
</main>