<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title">Tại sạo bạn phải sài I CAN WORK</h2>
                <div class="entry">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam congue lectus diam, sit amet cursus massa efficitur sed. Pellentesque efficitur dolor tellus, sit amet vestibulum leo facilisis ac. Nullam vitae fringilla neque. Aliquam erat nunc, vestibulum at suscipit quis, consequat nec lorem. Phasellus porttitor mollis fermentum. Nulla eu eros libero. Donec semper, urna a rhoncus rutrum, nulla neque dignissim neque, nec congue tortor enim id mauris. Nulla euismod dolor lacus, porttitor imperdiet elit ornare nec. In finibus non justo id viverra.</p>

                    <p>Nullam rhoncus lorem quis lobortis euismod. Aliquam ornare et sem ut commodo. Maecenas nec velit neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer ullamcorper blandit eros, tincidunt tincidunt lacus rutrum at. Duis convallis luctus velit, nec ultricies arcu imperdiet eu. Quisque laoreet enim et gravida commodo.</p>

                    <p>Curabitur felis nibh, porttitor eu nibh cursus, suscipit placerat dui. Donec nec aliquet enim. Quisque aliquet placerat fringilla. Nulla sed hendrerit lacus. Quisque consectetur mattis turpis eu ullamcorper. Nunc vehicula, tellus ac laoreet cursus, massa felis mattis enim, vitae luctus nisi leo nec ante. Suspendisse potenti. Cras at orci euismod, scelerisque ligula in, porttitor dui.</p>

                    <p>Curabitur euismod lobortis sapien. Maecenas magna ligula, vulputate in nulla ac, tincidunt suscipit erat. Sed ac tempor nisi. Suspendisse laoreet, odio et consequat varius, sem urna convallis leo, egestas malesuada elit erat id tellus. Suspendisse scelerisque in felis at pretium. Maecenas dictum quam posuere ex hendrerit tempus. Donec vehicula quis erat quis sollicitudin. Vestibulum ultrices vitae arcu quis dignissim. Donec sagittis tincidunt arcu id pellentesque. Nullam eu risus tristique, mattis arcu laoreet, sagittis purus. Nulla facilisi. Nam ac justo quis elit pharetra scelerisque. Curabitur et dapibus ex. In quis pretium turpis. Aliquam tincidunt quam interdum, faucibus odio a, porttitor dui.</p>

                    <p>Aenean non dapibus ante, sed dictum enim. Maecenas elementum auctor imperdiet. Nam eu mi placerat, dignissim libero condimentum, ornare est. Nunc euismod viverra sapien quis porttitor. Fusce eleifend quam quis nibh dictum scelerisque in vel lacus. Duis ac risus quis eros pretium lobortis. In malesuada est est.</p>                        
                </div>
            </section>
            <aside class="sidebar col-sm-3">
                <div class="widget">
                    <h4 style="margin-left: 0px;">Đăng Nhập</h4>
                    <div class="form-login">
                        <form action="" method="POST" role="form" style="margin-bottom: 0px;">
                            <div class="form-group">
                                <label for="">Email :</label>
                                <input type="email" name="email" class="form-control" id="" value="<?php echo (isset($validation) && $validation == true) ? set_value('email') : ''; ?>" placeholder="Email" required>
                                <?php echo form_error('email'); ?>
                            </div>
                             <div class="form-group">
                                <label for="">Mật khẩu :</label>
                                <input type="password" class="form-control" name="password" id="" value="<?php echo (isset($validation) && $validation == true) ? set_value('password') : ''; ?>" placeholder="Mật khẩu" required>
                                <?php echo form_error('password'); ?>
                            </div>
                            <?php 
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
                            <button type="submit" class="btn btn-primary hbtn"><i class="fa fa-user"></i>&nbsp;Đăng Nhập</button>
                            <?php 
                            if (!empty($type) && $type == 1)
                            {
                                ?>
                                <a  class="btn btn-primary " style="width: 100%; margin-bottom: 5px;"><i class="fa fa-facebook"></i>&nbsp;Đăng Nhập Bằng Facebook</a>
                                <a class="btn btn-danger " style="width: 100%;" ><i class="fa fa-google"></i>&nbsp;Đăng Nhập Bằng Google</a>
                                <?php 
                            }
                            ?>
                            <a href="<?php echo base_url('register').'/'.$type; ?>" id="register" title="">Đăng Ký</a>
                            <a href="<?php echo base_url('forget-password') ?>" id="forget" title="">Quên Mật Khẩu ?</a>
                        </form>
                        
                    </div>        
                </div>
                <img src="<?php echo base_url('asset/'); ?>img/banner1.jpg" class="img-responsive" style="width: 100%;" alt="Post" title="banner Quảng Cáo">
            </aside>
        </div>
    </div>
</main>