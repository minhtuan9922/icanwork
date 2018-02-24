<h2 class="page-title"><i class="glyphicon glyphicon-bullhorn"></i>&nbsp;MỤC TIÊU NGHỀ NGHIỆP<span data-toggle="collapse" data-target="#info-target" id="click-target" class="glyphicon glyphicon-chevron-down" style="float:right;cursor: pointer;"></span></h2>
<div class="row collapse in" id="info-target">
    <div class="entry" id="text-target">
        <?php $this->load->view('profile/personal/text_target'); ?>
    </div>
    <div class="entry" id="form-target">
        <div class="panel panel-default profile">
            <div class="panel-body">
                <div class="row" style="padding: 0px 15px;">
                   <form action="" method="POST"  role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Mục tiêu :</label>
                            </div>
                            <div class="col-md-9">
                            <?php foreach ($target as $key => $value): ?>
                                <input type="checkbox" id="chktarget<?php echo $value['target_id']; ?>" name="chktarget"  value="<?php echo $value['target_id']; ?>" />
                                <span class="lspan"><?php echo $value['target_name']; ?></span> 
                                <br>
                            <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-9">
                                <textarea  name="area_target" id="area-target" style="height: 150px;"  class="form-control" placeholder="Mô tả thêm về mục tiêu nghề nghiệp, ít nhất 50 ký tự"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="hcenter">
                        <button type="submit" id="btn-target" name="btn_target" class="btn btn-primary "><i class="fa fa-edit"></i>&nbsp;Lưu</button>
                        <button type="submit" id="exit-target" class="btn btn-danger "><i class="fa fa-remove"></i>&nbsp;Hủy</button>
                    </div>   
                </form>
                <script type="text/javascript">
                    $('#btn-target').click(function(e){
                        e.preventDefault();
                        var val = [];
                        $('input[name="chktarget"]:checked').each(function(i){
                             val[i] = $(this).val();
                        });
                        var area_target = $('#area-target').val();
                        if (area_target != '')
                        {
                            if (area_target.length < 50)
                            {
                                alert('nội dung mục tiêu không đươc ít hơn 50 ký tự');
                                return;
                            }
                        }
                        if (val.length == 0 && area_target == '')
                        {
                            $('div[name="error-target"]').remove();
                            $('#area-target').after('<div name="error-target" class="error alert alert-danger alert-dismissible" style="margin-bottom:0px;">Vui lòng chọn hoặc nhập mục tiêu<a href="#" class="close" name="close" data-dismiss="alert" aria-label="close">&times;</a></div>');
                            return;
                        } else {
                            $('div[name="error-target"]').remove();
                        }
                        var r = confirm("Bạn có muốn lưu mục tiêu nghề nghiệp không");
                        if (r == true)
                        {
                            $.ajax({
                                url: '<?php echo base_url('target') ?>',
                                type: 'POST',
                                dataType: 'json',
                                data: {checkbox: val, area_target: area_target, 'csrf_test_name': getToken()},
                            })
                            .done(function(result) {
                                if (result.min_length == false)
                                {
                                    alert('Mô tả ít nhất 50 ký tự');
                                    return;
                                }
                                if (result.validation == false)
                                {
                                    alert('Vui lòng chọn hoặc nhập');
                                    return;
                                }
                                if (result.successful == true)
                                {
                                    alert('Thành công');
                                    $('#text-target').html(result.html_target);
                                    $('#text-target').show();
                                    $('#form-target').hide();
                                } else {
                                    alert('Thất bại')
                                }
                            })
                            .fail(function() {
                                console.log("error");
                            })
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    <?php 
        if (!empty($info['target']))
        {
            echo "$('#text-target').show();
                $('#form-target').hide();";
        } else {
            echo "$('#text-target').hide();
                $('#form-target').show();";
        }
    ?>
    $('#exit-target').click(function(e){
        e.preventDefault();
        $('#text-target').show();
        $('#form-target').hide();
    });
</script>