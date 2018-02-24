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
                <h2 class="page-title">DANH SÁCH VIỆC LÀM (<?php echo count($post_all); ?>)</h2>
                <div class="entry">
                    <div class="table-responsive">  
                    <table class="table table-hover" id="table-job">
                        <thead>
                            <tr>
                                <th class="col-left" >Vị trí tuyển dụng</th>
                                <th>Khu vực</th>
                                <th>Mức lương</th>
                                <th>Hạn nộp hồ sơ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($post_all as $key => $value): ?>
                            <tr>
                                <td class="col-left">
                                <div style="display: inline-flex;">
                                        <div>
                                           <img src="<?php echo base_url($value['logo']); ?>" width="50" height="50" alt="">
                                        </div>
                                        <div style="margin: 7px;">
                                            <p>
                                                <?php  
                                                $job = $this->my_string->remove_vn_unicode($this->my_string->remove_special_characters($value['job']));
                                                ?>
                                                <b><a href="<?php echo base_url('tuyen-dung/'.$value['post_id'].'/'.str_replace(" ","-",$job)); ?>"><?php echo $value['job']; ?></a>
                                                    <?php if ($value['icon'] == 1): ?>
                                                    <img class="hot-gif" src="<?php echo base_url('asset/img/icon/hot1.gif'); ?>">
                                                <?php endif ?> 
                                                </b>
                                            </p>
                                            <span><?php echo $value['name_company']; ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    $arr_location = explode(',',$value['location']);
                                    $n = count($arr_location) - 1;
                                    foreach ($arr_location as $i => $item)
                                    {
                                        foreach ($location as $k => $vl)
                                        {
                                            if ($item == $vl['loca_id'])
                                            {
                                                echo '<div>'.$vl['loca_name'].'</div>';
                                                break;
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td><div style="color: #e4305a">
                                        <strong>
                                        <?php foreach ($wage as $k => $val): ?>
                                            <?php if ($value['wage'] == $val['wage_id']): ?>
                                                <?php echo $val['wage_name']; break; ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                        </strong>
                                    </div>
                                </td>
                                <td><?php echo date_format(date_create($value['date_deadline']),'d-m-Y'); ?></td>
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
                        var numberPage = <?php echo $this->config->item('number_page_recruit'); ?>;
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
                                first: 'Đầu',
                                prev: 'Trước',
                                next: 'Tiếp',
                                last: 'Cuối',
                                onPageClick: function (event, page) {
                                    panigation(page);
                                }
                            }).on('page', function (event, page) {

                            });
                        });
                    </script>
                </div>
                <h2 class="page-title">VIỆC LÀM THEO NGÀNH NGỀ</h2>
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
                    <h4 style="margin-left: 0px;margin-top: 3px;"><i class="fa fa-search"></i>TÌM KIẾM VIỆC LÀM</h4>
                    <!-- search -->
                    <?php $this->load->view('recruit/search_recruit'); ?>
                    <!-- end search -->
                    <div class="widget">
                    <h4 style="margin-left: 0px;">VIỆC LÀM TUYỂN GẤP</h4>
                         <div class="fast-job">
                            <?php foreach ($post_fast as $key => $value): ?>
                                <?php if ($key < $this->config->item('number_fast')): ?>
                                <div class="item-job">
                                    <div>
                                        <b><a href=""><?php echo $value['job'] ?></a></b>
                                        <?php if ($value['icon'] == 1): ?>
                                        <img class="hot-gif" src="<?php echo base_url('asset/img/icon/hot1.gif'); ?>">
                                        <?php endif ?>
                                    </div>
                                    <div>
                                        <span><?php echo $value['name_company'] ?></span>
                                    </div>
                                    <div style="display: -webkit-box;height: 22px;">
                                        <div class="money" >
                                            <i style="color: #e4305a;height: auto" class="fa fa-money">&nbsp;
                                                <strong >
                                                    <?php foreach ($wage as $k => $val): ?>
                                                        <?php if ($value['wage'] == $val['wage_id']): ?>
                                                            <?php echo $val['wage_name']; break; ?>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </strong>
                                            </i>
                                        </div>
                                        <div class="exp" >
                                        <i  class="fa fa-info-circle">&nbsp;
                                            <strong >
                                                <?php foreach ($experience as $k => $val): ?>
                                                    <?php if ($value['experience'] == $val['exp_id']): ?>
                                                        <?php echo $val['exp_name']; break; ?>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </strong>
                                        </i>
                                        </div>
                                        <div class="more" >
                                            <a href="#" style="" class="btn btn-link" role="button"><i>Chi tiết</i></a>
                                        </div> 
                                    </div>
                                    <hr>
                                </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>