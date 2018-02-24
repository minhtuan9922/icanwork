<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title"><i class="fa fa-newspaper-o"></i>&nbsp;Đăng tin tuyển dụng</h2>
                <form action="" method="POST" id="register-job" role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Vị trí tuyển dụng :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="vacancies" id="vacancies" placeholder="vd: lập trình viên PHP" value="<?php echo (isset($validation) && $validation == true) ? html_entity_decode(set_value('vacancies')) : ''; ?>" required>
                                <?php echo form_error('vacancies') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Số lượng :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="number" name="number" min=1 max=100 value="<?php echo (isset($validation) && $validation == true) ? set_value('number') : '1'; ?>" required>
                                <?php echo form_error('number') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Cấp bậc :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="rank" id="rank" class="form-control" required>
                                    <?php foreach ($rank as $key => $value): ?>
                                        <option <?php echo (isset($validation) && $validation == true && set_value('rank') == $value['rank_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['rank_id'] ?>"><?php echo $value['rank_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('rank') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Loại hình công việc :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="type_work[]" id="type_work" class="form-control" multiple="" required>
                                    <?php foreach ($type_work as $key => $value): ?>
                                        <option <?php echo (isset($validation) && $validation == true && set_value('type_work[]') == $value['work_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['work_id'] ?>"><?php echo $value['work_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('type_work[]') ?>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $('#type_work').select2({
                            with: '100%',
                            placeholder: 'Chọn không quá 2 loại hình công việc',
                            allowClear: true,// clear all
                            maximumSelectionLength: 2, //limit number
                            language: 
                            { 
                                'noResults': function () 
                                {
                                    return 'No found';
                                }, 
                                'maximumSelected': function () 
                                {
                                    return 'You can only 2 select items';
                                },
                            },
                        });
                    </script>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Mức lương :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="wage" id="wage" class="form-control" required>
                                    <?php foreach ($wage as $key => $value): ?>
                                        <option <?php echo (isset($validation) && $validation == true && set_value('wage') == $value['wage_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['wage_id'] ?>"><?php echo $value['wage_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('wage') ?>
                                <input type="checkbox" <?php echo (isset($validation) && $validation == true && set_value('percent') == 1) ? 'checked="checked"' : ''; ?> name="percent" id="percent" value="1"> <span style="color:#e4305a">Phần trăm hoa hồng</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Kinh nghiệm :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="exp" id="exp" class="form-control" required>
                                    <?php foreach ($experience as $key => $value): ?>
                                        <option <?php echo (isset($validation) && $validation == true && set_value('exp') == $value['exp_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['exp_id'] ?>"><?php echo $value['exp_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('exp') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Bằng cấp :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="certificate" id="certificate" class="form-control" required>
                                    <option value="0">Không yêu cầu</option>
                                    <?php foreach ($education as $key => $value): ?>
                                        <option <?php echo (isset($validation) && $validation == true && set_value('certificate') == $value['edu_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['edu_id'] ?>"><?php echo $value['edu_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('certificate') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Giới tính :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="gender" id="gender" class="form-control" required>
                                    <option <?php echo (isset($validation) && $validation == true && set_value('gender') == 0) ? 'selected="selected"' : ''; ?> value="0">Không yêu cầu</option>
                                    <option <?php echo (isset($validation) && $validation == true && set_value('gender') == 1) ? 'selected="selected"' : ''; ?> value="1">Nam</option>
                                    <option <?php echo (isset($validation) && $validation == true && set_value('gender') == 2) ? 'selected="selected"' : ''; ?> value="2">Nữ</option>
                                </select>
                                <?php echo form_error('gender') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Đỉa điểm làm việc :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="location[]" id="location" class="form-control" multiple="" required>
                                    <?php foreach ($location as $key => $value): ?>
                                        <option <?php echo (isset($validation) && $validation == true && set_value('location[]') == $value['loca_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['loca_id'] ?>"><?php echo $value['loca_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('location[]') ?>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $('#location').select2({
                            with: '100%',
                            placeholder: 'Chọn không quá 2 đỉa điểm làm việc',
                            allowClear: true,// clear all
                            maximumSelectionLength: 2, //limit number
                            language: 
                            { 
                                'noResults': function () 
                                {
                                    return 'No found';
                                }, 
                                'maximumSelected': function () 
                                {
                                    return 'You can only 2 select items';
                                },
                            },
                        });
                    </script>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Ngành nghề :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="career" id="career" class="form-control" required>
                                    <option value="">Chọn ngành nghề</option>
                                    <?php foreach ($career as $key => $value): ?>
                                        <option <?php echo (isset($validation) && $validation == true && set_value('career') == $value['career_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['career_id'] ?>"><?php echo $value['career_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('career') ?>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $('#career').select2({
                            with: '100%',
                        });
                    </script>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Mô tả công việc :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="description" id="description" style="height: 150px" class="form-control" placeholder="Mô tả công việc cho người tuyển dụng, ít nhất 100 ký tự." required><?php echo (isset($validation) && $validation == true) ? html_entity_decode(set_value('description')) : ''; ?></textarea>
                                <?php echo form_error('description') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Quyền lợi :</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="interest" id="interest" style="height: 150px" class="form-control" placeholder="Giới thiệu quyền lợi khi làm công ty, ít nhất 50 ký tự."><?php echo (isset($validation) && $validation == true) ? html_entity_decode(set_value('interest')) : ''; ?></textarea>
                                <?php echo form_error('interest') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Yêu cầu công việc :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="requirement_job" id="requirement_job" style="height: 150px" class="form-control" placeholder="Yêu cầu công việc, ít nhất 50 ký tự." required><?php echo (isset($validation) && $validation == true) ? html_entity_decode(set_value('requirement_job')) : ''; ?></textarea>
                                <?php echo form_error('requirement_job') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Hạn nộp hồ sơ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" name="deadline" id="deadline" value="<?php echo (isset($validation) && $validation == true) ? set_value('deadline') : ''; ?>" class="form-control"  title="" min="<?php echo date('Y-m-d'); ?>" required>
                                <?php echo form_error('deadline') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Ngôn ngữ hồ sơ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="language" id="language" class="form-control" required>
                                     <option value="0">Không yêu cầu</option>
                                    <?php foreach ($language as $key => $value): ?>
                                        <option <?php echo (isset($validation) && $validation == true && set_value('language') == $value['lang_id']) ? 'selected="selected"' : ''; ?> value="<?php echo $value['lang_id'] ?>"><?php echo $value['lang_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php echo form_error('language') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                       <?php  
                       $obj = json_decode($recruit['user_contact_json']);
                       ?>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tên người liên hệ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name_contact" id="name_contact" value="<?php echo (isset($validation) && $validation == true) ? html_entity_decode(set_value('name_contact')) : html_entity_decode($obj->name_contact); ?>" placeholder="Tên người liên hệ" required>
                                <?php echo form_error('name_contact') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Email người liên hệ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="email_contact" class="form-control" id="email_contact" value="<?php echo (isset($validation) && $validation == true) ? html_entity_decode(set_value('email_contact')) : $obj->email_contact; ?>" placeholder="Email người liên hệ" required>
                                <?php echo form_error('email_contact') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Điện thoại người liên hệ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="phone_contact" class="form-control" id="phone_contact" value="<?php echo (isset($validation) && $validation == true) ? set_value('phone_contact') : $obj->phone_contact; ?>" placeholder="Điện thoại người liên hệ" required>
                                <?php echo form_error('phone_contact') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="accept">Vui lòng xem qua <a href=""><strong>Điều khoản đăng tuyển dụng </strong></a> của I can work</p>
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
                        <button type="submit" style="width: 50%" class="btn btn-primary hbtn"><i class="fa fa-add"></i>&nbsp;Đăng tuyển dụng</button>
                    </div>   
                </form>
        </section>
        <aside class="sidebar col-sm-3">
            <!--RIGHT -->
            <?php $this->load->view('profile/profile_right'); ?>  
        </aside>
    </div>
</div>
</main>