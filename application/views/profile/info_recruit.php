<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title"><i class="fa fa-user-circle"></i>&nbsp;Thông tin nhà tuyển dụng</h2>
                <form action="" method="POST" id="register-job" role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Email :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" placeholder="Email" disabled="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Mật khẩu :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="" placeholder="Mật khẩu">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Nhập lại mật khẩu :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="" placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tên công ty :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" placeholder="Tên công Ty">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Ngày thành lập công ty :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Đỉa chỉ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" placeholder="Đỉa chỉ">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Điện thoại :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" placeholder="Điện thoại">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tỉnh/Thành phố :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="" id="input" class="form-control">
                                    <option value="1">Hồ Chí Minh</option>
                                    <option value="2">Hà Nội</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Qui mô :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="" id="input" class="form-control">
                                    <option value="1">10 - 100 Người</option>
                                    <option value="2">Không xác định</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Fax :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" placeholder="Fax">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Website :</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" placeholder="Fax">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $('#file').change(function(evt){
                                console.log($('#file').val());
                                if ($('#file').val() != '')
                                {
                                     //use filereader read image
                                     var tgt = evt.target || window.event.srcElement,
                                     files = tgt.files;
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
                               <textarea style="height: 300px" name="" class="form-control" placeholder="Mô tả sơ về công ty"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tên người liên hệ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" placeholder="Tên người liên hệ">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Email người liên hệ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" placeholder="Email người liên hệ">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Điện thoại người liên hệ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="" placeholder="Điện thoại người liên hệ">
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
                        <button type="submit" style="width: 50%" class="btn btn-primary hbtn"><i class="fa fa-key"></i>&nbsp;Đăng ký</button>
                    </div>   
                </form>
                 <h2 class="page-title"><i class="fa fa-lock"></i>&nbsp;Đổi mật khẩu</h2>
                 <div class="row">
                    <div class="col-md-12">
                        <form action="" method="POST" accept-charset="utf-8">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Mật khẩu cũ :<font size="3" color="#FF0000">*</font></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="" placeholder="Mật khẩu cũ">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Mật khẩu mới :<font size="3" color="#FF0000">*</font></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="" placeholder="Mật khẩu mới">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Nhập lại mật khẩu mới :<font size="3" color="#FF0000">*</font></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" id="" placeholder="Nhập lại mật khẩu mới">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="hcenter">
                            <button type="submit" style="width: 50%" class="btn btn-primary hbtn"><i class="fa fa-save"></i>&nbsp;Cập nhật</button>
                        </div>  
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