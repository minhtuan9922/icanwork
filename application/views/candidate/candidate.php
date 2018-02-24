<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<!-- breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<!-- end breadcrumb -->
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title">DANH SÁCH HỒ SƠ ỨNG VIÊN (<?php echo count($candidate); ?>)</h2>
                <div class="entry">
                    <div class="table-responsive">  
                     <table class="table table-hover" id="table-job">
                        <thead>
                            <tr>
                                <th class="col-left" >Tiêu đề hồ sơ</th>
                                <th>Trình độ/Kinh nghiệm </th>
                                <th>Mức lương</th>
                                <th>Khu vực</th>
                                <th>Thời gian cập nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($candidate as $i => $item): ?>
                            <tr>
                                <td class="col-left">
                                    <div style="display: inline-flex;">
                                        <div>
                                            <?php if (!empty($item['img'])): ?>
                                               <img src="<?php echo base_url($item['img']); ?>" width="50" height="50" alt="">   
                                           <?php else: ?>
                                                <img src="<?php echo base_url('asset/img/user-128.png'); ?>" width="50" height="50" alt="">
                                            <?php endif ?>
                                        </div>
                                        <div style="margin: 7px;">
                                            <?php  
                                            $name = $this->my_string->remove_vn_unicode($this->my_string->remove_special_characters($item['name']));
                                            ?>
                                            <p><b><a href="<?php echo base_url('ung-vien/'.$item['candidate_id'].'/'.str_replace(" ","-",$name)); ?>"><?php echo $item['title']; ?></a></b></p>
                                            <span><?php echo $item['name']; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <?php foreach ($education as $key => $value): ?>
                                            <?php if ($item['literacy'] == $value['edu_id']): ?>
                                                <?php echo $value['edu_name']; break; ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                    <div>
                                        <?php foreach ($experience as $key => $value): ?>
                                            <?php if ($item['experience'] == $value['exp_id']): ?>
                                                <?php echo $value['exp_name']; break; ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="color: #e4305a">
                                        <?php foreach ($wage as $key => $value): ?>
                                            <?php if ($item['wage'] == $value['wage_id']): ?>
                                                <?php echo $value['wage_name']; break; ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    $arr_location = explode(',',$item['location']);
                                    $n = count($arr_location) - 1;
                                    foreach ($arr_location as $key => $value)
                                    {
                                        foreach ($location as $k => $vl)
                                        {
                                            if ($value == $vl['loca_id'])
                                            {
                                                echo '<div>'.$vl['loca_name'].'</div>';
                                                break;
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td><?php echo date_format(date_create($item['date_update']),"d/m/Y"); ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    </div>
                    <div class="hcenter">
                        <ul class="pagination">
                            
                        </ul>       
                    </div>
                    <script type="text/javascript">
                        var sum = $('#table-job tbody tr').length;
                        var numberPage = <?php echo $this->config->item('number_candidate'); ?>;
                        var numPages = Math.ceil(sum/numberPage);
                        function panigation(pageCurrent)
                        {
                            var sum = $('#table-job tbody tr').length;
                            var numPages = Math.ceil(sum/numberPage);
                            var start = (pageCurrent - 1) * numberPage;
                            var end   = numberPage * pageCurrent - 1;
                            var listRows=$('#table-job tbody tr');
                            for (i = 0; i<listRows.length; i++)
                            {
                                if(i >= start && i <= end)
                                {
                                    listRows[i].style.display='';
                                }
                                else{
                                    listRows[i].style.display='none';
                                }
                            }
                        }
                        $(function () {
                            window.pagObj = $('.pagination').twbsPagination({
                                totalPages: numPages,
                                visiblePages: 5,
                                first: '<span style="font-size:18px;" class="glyphicon glyphicon-backward"></span>',
                                prev: 'prev',
                                next: 'next',
                                last: '<span style="font-size:18px;" class="glyphicon glyphicon-forward"></span>',
                                onPageClick: function (event, page) {
                                    panigation(page)
                                }
                            }).on('page', function (event, page) {
                                //panigation(page);
                            });
                        });
                    </script>                        
                </div>
                <h2 class="page-title">HỒ SƠ THEO NGÀNH NGỀ</h2>
                <div class="entry">
                    <div class="row">
                        <div class="col-md-12">
                            <ul>
                                <?php $arr = []; ?>
                                <?php foreach ($career as $key => $value): ?>
                                    <?php if ($key<9): ?>
                                        <li class="col-md-4 " style="list-style: inside;">
                                            <a href="" class="category" title=""><?php echo $value['career_name']; ?></a>&nbsp;<span class="number">(<?php echo $value['count_career'] ?>)</span>
                                        </li>
                                        <?php unset($career[$key]); $arr = $career ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="col-md-12">
                           <ul id="more-career" class="collapse">
                            <?php foreach ($arr as $key => $value): ?>
                                <li class="col-md-4 " style="list-style: inside;">
                                    <a href="" class="category" title=""><?php echo $value['career_name']; ?></a>&nbsp;<span class="number">(<?php echo $value['count_career'] ?>)</span>
                                </li>
                            <?php endforeach ?>
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="hcenter">
                    <button type="button" id="btn-career" class="btn btn-primary hbtn" style="margin-top: 10px;    width: 150px;" data-toggle="collapse" data-target="#more-career">
                      <span class="glyphicon glyphicon-chevron-down"></span> Xem Thêm
                    </button>
                </div>
                <script>
                    $(document).ready(function(){
                        $("#more-career").on("hide.bs.collapse", function(){
                            $("#btn-career").html('<span class="glyphicon glyphicon-chevron-down"></span> Xem thêm');
                        });
                        $("#more-career").on("show.bs.collapse", function(){
                            $("#btn-career").html('<span class="glyphicon glyphicon-chevron-up"></span> Rút gọn');
                        });
                    });
                </script>
            </section>
            <aside class="sidebar col-sm-3">
                <div class="widget">
                    <!-- search -->
                    <?php $this->load->view('candidate/search_candidate'); ?>
                    <!-- end search -->
                    <!-- candidate highlight -->
                    <?php $this->load->view('candidate/candidate_highlight'); ?>
                    <!-- end highlight -->
                </div>
            </aside>
        </div>
    </div>
</main>