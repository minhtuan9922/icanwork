<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <?php 
                if (!empty($type) && $type == 1)
                {
                    ?>
                <h2 class="page-title"><i class="fa fa-user-circle"></i>&nbsp;Đăng Ký ứng viên</h2>
                <form action="" method="POST" id="register-job" role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Email :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" id="" value="<?php echo (isset($validation) && $validation == true) ? set_value('email') : ''; ?>" placeholder="Email" required>
                                <span class="label label-warning"><strong>Lưu ý:</strong> Vui lòng nhập đúng email để kích hoạt</span>
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Mật khẩu :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" name="password" id="password" pattern="[a-zA-Z0-9]{8,}" value="<?php echo (isset($validation) && $validation == true) ? set_value('password') : ''; ?>" class="form-control"  placeholder="Mật khẩu" required>
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
                                <label for="">Họ tên :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="fullname" value="<?php echo (isset($validation) && $validation == true) ? set_value('fullname') : ''; ?>" class="form-control" id="" placeholder="Họ tên" required>
                                <?php echo form_error('fullname'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Ngày sinh :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" max="<?php echo date('Y-m-d'); ?>" name="birthday" value="<?php echo (isset($validation) && $validation == true) ? set_value('birthday') : ''; ?>" class="form-control" id="" placeholder="" required>
                                <?php echo form_error('birthday'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Giới tính :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="gender" id="input" class="form-control" required="">
                                    <option <?php echo (isset($validation) && $validation == true && set_value('gender') == 1) ? 'selected="selected"' : ''; ?> value="1">Nam</option>
                                    <option <?php echo (isset($validation) && $validation == true && set_value('gender') == 2) ? 'selected="selected"' : ''; ?> value="2">Nữ</option>
                                </select>
                                <?php echo form_error('gender'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Số điện thoại :<font size="3"  color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="phone" pattern="[0-9]{10,13}" value="<?php echo (isset($validation) && $validation == true) ? set_value('phone') : '' ?>" class="form-control" id="" placeholder="Số điện thoại" required>
                                <span class="label label-warning"><strong>Lưu ý:</strong> Vui lòng nhập đúng số điệm thoại để nhà tuyển dụng liên hệ</span>
                                <?php echo form_error('phone'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="accept">Bằng việc nhấn nút đăng kí bạn đã đồng ý với <a href=""><strong>Điều khoản của chúng tôi</strong></a> của I can work</p>
                            </div>       
                        </div>
                    </div>
                    <div class="hcenter">
                        <?php 
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                        ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <button type="submit" style="width: 50%" name="seeker" class="btn btn-primary hbtn"><i class="fa fa-key"></i>&nbsp;Đăng ký</button>
                    </div>   
                </form>
                <script type="text/javascript">
                    var password = document.getElementById("password")
                    , confirm_password = document.getElementById("confirm_password");
                    function validatePassword()
                    {
                        if (password.value.length < 8)
                        {
                            password.setCustomValidity("Mat khau lon hon 8 ky tu");
                        }
                        else 
                        {
                            password.setCustomValidity('');
                        }
                        if(password.value != confirm_password.value) 
                        {
                            confirm_password.setCustomValidity("Passwords Don't Match");
                        } 
                        else 
                        {
                            confirm_password.setCustomValidity('');
                        }
                    }
                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
                    message_validation('input','fullname','Vui long nhap ten');
                </script>
                <?php 
                } 
                else 
                {
                    ?>
                <!-- register employer -->
                <h2 class="page-title"><i class="fa fa-user-circle"></i>&nbsp;Đăng Ký nhà tuyển dụng</h2>
                <form action="" method="POST" id="register-job" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Email :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control" value="<?php echo (isset($validation) && $validation == true) ? set_value('email') : ''; ?>" id="email" name="email" placeholder="Email" required>
                                <span class="label label-warning"><strong>Lưu ý:</strong> Vui lòng nhập đúng email để kích hoạt</span>
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Mật khẩu :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" pattern="[a-zA-Z0-9]{8,}" title="Mật khẩu phải lớn hơn 8 ký tự và không có ký tự đặc biệt như: &.*..." value="<?php echo (isset($validation) && $validation == true) ? set_value('password') : ''; ?>" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
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
                                <input type="password" value="<?php echo (isset($validation) && $validation == true) ? set_value('confrim_password') : ''; ?>" class="form-control" id="confrim_password" name="confrim_password" placeholder="Nhập lại mật khẩu" required>
                                <?php echo form_error('confrim_password'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tên công ty :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" name="name_company" value="<?php echo (isset($validation) && $validation == true) ? set_value('name_company') : ''; ?>" placeholder="Tên công Ty" required>
                                <?php echo form_error('name_company'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Ngày thành lập công ty :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="" name="date_constitutive" value="<?php echo (isset($validation) && $validation == true) ? set_value('date_constitutive') : ''; ?>" placeholder="" required>
                                <?php echo form_error('date_constitutive'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Đỉa chỉ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" name="address" value="<?php echo (isset($validation) && $validation == true) ? set_value('address') : ''; ?>" placeholder="Đỉa chỉ" required>
                                <?php echo form_error('address'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Điện thoại :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" pattern="[0-9]{10,13}" title="SDT từ 10 đến 13 số .vd:0909947455" name="phone" id="" value="<?php echo (isset($validation) && $validation == true) ? set_value('phone') : ''; ?>" placeholder="Điện thoại" required>
                                <?php echo form_error('phone'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tỉnh/Thành phố :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select  id="province_city" name="province_city" class="form-control" required="">
                                    <?php foreach ($location as $key => $value): ?> 
                                        <option <?php echo (isset($validation) && $validation == true && set_value('province_city') == $value['loca_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['loca_id']; ?>"><?php echo $value['loca_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('province_city'); ?>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $('#province_city').select2({
                                width: "100%"
                            });
                        </script>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Qui mô :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select  id="input" name="scale" class="form-control" required>
                                    <?php foreach ($scale as $key => $value): ?> 
                                        <option <?php echo (isset($validation) && $validation == true && set_value('province_city') == $value['scale_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['scale_id']; ?>"><?php echo $value['scale_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('scale'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Fax :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="fax" id="" value="<?php echo (isset($validation) && $validation == true) ? set_value('fax') : ''; ?>" placeholder="Fax">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Website :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="website" id="" value="<?php echo (isset($validation) && $validation == true) ? set_value('website') : ''; ?>" placeholder="Website">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Logo công ty :</label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <label for="file" class="file" >
                                            <img id="logo-company" src="<?php echo base_url('asset/'); ?>img/h2.jpg" width="100" height="100" alt="logo">
                                            <input type="file" style="display: none" name="file" id="file" value="" placeholder="">
                                            <i class="fa fa-camera">&nbsp;Logo</i>
                                        </label>
                                    </div>
                                    <div class="col-xs-9">
                                        - Logo phải có định dạng png, pdf, jpg, jpeg.
                                        <br>
                                        - Dung lượng file không quá 1MB
                                        <?php if (!empty($error)): ?> 
                                            <div class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $error; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $('#file').change(function(evt){
                                if ($('#file').val() != '')
                                {
                                    //use filereader read image
                                    var tgt = evt.target || window.event.srcElement,
                                    files = tgt.files;
                                    file_size=Math.round(files[0]['size']/1024);
                                    if (file_size > 1024)
                                    {
                                        alert('Kích thước file không được quá 1M');
                                        return;
                                    }
                                    $extension=['image/jpeg','image/png','image/bmp','image/gif','image/jpg'];
                                    if (jQuery.inArray(files[0]['type'],$extension) == -1)
                                    {
                                        alert('Không phải định dạng file png|pdf|jpg|jped');
                                        return;
                                    }
                                    if (files && files.length) {
                                        var fr = new FileReader();
                                        fr.onload = function () {
                                            $('#logo-company').attr('src',fr.result);
                                        }
                                        fr.readAsDataURL(files[0]);
                                    }
                                } else {
                                    $('#logo-company').attr('src','<?php echo base_url('asset/'); ?>img/h2.jpg');
                                }
                            });
                        </script>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Mô tả sơ lược về công ty :</label>
                            </div>
                            <div class="col-md-9">
                               <textarea style="height: 300px" name="description" class="form-control" placeholder="Mô tả sơ về công ty"><?php echo (isset($validation) && $validation == true) ? set_value('description') : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tên người liên hệ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" name="name_contact" value="<?php echo (isset($validation) && $validation == true) ? set_value('name_contact') : ''; ?>" placeholder="Tên người liên hệ" required>
                                <?php echo form_error('name_contact'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Email người liên hệ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="" name="email_contact" value="<?php echo (isset($validation) && $validation == true) ? set_value('email_contact') : ''; ?>" placeholder="Email người liên hệ" required>
                                <?php echo form_error('email_contact'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Điện thoại người liên hệ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" pattern="[0-9]{10,13}" title="SDT từ 10 đến 13 số .vd:0909947455" name="phone_contact" value="<?php echo (isset($validation) && $validation == true) ? set_value('phone_contact') : ''; ?>" placeholder="Điện thoại người liên hệ" required>
                                <?php echo form_error('phone_contact'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="accept">Bằng việc nhấn nút đăng kí bạn đã đồng ý với <a href=""><strong>Điều khoản của chúng tôi</strong></a> của I can work</p>
                            </div>       
                        </div>
                    </div>
                    <div class="hcenter">
                         <?php 
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                        ?>
                        <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                        <button type="submit" name="regis_recruit" value="1" style="width: 50%" class="btn btn-primary hbtn"><i class="fa fa-key"></i>&nbsp;Đăng ký</button>
                    </div>   
                </form>
                <script type="text/javascript">
                    var password = document.getElementById("password")
                    , confirm_password = document.getElementById("confrim_password");
                    function validatePassword()
                    {
                        if(password.value != confirm_password.value) 
                        {
                            confirm_password.setCustomValidity("Mật khẩu không trùng hớp");
                        } 
                        else 
                        {
                            confirm_password.setCustomValidity('');
                        }
                    }
                    password.onchange = validatePassword;
                    confirm_password.onkeyup = validatePassword;
                </script>
                <?php 
                }
                    ?>
                <!-- end employer --> 
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