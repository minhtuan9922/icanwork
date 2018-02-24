<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title"><i class="fa fa-user-circle"></i>&nbsp;Thông tin cá nhân</h2>
                <div class="row">
                    <form action="" method="POST" id="register-job" role="form" enctype="multipart/form-data">
                    <div class="col-md-3">
                        <div class="photo-user">
                         <label for="img-user">
                            <img src="<?php echo (!empty($info['img'])) ? base_url($info['img']) : base_url('asset/img/user-128.png'); ?>"  alt="">
                            <input type="file" name="img-user" id="img-user" style="display: none;" value="" placeholder="">
                            <div>
                                <i class="fa fa-camera"></i>&nbsp;Ảnh đại diễn
                                <button type="button" class="btn btn-danger"  style="display: none;"><i class="fa fa-remove"></i>&nbsp;Hủy Chọn</button>
                            </div>
                        </label>
                        <script type="text/javascript">
                            $('#img-user').change(function(evt){
                                if ($('#img-user').val() != '')
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
                                            $('.photo-user img').attr('src',fr.result);
                                        }
                                        fr.readAsDataURL(files[0]);
                                    }
                                    $('.photo-user button').css('display','block');
                                } else {
                                    $('.photo-user img').attr('src','<?php echo base_url('asset/img/user-128.png'); ?>');
                                }
                            });
                            $('.photo-user button').click(function(){
                                $('.photo-user img').attr('src','<?php echo base_url('asset/img/user-128.png'); ?>');
                                 $('.photo-user button').css('display','none');
                            })
                        </script>
                    </div>
                    <?php if (!empty($error)): ?> 
                        <div class="error alert alert-danger alert-dismissable fade in"><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $error; ?></div>
                    <?php endif; ?>
                    </div>
                    <div class="col-md-9">
                            <div class="form-group" >
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Email :</label>
                                    </div>
                                    <div class="col-md-9">
                                        <label  class="form-control" id="" placeholder="Email" disabled><?php echo $info['account_email']; ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Họ tên :<font size="3" color="#FF0000">*</font></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" id="" value="<?php echo (isset($validation) && $validation == true) ? set_value('name') : $info['name'] ?>" placeholder="Họ tên" required>
                                        <?php echo form_error('name'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Ngày sinh :<font size="3" color="#FF0000">*</font></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" class="form-control" name="birthday"  value="<?php echo (isset($validation) && $validation == true) ? set_value('birthday') : $info['birthday'] ?>" id="" placeholder="" required>
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
                                        <select id="input" name="gender" class="form-control" required>
                                            <option <?php echo ($info['gender'] == 1) ? 'selected="selected"' : '';?> value="1">Nam</option>
                                            <option <?php echo ($info['gender'] == 2) ? 'selected="selected"' : '';?> value="2">Nữ</option>
                                        </select>
                                        <?php echo form_error('gender'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Hôn nhân :<font size="3" color="#FF0000">*</font></label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="marriage" id="input"  class="form-control" required>
                                            <option <?php echo ($info['marriage'] == 1) ? 'selected="selected"' : '';?> value="1">Độc thân</option>
                                            <option <?php echo ($info['marriage'] == 2) ? 'selected="selected"' : '';?> value="2">Đã có gia đình</option>
                                        </select>
                                        <?php echo form_error('marriage'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Số điện thoại :<font size="3" color="#FF0000">*</font></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="phone" class="form-control" id=""  value="<?php echo (isset($validation) && $validation == true) ? set_value('phone') : $info['phone'] ?>" placeholder="Số điện thoại" required>
                                        <span class="label label-warning"><strong>Lưu ý:</strong> Vui lòng nhập đúng số điệm thoại để nhà tuyển dụng liên hệ</span>
                                        <?php echo form_error('phone'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Chổ ở hiện tại :<font size="3" color="#FF0000">*</font></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="address" class="form-control" id=""  value="<?php echo (isset($validation) && $validation == true) ? set_value('address') : $info['address'] ?>" placeholder="Chổ ở hiện tại" required>
                                        <?php echo form_error('address'); ?>
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
                                <button type="submit" style="width: 50%" name="update_candidate" class="btn btn-primary hbtn"><i class="fa fa-save"></i>&nbsp;Cập nhật</button>
                            </div>   
                        </form>
                    </div>
                </div>
                 <h2 class="page-title"><i class="fa fa-lock"></i>&nbsp;Đổi mật khẩu</h2>
                 <div class="row">
                    <div class="col-md-12">
                        <form action="change-pass" method="POST" accept-charset="utf-8">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Mật khẩu cũ :<font size="3" color="#FF0000">*</font></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="password" class="form-control" id="" placeholder="Mật khẩu cũ" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Mật khẩu mới :<font size="3" color="#FF0000">*</font></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" name="password_new"  pattern="[a-zA-Z0-9]{8,}" title="Mật khẩu phải lớn hơn 8 ký tự và không có ký tự đặc biệt như: &.*..." class="form-control" id="password_new" placeholder="Mật khẩu mới" required="">
                                        <?php echo ($this->session->flashdata('password_new')) ? $this->session->flashdata('password_new') : '';  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Nhập lại mật khẩu mới :<font size="3" color="#FF0000">*</font></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="confrim_pass_new" id="confrim_pass_new" placeholder="Nhập lại mật khẩu mới" required="">
                                        <?php echo ($this->session->flashdata('confrim_pass_new')) ? $this->session->flashdata('confrim_pass_new') : '';  ?>
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
                            <button type="submit" style="width: 50%" name="change_pass" value="1" class="btn btn-primary hbtn"><i class="fa fa-save"></i>&nbsp;Cập nhật</button>
                        </div>
                        <script type="text/javascript">
                            var password = document.getElementById("password_new")
                            , confirm_password = document.getElementById("confrim_pass_new");
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
                        </form>  
                    </div>
                 </div>
        </section>
        <aside class="sidebar col-sm-3">
            <!--RIGHT -->
            <?php $this->load->view('profile/profile_right'); ?>  
        </aside>
    </div>
</div>
</main>