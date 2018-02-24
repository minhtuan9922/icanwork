<h2 class="page-title"><img src="<?php echo base_url('asset/img/icon/suitcase.png'); ?>" style="width: 18px;" alt="">&nbsp;KINH NGHIỆM LÀM VIỆC<span data-toggle="collapse" data-target="#info-exp-job" id="click-exp-job" class="glyphicon glyphicon-chevron-down" style="float:right;cursor: pointer;"></span></h2>
<div class="row collapse in" id="info-exp-job">
    <div class="entry" id="text-exp-job">
       <?php $this->load->view('profile/personal/text_exp_job'); ?>
    </div>
    <div class="entry" id="form-exp-job">
        <div class="panel panel-default profile">
            <div class="panel-body">
                <div class="row" style="padding: 0px 15px;">
                   <form action="" method="POST" id="register-job" role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Tên công ty :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="name_company" name="name_company" placeholder="vd: Công ty DSI Việt" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Chức danh :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="office" name="office" placeholder="vd: IT" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Mức lương :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                               <div class="row">
                                    <div class="col-md-10" style="padding-right:2px; ">
                                        <input type="number" min="0" step="1" name="num_wage" id="num_wage" class="form-control" id="" placeholder="Nhập mức lương" required="">
                                    </div>
                                    <div class="col-md-2" style="padding-left:2px; ">
                                        <select name="currency" id="currency" class="form-control" required="">
                                            <option value="1">VND</option>
                                            <option value="2">USD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Thời gian :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6" >
                                        <input type="date" name="time_start" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="time_start" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" name="time_end" max="<?php echo date('Y-m-d'); ?>" class="form-control" id="time_end" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Mô tả công việc :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="" class="form-control" name="des_job" id="des_job"  style="height: 150px;" placeholder="Nhập mô tả công việc ít nhất 50 ký tự" required=""></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hcenter">
                        <button type="submit" id="save-exp-job" value="1" class="btn btn-primary "><i class="fa fa-edit"></i>&nbsp;Lưu</button>
                        <button type="submit" id="exit-exp-job" class="btn btn-danger "><i class="fa fa-remove"></i>&nbsp;Hủy</button>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $('#time_start').change(function(e){
       var time_start    = $('#time_start').val();
       $('#time_end').attr('min',time_start);
   });
    $('#save-exp-job').click(function(e){
        
        var name_company      = $('#name_company').val(),
            office            = $('#office').val(),
            num_wage          = $('#num_wage').val(),
            currency          = $('#currency').val(),
            time_start        = $('#time_start').val();
            time_end          = $('#time_end').val();
            description       = $('#des_job').val();
            id                = $('#save-exp-job').val();
        if (name_company == '' || office == '' || num_wage == '' || time_start == '' || time_end == '' || description == '' )
        {
            return;
        }
        e.preventDefault();
        if (description.length < 50)
        {
            alert('Mô tả ít nhật 50 ký tự');
            return;
        }
        $.ajax({
            url: '<?php echo base_url('work-exp'); ?>',
            type: 'post',
            dataType: 'json',
            data: {name_company: name_company, office: office, num_wage: num_wage, currency: currency, time_start: time_start,time_end: time_end,des_job: description, 'csrf_test_name' : getToken(),id: id},
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
                $('#time_start').after(result.errors.time_start);
                $('#num_wage').after(result.errors.num_wage);
            } else if (result.successful == true)
            {
                $('div[name="error"]').remove();
                $('#text-exp-job').show();
                $('#form-exp-job').hide();
                $('#text-exp-job').html(result.html_work_exp);
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
        });
    });
</script>
<script type="text/javascript">
    <?php 
        if (!empty($info['work_experience_json']))
        {
            echo "$('#text-exp-job').show();
                $('#form-exp-job').hide();";
        } else {
            echo "$('#text-exp-job').hide();
                $('#form-exp-job').show();";
        }
    ?>
    $('#exit-exp-job').click(function(e){
        e.preventDefault();
        $('#text-exp-job').show();
        $('#form-exp-job').hide();
    });
</script>