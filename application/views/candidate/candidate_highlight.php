<div class="widget">
    <h4 style="margin-left: 0px;"><i class="fa fa-address-card"></i>&nbsp;HỒ SƠ TIÊU BIỂU</h4>
    <div class="fast-job">
        <?php foreach ($hightlight as $i => $item): ?>
            <?php if ($i < $this->config->item('num_candidate_hlight_right')): ?>
        <div class="item-job">
            <div><b><a href="<?php echo base_url('ung-vien/'.$item['candidate_id'].'/'.$this->my_string->remove_vn_unicode(str_replace(" ","-",$item['name']))); ?>"><?php echo $item['title']; ?></a></b></div>
            <span><?php echo $item['name'] ?></span>
            <div>
                <i style="color: #e4305a" class="fa fa-money">&nbsp;<strong>
                    <?php foreach ($wage as $key => $value): ?>
                        <?php if ($item['wage'] == $value['wage_id']): ?>
                            <?php echo $value['wage_name']; break; ?>
                        <?php endif ?>
                    <?php endforeach ?></strong></i>
                &nbsp;
                <i class="fa fa-info-circle">&nbsp;<strong>
                    <?php foreach ($experience as $key => $value): ?>
                        <?php if ($item['experience'] == $value['exp_id']): ?>
                            <?php echo $value['exp_name']; break; ?>
                        <?php endif ?>
                    <?php endforeach ?>
                </strong></i>
                &nbsp;
                <i class="glyphicon glyphicon-map-marker"></i><strong>
                   <?php 
                   $arr_location = explode(',',$item['location']);
                   $n = count($arr_location) - 1;
                   foreach ($arr_location as $key => $value)
                   {
                        foreach ($location as $k => $vl)
                        {
                            if ($value == $vl['loca_id'] && $key < $n)
                            {
                                echo trim($vl['loca_name']).' - ';
                                break;
                            } 
                            else if ($value == $vl['loca_id'] && $key == $n)
                            {
                                echo trim($vl['loca_name']);
                                break;
                            }
                        }
                    }
                    ?>
                </strong>
            </div>
        </div>
        <?php else: ?>
            <?php break; ?>
        <?php endif ?>
        <hr>
        <?php endforeach ?>
        <div class="hright">
            <a href="#" class="btn btn-link" role="button"><i>Xem thêm</i></a>
        </div>
    </div>
</div>