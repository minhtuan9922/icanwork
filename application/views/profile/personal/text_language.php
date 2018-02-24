<?php  
    $json_language = json_decode($info['language_json']);
    if (!empty($json_language))
    { 
?>
<div class="panel panel-default profile">
    <div class="panel-body">
        <div class="row" style="padding: 0px 15px;">
            <table class="table table-hover" id="table-job">
                <thead>
                    <tr>
                        <th>Ngôn ngữ</th>
                        <th>Chứng chỉ</th>
                        <th>Điểm</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($json_language as $k => $val)
                        {
                            ?>
                            <tr name="1" id="language-<?php echo $val->id; ?>">
                                <td>
                                    <?php foreach ($certificate as $key => $value): ?>
                                        <?php if ($value['lang_id'] == $val->language): ?>
                                             <span id="lang-<?php echo $val->id; ?>" value="<?php echo $val->language; ?>"><b>
                                            <?php echo $value['lang_name']; break; ?>
                                            </b></span>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td>
                                    <?php foreach ($certificate as $key => $value): ?>
                                        <?php if ($value['cer_id'] == $val->certificate): ?>
                                            <span id="cer-<?php echo $val->id; ?>" value="<?php echo $val->certificate; ?>"><b>
                                            <?php echo $value['cer_name']; break; ?>
                                            </b></span>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td><span id="point-<?php echo $val->id; ?>" value="<?php echo $val->point; ?>" ><b><?php echo $val->point; ?></b></span></td>
                                <td>
                                    <i class="fa fa-edit" name="edit-lang"  value="<?php echo $val->id; ?>" style="cursor: pointer;">
                                    </i>&nbsp;
                                    <i class="fa fa-remove" name="remove-lang" value="<?php echo $val->id; ?>"  value="1" style="cursor: pointer;"></i>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="btn-pers">
            <a class="btn btn-default" id="add-language" href="#" role="button"><i class="fa fa-plus"></i>&nbsp;Thêm</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    var number_language = 
    <?php
    if (!empty($info['language_json']))
    {
        $json_language = json_decode($info['language_json']);
        echo count($json_language);
    } else echo 0;
    ?>;
</script>
<script type="text/javascript">
    $('i[name="remove-lang"]').click(function(){
        var id = $(this).attr('value');
        var r  = confirm('Bạn có muốn xóa không');
        if (r == true)
        {
            $.ajax({
                url: '<?php echo base_url("delete-lang"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {id: id, 'csrf_test_name': getToken()},
            })
            .done(function(result) {
                console.log(result);
                if (result.successful == true)
                {
                    $('#language-'+ id +'').remove();
                    number_language--;
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
    $('i[name="edit-lang"]').click(function(){
        var id = $(this).attr('value');
        var r  = confirm('Bạn có muốn sửa không');
        if (r == true)
        {
            var lang            = $('#lang-'+ id +'').attr('value');
            var certificate     = $('#cer-'+ id +'').attr('value');
            var point           = $('#point-'+ id +'').attr('value');
            $('#select_lang option').removeAttr('selected');
            $('#select_cer option').removeAttr('selected');
            $('#select_lang option[value="'+ lang +'"]').attr('selected','selected');
            $('#select_cer option[value="'+ certificate +'"]').attr('selected','selected');
            $('#point').val(point);
            $('#save-language').val(id);
            showCertificate(certificate);
            $('#text-language').hide();
            $('#form-language').show();              
        }
    });
</script>
<script type="text/javascript">
    $('#add-language').click(function(e){
        e.preventDefault();
        if (number_language < 5)
        {
            $('#save-language').val('1');
            $('#text-language').hide();
            $('#form-language').show();
        } else {
            alert('Ngôn ngữ đã tối đa');
        }
    });
</script>
<?php 
    }
?>