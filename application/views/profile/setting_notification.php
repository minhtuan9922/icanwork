<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title"><i class="fa fa-cog"></i>&nbsp;CẤU HÌNH THÔNG BÁO</h2>
                <form action="" method="POST" id="register-job" role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Email :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" placeholder="Email">
                                <span class="label label-warning"><strong>Lưu ý:</strong> Vui lòng nhập đúng email mong muốn để nhận thông báo</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Giới tính :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="" id="input" class="form-control">
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Ngành nghề :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name=""  id="setting-career" class="form-control">
                                    <option value="1">IT</option>
                                    <option value="2">Đồ họa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Khu Vực :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name=""  id="setting-location" class="form-control">
                                    <option value="1">HCM</option>
                                    <option value="2">Hà Nội</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Trình độ học vấn :</label>
                            </div>
                            <div class="col-md-9">
                                <select name=""  id="" class="form-control">
                                    <option value="1">Đại học</option>
                                    <option value="2">Cao đẳng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Kinh nghiệm :</label>
                            </div>
                            <div class="col-md-9">
                                <select name=""  id="" class="form-control">
                                    <option value="1">1 year</option>
                                    <option value="2">2 year</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Mức lương mong muốn :</label>
                            </div>
                            <div class="col-md-9">
                                <select name=""  id="" class="form-control">
                                    <option value="1">1 triệu</option>
                                    <option value="2">2 triệu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="hcenter">
                        <button type="submit" style="width: 48%" class="btn btn-primary hbtn"><i class="fa fa-save"></i>&nbsp;Cập nhật</button>
                    </div>
                    <script type="text/javascript">
                        $('#setting-career').select2({
                            width:'100%'
                        });
                        $('#setting-location').select2({
                             width:'100%'
                        });
                    </script>   
                </form> 
        </section>
        <!-- banner quảng cáo -->
        <aside class="sidebar col-sm-3">
            <?php $this->load->view('profile/profile_right'); ?> 
        </aside>
        <!-- end banner quảng cáo -->
    </div>
</div>
</main>