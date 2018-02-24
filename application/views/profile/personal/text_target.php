<div class="panel panel-default profile">
    <div class="panel-body">
        <div class="row" style="padding: 0px 15px;">
            <div class="col-md-12">
                <?php 
                $arr_target = explode("%^&*", $info['target']);
                $n = count($arr_target);

                foreach ($arr_target as $k => $val)
                {
                    foreach ($target as $key => $value) 
                    {
                        if ($val == $value['target_id'])
                        {
                            echo '<div class="dpres">
                            <span class="lspan"  id="chk'.$k.'" value="'.$value['target_id'].'">- '.$value['target_name'].'</span>
                            </div>';
                        }
                    }
                }
                if (!empty($arr_target[$n-1]) && strlen($arr_target[$n-1]) > 49)
                {
                    echo '<div class="dpres">
                    <span class="lspan" id="txt-target">'.$arr_target[$n-1].'</span>
                    </div>';
                    $n--;
                }
                echo '<input type="hidden" id="hchek" value="'.$n.'">';
                ?>
            </div>
        </div>
        <div class="btn-pers">
            <a class="btn btn-default" id="edit-target" href="#" role="button"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
        </div>
    </div>
</div>
<script type="text/javascript">
     $('#edit-target').click(function(e){
        e.preventDefault();
        var chk = $('#hchek').val();
        for (i = 0; i <chk ;i++)
        {
            number = $('#chk'+ i +'').attr('value');
            $('#chktarget'+ number +'').attr('checked','checked');
        }
        $('#area-target').val($('#txt-target').html());
        $('#text-target').hide();
        $('#form-target').show();
    });
</script>