<h2 class="page-title"><i class="glyphicon glyphicon-education"></i>&nbsp;HỌC VẤN<span data-toggle="collapse" data-target="#info-education" id="click-education" class="glyphicon glyphicon-chevron-down" style="float:right;cursor: pointer;"></span></h2>
<div class="row collapse in" id="info-education">
    <div class="entry" id="text-education">
        <?php $this->load->view('profile/personal/text_education'); ?>
    </div>
    <div class="entry" id="form-education">
        <div class="panel panel-default profile">
            <div class="panel-body">
                <div class="row" style="padding: 0px 15px;">
                   <form action="" method="POST" id="register-job" role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Trường :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="school" name="school" placeholder="vd: Cao đẳng kỹ thuật cao thắng" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Chuyên ngành :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="specialized" id="specialized" placeholder="vd: Công nghệ thông tin" required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Xếp loại :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="classify" id="classify" class="form-control" required="">
                                    <option value="">Chọn xếp loại</option>
                                    <?php foreach ($classify as $key => $value): ?>
                                        <option value="<?php echo $value['class_id']; ?>"><?php echo $value['class_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
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
                                    <div class="col-md-6">
                                        <input type="date" name="edu_begin" class="form-control" max="<?php echo date('Y-m-d'); ?>" id="edu_begin" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="edu_end" max="<?php echo date('Y-m-d'); ?>" id="edu_end" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hcenter">
                        <button type="submit" id="save-education" value="1" class="btn btn-primary "><i class="fa fa-edit"></i>&nbsp;Lưu</button>
                        <button type="submit" id="exit-education"  class="btn btn-danger "><i class="fa fa-remove"></i>&nbsp;Hủy</button>
                    </div>   
                </form>
            </div>
            <script type="text/javascript">
                $('#edu_begin').change(function(e){
                   var begin    = $('#edu_begin').val();
                   $('#edu_end').attr('min',begin);
                });
                $('#save-education').click(function(e){
                    var school      = $('#school').val(),
                        specialized = $('#specialized').val(),
                        classify    = $('#classify').val(),
                        edu_begin   = $('#edu_begin').val(),
                        edu_end     = $('#edu_end').val();
                        id          = $('#save-education').val();
                    var d1 = new Date(edu_begin).getTime();
                    var d2 = new Date(edu_end).getTime();
                        
                    if (school == '' || specialized == '' || classify == '' || edu_begin == '' || edu_end == '')
                    {
                        return;
                    }
                    if (d1 > d2)
                    {
                        message_validation('input','edu_end','Vui lòng chọn thơi gian lớn hơn thời gian bắt đầu');
                        return;
                    }
                    e.preventDefault();
                    $.ajax({
                        url: '<?php echo base_url('education'); ?>',
                        type: 'post',
                        dataType: 'json',
                        data: {school: school, specialized: specialized, classify: classify, edu_begin: edu_begin, edu_end: edu_end, 'csrf_test_name' : getToken(),id: id},
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
                            $('#edu_begin').after(result.errors.edu_begin);
                        } else if (result.successful == true)
                        {
                            $('div[name="error"]').remove();
                            $('#text-education').show();
                            $('#form-education').hide();
                            $('#text-education').html(result.html_education);
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                    });
                });
            </script>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
     <?php 
        if (!empty($info['education_json']))
        {
            echo "$('#text-education').show();
                $('#form-education').hide();";
        } else {
            echo "$('#text-education').hide();
                $('#form-education').show();";
        }
    ?>
    $('#exit-education').click(function(e){
        e.preventDefault();
        $('div[name="error"]').remove();
        $('#text-education').show();
        $('#form-education').hide();
    });
</script>