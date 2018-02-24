<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title"><i class="fa fa-lock"></i>&nbsp;Quên mật khẩu</h2>
                <form style="margin-bottom: 0px;" action="" method="POST" id="register-job" role="form">
                    <?php if (!$this->session->userdata('email_forget')): ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Nhập email :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" id="" value="<?php echo (isset($validation) && $validation == true) ? set_value('email') : ''; ?>" placeholder="Email" required>
                                <span class="label label-warning"><strong>Lưu ý:</strong> Vui lòng nhập đúng email để nhận mã </span>
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php if ($this->session->userdata('email_forget')): ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Mật khẩu :<font size="3" color="#FF0000">*</font></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" name="password" id="password" pattern="[a-zA-Z0-9]{8,}" value="<?php echo (isset($validation) && $validation == true) ? set_value('password') : ''; ?>" class="form-control" title="Mật khẩu lớn hơn 8 ký tự và không có ký tự đặc biệt"  placeholder="Mật khẩu" required>
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Nhập lại mật khẩu :<font size="3" color="#FF0000">*</font></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" name="confrim_pass" id="confirm_password" value="<?php echo (isset($validation) && $validation == true) ? set_value('confrim_pass') : ''; ?>" class="form-control"  placeholder="Nhập lại mật khẩu">
                                    <?php echo form_error('confrim_pass'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Mã xác nhận :<font size="3" color="#FF0000">*</font></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="code" id="code" value="<?php echo (isset($validation) && $validation == true) ? set_value('code') : ''; ?>" class="form-control"  placeholder="Nhập mã xác nhận">
                                    <?php echo form_error('code'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="hcenter">
                        <?php 
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                        ?>
                        <?php if (!$this->session->userdata('email_forget')): ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <button type="submit" style="width: 50%" name="forget" class="btn btn-primary hbtn"><i class="fa fa-send"></i>&nbsp;Lấy mã xác nhận</button>
                        <?php else: ?>
                        <?php 
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                        ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <button type="submit" style="width: 50%" name="save" class="btn btn-primary hbtn"><i class="fa fa-save"></i>&nbsp;Cập nhật</button>
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                    </div>   
                </form>
                <form action="" method="post" accept-charset="utf-8">
                    <?php 
                        $csrf = array(
                            'name' => $this->security->get_csrf_token_name(),
                            'hash' => $this->security->get_csrf_hash()
                        );
                    ?>
                    <div class="hcenter">
                         <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <button type="submit" style="width: 50%" name="undo" value="1" class="btn btn-primary hbtn"><i class="fa fa-undo"></i>&nbsp;Lấy mã xác nhận mới</button>
                    </div>
                </form>
                    <?php endif; ?>
            </section>
            <!-- banner quảng cáo -->
            <aside class="sidebar col-sm-3">
                <img src="<?php echo base_url('asset/'); ?>img/h2.jpg" class="img-responsive" alt="Post" title="banner Quảng Cáo">
                <hr id="line">
                <img src="<?php echo base_url('asset/'); ?>img/h1.jpeg" class="img-responsive" alt="Post" title="banner Quảng Cáo">
                <hr id="line">
                <img src="<?php echo base_url('asset/'); ?>img/h3.jpeg" class="img-responsive" alt="Post" title="banner Quảng Cáo">
            </aside>
            <!-- end banner quảng cáo -->
        </div>
    </div>
</main>