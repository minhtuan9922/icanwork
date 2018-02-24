<h2 class="page-title"><i class="glyphicon glyphicon-credit-card"></i>&nbsp;THÔNG TIN CHUNG<span data-toggle="collapse" data-target="#info-general" id="click-general" class="glyphicon glyphicon-chevron-down" style="float:right;cursor: pointer;"></span></h2>
<div class="row collapse in" id="info-general">
    <div class="entry" id="text-general">
       <!-- text -->
       <?php $this->load->view('profile/personal/text_general'); ?>
    </div>
    <div class="entry" id="form-general">
        <div class="panel panel-default profile">
            <div class="panel-body">
                <div class="row" style="padding: 0px 15px;">
                   <form id="register-job" role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tiêu đề hồ sơ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" pattern="[a-zA-Z0-9]{1,80}" title="Tiêu đề không quá 80 ký tự và không có ký tự đặc biệt" name="general_title" id="general_title" placeholder="Tiêu đề hồ sơ" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Trình độ học vấn :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="general_edu" id="general_edu" class="form-control" required="">
                                    <option value="">Chọn trình độ</option>
                                    <?php foreach ($education as $key => $value): ?>
                                        <option value="<?php echo $value['edu_id'] ?>"><?php echo $value['edu_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Số năm kinh nghiệm :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="general_exp" id="general_exp" class="form-control" required="">
                                    <option value="">Chọn kinh nghiệm</option>
                                    <?php foreach ($experience as $key => $value): ?>
                                        <option value="<?php echo $value['exp_id'] ?>"><?php echo $value['exp_name']; ?></option>
                                    <?php endforeach ?>
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
                                <select name="general_career" id="general_career" class="form-control" required="" multiple>
                                    <?php foreach ($career as $key => $value): ?>
                                        <option value="<?php echo $value['career_id'] ?>"><?php echo $value['career_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Loại hình công việc :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="general_type_work" id="general_type_work" class="form-control" required="" multiple>
                                    <?php foreach ($type_work as $key => $value): ?>
                                        <option value="<?php echo $value['work_id'] ?>"><?php echo $value['work_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Mức lương :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="general_wage" id="general_wage" class="form-control" required="">
                                    <option value="">Chọn mức lương</option>
                                    <?php foreach ($wage as $key => $value): ?>
                                        <option value="<?php echo $value['wage_id'] ?>"><?php echo $value['wage_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Cấp bậc :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="general_rank" id="general_rank" class="form-control" required="">
                                    <option value="">Chọn cấp bậc</option>
                                    <?php foreach ($rank as $key => $value): ?>
                                        <option value="<?php echo $value['rank_id'] ?>"><?php echo $value['rank_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Nơi làm việc :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="general_place" id="general_place" class="form-control" required="" multiple>
                                    <?php foreach ($location as $key => $value): ?>
                                        <option value="<?php echo $value['loca_id'] ?>"><?php echo $value['loca_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="hcenter">
                        <button type="submit" id="save-general" class="btn btn-primary "><i class="fa fa-edit"></i>&nbsp;Lưu</button>
                        <button type="submit" id="exit-general"  class="btn btn-danger "><i class="fa fa-remove"></i>&nbsp;Hủy</button>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#general_career').select2({
        width: '100%',
        placeholder: 'Chọn không quá 3 nghành nghề',
        allowClear: true,// clear all
        maximumSelectionLength: 3, //limit number
        language: 
        { 
            'noResults': function () 
            {
                return 'No found';
            }, 
            'maximumSelected': function () 
            {
                return 'You can only 3 select items';
            },
        },
    })
    $('#general_type_work').select2({
        width: '100%',
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
    })
    $('#general_place').select2({
        width: '100%',
        placeholder: 'Chọn không quá 2 nơi làm việc',
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
    })
</script>
<script type="text/javascript">
    $('#save-general').click(function(e){
        var general_title       = $('#general_title').val(),
            general_edu         = $('#general_edu').val(),
            general_exp         = $('#general_exp').val(),
            general_career      = $('#general_career').val(),
            general_type_work   = $('#general_type_work').val(),
            general_wage        = $('#general_wage').val(),
            general_rank        = $('#general_rank').val(),
            general_place       = $('#general_place').val()
            ;
        if (general_title == '' || general_title.length > 80 ){return;}
        if (general_career == ''){ return; }
        if (general_exp == ''){  return; }
        if (general_career == '') {return;}
        if (general_type_work == ''){return;}
        if (general_wage == ''){return;}
        if (general_rank == ''){return;}
        if (general_place == ''){return;}
        e.preventDefault();
        $.ajax({
            url: '<?php echo base_url('info-general'); ?>',
            type: 'post',
            dataType: 'json',
            data: {general_title: general_title, 'csrf_test_name' : getToken(), general_edu: general_edu, general_exp: general_exp, general_career: general_career , general_type_work:  general_type_work , general_wage: general_wage, general_rank: general_rank, general_place:  general_place },
        })
        .done(function(result) {
            console.log(result);
            if (result.validation == false)
            {
               $.each(result.errors, function(index, value) {
                    var element = $("#"+index);
                    $(element)
                    .closest('.form-group')
                    .find('div[name="error"]').remove();
                    $(element).after(value);
                });
            } else if (result.successful == true)
            {
                alert('Thành Công');
                $('div[name="error"]').remove();
                $('#text-general').html(result.html_general);
                $('#text-general').show();
                $('#form-general').hide();
            } else {
                alert('Thất bại');
            }
        })
        .fail(function() {
            console.log("error");
        })
    });
</script>
<script type="text/javascript">
    <?php 
        if (!empty($info['title']))
        {
            echo "$('#text-general').show();
                $('#form-general').hide();";
        } else {
            echo "$('#text-general').hide();
                $('#form-general').show();";
        }
    ?>
    $('#exit-general').click(function(e){
        e.preventDefault();
        $('#text-general').show();
        $('#form-general').hide();
    });
</script>
</div>