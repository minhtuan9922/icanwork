 <div class="panel panel-default profile">
    <div class="panel-body">
        <div class="row" style="padding: 0px 15px;">
            <div class="col-md-6">
                <div class="dpres">
                    <span><b>Tiêu đề hồ sơ:</b></span>&nbsp;
                    <span class="lspan" id="text-title"><?php echo $info['title']; ?></span>
                </div>
                <div class="dpres">
                    <span><b>Trình độ học vấn:</b></span>&nbsp;
                    <span class="lspan" id="text-literacy" value="<?php echo $info['literacy'];  ?>">
                        <?php foreach ($education as $key => $value): ?>
                            <?php if ($info['literacy'] == $value['edu_id']): ?>
                                <?php echo $value['edu_name']; break; ?>
                            <?php endif ?>
                        <?php endforeach ?>   
                    </span>
                </div>
                <div class="dpres">
                    <span><b>Số năm kinh nghiệm:</b></span>&nbsp;
                    <span class="lspan" id="text-exp" value="<?php echo $info['experience'];  ?>">
                        <?php foreach ($experience as $key => $value): ?>
                            <?php if ($info['experience'] == $value['exp_id']): ?>
                                <?php echo $value['exp_name']; break; ?>
                            <?php endif ?>
                        <?php endforeach ?> 
                    </span>
                </div>
                <div class="dpres">
                    <span><b>Nơi làm việc:</b></span>&nbsp;
                    <span class="lspan" id="text-place" value="<?php echo $info['location']; ?>">
                        <?php 
                        $arr_location = explode(',',$info['location']);
                        $n = count($arr_location) - 1;
                        foreach ($arr_location as $key => $value)
                        {
                            foreach ($location as $k => $vl)
                            {
                                if ($value == $vl['loca_id'] && $key < $n)
                                {
                                    echo $vl['loca_name'].' - ';
                                    break;
                                } 
                                else if ($value == $vl['loca_id'] && $key == $n)
                                {
                                    echo $vl['loca_name'];
                                    break;
                                }
                            }
                        }
                        ?>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="dpres">
                    <span><b>Ngành nghề:</b></span>&nbsp;
                    <span class="lspan" id="text-career" value="<?php echo $info['career']; ?>">
                        <?php 
                        $arr_career = explode(',',$info['career']);
                        $n = count($arr_career) - 1;
                        foreach ($arr_career as $key => $value)
                        {
                            foreach ($career as $k => $vl)
                            {
                                if ($value == $vl['career_id'] && $key < $n)
                                {
                                    echo $vl['career_name'].' - ';
                                    break;
                                } 
                                else if ($value == $vl['career_id'] && $key == $n)
                                {
                                    echo $vl['career_name'];
                                    break;
                                }
                            }
                        }
                        ?>
                    </span>
                </div>
                <div class="dpres">
                    <span><b>Loại hình công việc:</b></span>&nbsp;
                    <span class="lspan" id="text-type-work" value="<?php echo $info['type_work'];  ?>" >
                        <?php 
                        $arr_type_work = explode(',',$info['type_work']);
                        $n = count($arr_type_work) - 1;
                        foreach ($arr_type_work as $key => $value)
                        {
                            foreach ($type_work as $k => $vl)
                            {
                                if ($value == $vl['work_id'] && $key < $n)
                                {
                                    echo $vl['work_name'].' - ';
                                    break;
                                } 
                                else if ($value == $vl['work_id'] && $key == $n)
                                {
                                    echo $vl['work_name'];
                                    break;
                                }
                            }
                        }
                        ?>
                    </span>
                </div>
                <div class="dpres">
                    <span><b>Cấp bậc:</b></span>&nbsp;
                    <span class="lspan" id="text-rank" value="<?php echo $info['rank'];  ?>">
                        <?php foreach ($rank as $key => $value): ?>
                            <?php if ($info['rank'] == $value['rank_id']): ?>
                                <?php echo $value['rank_name']; break; ?>
                            <?php endif ?>
                        <?php endforeach ?> 
                    </span>
                </div>
                <div class="dpres">
                    <span><b>Mức lương:</b></span>&nbsp;
                    <span class="lspan" id="text-wage" value="<?php echo $info['wage'];  ?>">
                        <?php foreach ($wage as $key => $value): ?>
                            <?php if ($info['wage'] == $value['wage_id']): ?>
                                <?php echo $value['wage_name']; break; ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="btn-pers">
            <a class="btn btn-default" value="<?php echo $info['candidate_id']; ?>" href="#" id="edit-general" role="button"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
        </div>
    </div>
</div>
<script type="text/javascript">
     $('#edit-general').click(function(e){
        e.preventDefault();
        $('#general_title').val($('#text-title').html());
        $('#general_edu option[value="'+ $('#text-literacy').attr('value') +'"]').attr('selected','selected');
        $('#general_exp option[value="'+ $('#text-exp').attr('value') +'"]').attr('selected','selected');
        $('#general_rank option[value="'+ $('#text-rank').attr('value') +'"]').attr('selected','selected');
        $('#general_wage option[value="'+ $('#text-wage').attr('value') +'"]').attr('selected','selected');
        var place       = $('#text-place').attr('value');
        var arr_place   = place.split(",").map(Number);
        $.each(arr_place, function(index, value) {
            var element  = 'select[name="general_place"] option[value="'+ value +'"]';
            $(element).attr('selected','selected');
            $(element).trigger('change');
        });
        var type_work      = $('#text-type-work').attr('value');
        var arr_type_work  = type_work.split(",").map(Number);
        $.each(arr_type_work, function(index, value) {
            var element  = 'select[name="general_type_work"] option[value="'+ value +'"]';
            $(element).attr('selected','selected');
            $(element).trigger('change');
        });
        var career     = $('#text-career').attr('value');
        var arr_career = career.split(",").map(Number);
        $.each(arr_career, function(index, value) {
            var element = 'select[name="general_career"] option[value="'+ value +'"]';
            $(element).attr('selected','selected');
            $(element).trigger('change');
        });
        $('#text-general').hide();
        $('#form-general').show();
    });
</script>