<?php 
    $json_exp_job = json_decode($info['work_experience_json']);
    if (!empty($json_exp_job))
    {
?>
 <div class="panel panel-default profile">
    <div class="panel-body">
        <?php foreach ($json_exp_job as $key => $value): ?>
        <div class="row" style="padding: 0px 15px;" id="work-exp-<?php echo $value->id; ?>">
            <div class="col-md-6">
                <div class="dpres">
                    <span><b>Tên công ty:</b></span>&nbsp;
                    <span class="lspan" id="company-<?php echo $value->id; ?>"><?php echo $value->name_company; ?></span>
                </div>
                <div class="dpres">
                    <span><b>Chức danh:</b></span>&nbsp;
                    <span class="lspan" id="office-<?php echo $value->id; ?>" ><?php echo $value->office; ?></span>
                </div>
                <div class="dpres">
                    <span><b>Mức lương:</b></span>&nbsp;
                    <span class="lspan" id="wage-<?php echo $value->id; ?>" value="<?php echo $value->num_wage ?>" ><?php echo number_format($value->num_wage,0,'.','.'); ?></span>
                    <span class="lspan" id="currency-<?php echo $value->id; ?>" value="<?php echo $value->id; ?>"><?php echo ($value->currency == 1) ? 'VND' : 'USD'; ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="dpres">
                    <span><b>Thời gian làm việc:</b></span>
                    <span class="lspan">
                    <span  value="<?php  echo date_format(date_create($value->time_start),'m/d/Y'); ?>" id="time_start-<?php echo $value->id; ?>"><?php  echo date_format(date_create($value->time_start),'d/m/Y'); ?></span> 
                    đến 
                    <span value="<?php echo date_format(date_create($value->time_end),'m/d/Y'); ?>" id="time_end-<?php echo $value->id; ?>"><?php echo date_format(date_create($value->time_end),'d/m/Y'); ?></span>
                    </span>
                </div>
                <div class="dpres">
                    <span><b>Mô tả công việc :</b></span>&nbsp;
                    <span class="lspan" id="description-<?php echo $value->id; ?>"><?php echo $value->description; ?></span>
                </div>
            </div>
            <div>
                <a class="btn btn-default" href="#" name="edit-exp" value="<?php echo $value->id; ?>" role="button">&nbsp;Sửa</a>
                <a class="btn btn-default" value="<?php echo $value->id; ?>" name="remove-exp" href="#" role="button">&nbsp;Xóa</a>
            </div>
        </div>
        <hr id="line">
        <?php endforeach ?>
        <div class="btn-pers">
            <a class="btn btn-default" id="add-exp-job" href="#" role="button"><i class="fa fa-plus"></i>&nbsp;Thêm</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    var number_exp = 
    <?php
    if (!empty($info['work_experience_json']))
    {
        $json_exp_job = json_decode($info['work_experience_json']);
        echo count($json_exp_job);
    } else echo 0;
    ?>;
</script>
<script type="text/javascript">
    //delete
    $('a[name="remove-exp"]').click(function(e){
        e.preventDefault();
        var id = $(this).attr('value');
        var r  = confirm('Bạn có muốn xóa không');
        if (r == true)
        {
            $.ajax({
                url: '<?php echo base_url("delete-exp"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {id: id, 'csrf_test_name': getToken()},
            })
            .done(function(result) {
                console.log(result);
                if (result.successful == true)
                {
                    $('#work-exp-'+ id +'').remove();
                    number_exp--;
                } else {
                    alert('Thất bại');
                }
            })
            .fail(function() {
                console.log("error");
            })  
        }
    });
    //edit
    $('a[name="edit-exp"]').click(function(e){
        e.preventDefault();
        var id = $(this).attr('value');
        var r  = confirm('Bạn có muốn sửa không');
        if (r == true)
        {
            $('#save-exp-job').attr('value',id);
            var company         = $('#company-'+ id +'').html();
            var office          = $('#office-'+ id +'').html();
            var wage            = $('#wage-'+ id +'').attr('value');
            var description     = $('#description-'+ id +'').html();
            var currency        = $('#currency-'+ id +'').attr('value');
            var time_start      = new Date($('#time_start-'+ id +'').attr('value'));
            var time_end        = new Date($('#time_end-'+ id +'').attr('value'));
            $('#name_company').val(company);
            $('#office').val(office);
            $('#num_wage').val(wage);
            $('#des_job').val(description);
            $('#currency option').removeAttr('selected');
            $('#currency option[value="'+ currency +'"').attr('selected','selected');
            $('#time_start').val(format_date(time_start,'yyyy-mm-dd','-'));
            $('#time_end').attr('min',format_date(time_start,'yyyy-mm-dd','-'));
            $('#time_end').val(format_date(time_end,'yyyy-mm-dd','-'));
            $('#text-exp-job').hide();
            $('#form-exp-job').show();
        }
    });
</script>
<script type="text/javascript">
     $('#add-exp-job').click(function(e){
        e.preventDefault();
        if (number_education < 3)
        {
            $('#name_company').val('');
            $('#office').val('');
            $('#num_wage').val('');
            $('#des_job').val('');
            $('#currency option').removeAttr('selected');
            $('#time_start').val('');
            $('#time_end').attr('');
            $('#time_end').val('');
            $('#save-exp-job').attr('value','1');
            $('#text-exp-job').hide();
            $('#form-exp-job').show();
        } else {
            alert('Kinh nghiệm làm việc tối đa 3 công ty');
        }
    });
</script>
<?php 
    }
?>