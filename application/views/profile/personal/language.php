<h2 class="page-title"><img style="width: 20px;" src="<?php echo base_url('asset/img/icon/language.png'); ?>">&nbsp;NGÔN NGỮ<span data-toggle="collapse" data-target="#info-language" id="click-language" class="glyphicon glyphicon-chevron-down" style="float:right;cursor: pointer;"></span></h2>
<div class="row collapse in" id="info-language">
    <div class="entry" id="text-language">
        <?php $this->load->view('profile/personal/text_language'); ?>
    </div>
    <div class="entry" id="form-language">
        <div class="panel panel-default profile">
            <div class="panel-body">
                <div class="row" style="padding: 0px 15px;">
                   <form action="" method="POST"  role="form">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Ngôn ngữ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="select_lang" id="select_lang" class="form-control">
                                    <option value="">Chọn ngôn ngữ</option>
                                    <?php foreach ($language as $key => $value): ?>
                                        <option value="<?php echo $value['lang_id']; ?>"><?php echo $value['lang_name']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Chứng chỉ :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <select name="select_cer" id="select_cer" class="form-control">
                                    <option value="">Chọn chứng chỉ</option>
                                    <?php foreach ($certificate as $key => $value): ?>
                                        <option show="hide" style="display: none;" data="<?php echo $value['cer_language']; ?>" value="<?php echo $value['cer_id']; ?>"><?php echo $value['cer_name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Điểm :<font size="3" color="#FF0000">*</font></label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" id="point" name="point" min=0 max=999 class="form-control" id="" >
                            </div>
                        </div>
                    </div>
                    <div class="hcenter">
                        <button type="submit" id="save-language" value="1" class="btn btn-primary "><i class="fa fa-edit"></i>&nbsp;Lưu</button>
                        <button type="submit" id="exit-language" class="btn btn-danger "><i class="fa fa-remove"></i>&nbsp;Hủy</button>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $('#select_lang').change(function(){
        var id = $(this).val();
        showCertificate(id);
    });
    function showCertificate(id)
    {
        var number = $('#select_cer option[show="hide"]').length;
        $('#select_cer option[show="hide"]').css('display','none');
        for (i = 0;i < number; i++)
        {
            if (id == $('#select_cer option[data="'+ id +'"]').attr('data'))
            {
                $('#select_cer option[data="'+ id +'"]').css('display','block');
            }
        }
    }
    //save
    $('#save-language').click(function(e){
        e.preventDefault();
        var select_lang      = $('#select_lang').val(),
            select_cer       = $('#select_cer').val(),
            point            = $('#point').val(); 
            id               = $(this).val();
        $.ajax({
            url: '<?php echo base_url('language'); ?>',
            type: 'post',
            dataType: 'json',
            data: {id: id, select_lang: select_lang, select_cer: select_cer, point: point, 'csrf_test_name' : getToken()},
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
            } else if (result.successful == true) {
                $('#text-language').html(result.html_language);
                $('#text-language').show();
                $('#form-language').hide();
            } else {
                alert('Thất bại');
            }
        })
        .fail(function() {
            console.log("error");
        })
    })
</script>
<script type="text/javascript">
    <?php 
        if (!empty($info['language_json']))
        {
            echo "$('#text-language').show();
                $('#form-language').hide();";
        } else {
            echo "$('#text-language').hide();
                $('#form-language').show();";
        }
    ?>
    $('#exit-language').click(function(e){
        e.preventDefault();
        $('#text-language').show();
        $('#form-language').hide();
    });
</script>