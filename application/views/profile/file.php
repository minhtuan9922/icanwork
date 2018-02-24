<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title"><i class="fa fa-paperclip"></i>&nbsp;Đính kèm file máy tính</h2>
                <form action="" method="POST" id="register-job" role="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tên file :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="file_name" class="form-control" id="file_name" value="<?php echo set_value('file_name'); ?>" placeholder="Tên file" required>
                                <?php echo form_error('file_name'); ?> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">File :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="file_cv" id="file_cv" value="" placeholder="" required>
                                <span class="label label-warning"><strong>Lưu ý:</strong> Chỉ nhận file pdf.</span>
                                <?php if (!empty($error)): ?>
                                    <div class="error alert alert-danger alert-dismissable fade in"><?php echo $error; ?><a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a></div>
                                <?php endif ?>
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
                        <button type="submit"  name="btn_file" class="btn btn-primary hbtn"><i class="fa fa-save"></i>&nbsp;Lưu</button>
                        <button type="submit"  name="view_file" id="view_file" class="btn btn-primary hbtn"><i class="fa fa-eye"></i>&nbsp;Xem trước file</button>
                    </div> 
                </form>
                <div class="form-group hform" style="padding: 0px 20px 0px 40px;" id="chose-profile" >
                </div>
                <script type="text/javascript">
                    var view_file = '';
                    $('#file_cv').on('change', function(evt) {
                        var tgt = evt.target || window.event.srcElement,
                        files = tgt.files;
                        if (files && files.length) 
                        {
                            $extension=['application/pdf'];
                            if (jQuery.inArray(files[0]['type'],$extension) == -1)
                            {
                                alert('Không phải định dạng file pdf');
                                $('#chose-profile').html('');
                                $('#file_cv').val('');
                                evt.preventDefault();
                                return;
                            }
                            if (Math.round(files[0]['size']/1024) > 1024*5)
                            {
                                alert('Kích thước file không được quá 5M');
                                $('#chose-profile').html('');
                                $('#file_cv').val('');
                                evt.preventDefault();
                                return;
                            }
                            view_file = files;         
                        }
                    });
                    $('#view_file').click(function(e){
                        e.preventDefault();
                        if (view_file && view_file.length) 
                        {
                            var fr = new FileReader();
                            fr.onload = function () {
                               $('#chose-profile').html(' <iframe src="'+fr.result+'" style="width:100%; height:600px; border:0;">Chỉ đọc trước file pdf</iframe>');
                           }
                           fr.readAsDataURL(view_file[0]);   
                        } 
                        else {
                            alert('Bạn chưa chọn file');
                        }
                    });
                    $('button[name="btn_file"]').click(function(e){
                        if ($('#file_name').val() == '' )
                        {
                            return;
                        }
                        if ($('#file_cv').val() == '' )
                        {
                            return;
                        }
                        if (!confirm('Bạn có muốn lưu'))
                        {
                            e.preventDefault();
                        }
                    });
                </script>
            </section>
            <aside class="sidebar col-sm-3">
                <!--RIGHT -->
                <?php $this->load->view('profile/profile_right'); ?>  
            </aside>
        </div>
    </div>
</main>