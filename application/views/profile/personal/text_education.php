<div class="panel panel-default profile">
    <div class="panel-body">
        <?php 
        $json_education = json_decode($info['education_json']);
        if (!empty($json_education))
        {
            foreach ($json_education as $k => $val)
            {
                ?>
                <div class="row" style="padding: 0px 15px;" id="education-<?php echo $val->id; ?>" >
                    <div class="col-md-6">
                        <div class="dpres">
                            <span><b>Tên trường:</b></span>&nbsp;
                            <span class="lspan" id="edu-schools-<?php echo $val->id; ?>" ><?php echo $val->school; ?></span>
                        </div>
                        <div class="dpres">
                            <span><b>Chuyên ngành:</b></span>&nbsp;
                            <span class="lspan" id="edu-specialized-<?php echo $val->id; ?>" ><?php echo $val->specialized; ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dpres">
                            <span><b>Xếp loại:</b></span>&nbsp;
                                <?php foreach ($classify as $key => $value): ?>
                                    <?php if ($value['class_id'] == $val->classify): ?>
                                       <span class="lspan" id="edu-classify-<?php echo $val->id; ?>" value="<?php echo $value['class_id']; ?>"> 
                                        <?php echo $value['class_name']; break; ?>
                                        </span>
                                    <?php endif ?>
                                <?php endforeach ?>
                        </div>
                        <div class="dpres">
                            <span><b>Thời gian:</b></span>&nbsp;
                            <span class="lspan">
                                <span value="<?php  echo date_format(date_create($val->edu_begin),'m/d/Y'); ?>" id="edu-time-start-<?php echo $val->id; ?>"><?php  echo date_format(date_create($val->edu_begin),'d/m/Y'); ?></span> 
                                đến 
                                <span value="<?php echo date_format(date_create($val->edu_end),'m/d/Y'); ?>" id="edu-time-end-<?php echo $val->id; ?>"><?php echo date_format(date_create($val->edu_end),'d/m/Y'); ?></span>
                            </span>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-default" name="education-edit" value="<?php echo $val->id; ?>" href="#" role="button">&nbsp;Sửa</a>
                        <a class="btn btn-default" name="education-delete" value="<?php echo $val->id; ?>" href="#" role="button">&nbsp;Xóa</a>
                    </div>
                    <hr id="line">
                </div>
                <?php
            }
        }
        ?>
        <div class="btn-pers">
            <a class="btn btn-default" id="add-education" href="#" role="button"><i class="fa fa-plus"></i>&nbsp;Thêm</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    var number_education = 
    <?php
    if (!empty($info['education_json']))
    {
        $json_education = json_decode($info['education_json']);
        echo count($json_education);
    } else echo 0;
    ?>;
</script>
<script type="text/javascript">
    //delete
    $('a[name="education-delete"]').click(function(e){
        e.preventDefault();
        var id = $(this).attr('value');
        var r  = confirm('Bạn có muốn xóa không');
        if (r == true)
        {
            $.ajax({
                url: '<?php echo base_url("delete-edu"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {id: id, 'csrf_test_name': getToken()},
            })
            .done(function(result) {
                console.log(result);
                if (result.successful == true)
                {
                    $('#education-'+ id +'').remove();
                    number_education--;
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
        $('a[name="education-edit"]').click(function(e){
            e.preventDefault();
            var id = $(this).attr('value');
            var r  = confirm('Bạn có muốn sửa không');
            if (r == true)
            {
                $('#save-education').attr('value',id);
                var school          = $('#edu-schools-'+ id +'').html();
                var speciallized    = $('#edu-specialized-'+ id +'').html();
                var classify        = $('#edu-classify-'+ id +'').attr('value');
                var time_start      = new Date($('#edu-time-start-'+ id +'').attr('value'));
                var time_end        = new Date($('#edu-time-end-'+ id +'').attr('value'));
                $('#school').val(school);
                $('#specialized').val(speciallized);
                 $('#classify option').removeAttr('selected');
                $('#classify option[value="'+ classify +'"').attr('selected','selected');
                $('#edu_begin').val(format_date(time_start,'yyyy-mm-dd','-'));
                $('#edu_end').attr('min',format_date(time_start,'yyyy-mm-dd','-'));
                $('#edu_end').val(format_date(time_end,'yyyy-mm-dd','-'));
                $('#text-education').hide();
                $('#form-education').show();
            }
        });
</script>
<script type="text/javascript">
     $('#add-education').click(function(e){
        e.preventDefault();
        if (number_education < 3)
        {
            $('#school').val('');
            $('#specialized').val('');
            $('#classify').val('');
            $('#edu_begin').val('');
            $('#edu_end').val('');
            $('#text-education').hide();
            $('#form-education').show();
            $('#save-education').attr('value','1');
        } else {
            alert('Học vấn không được lớn hơn 3')
        }
    });
</script>