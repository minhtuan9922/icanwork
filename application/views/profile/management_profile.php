<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title"><i class="glyphicon glyphicon-book"></i>&nbsp;Quản lý hồ sơ</h2>
                <div class="row">
                    <div class="panel panel-default profile" >
                        <div class="panel-body">
                           <div class="form-group" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <p>Bạn được tạo tối đa  <mark class="text-danger">2 hồ sơ</mark> (01 hồ sợ tao trực tuyến trên web và 01 hồ sơ từ máy tính).</p>
                                <p>Hồ sơ chỉ được hiện thị khi:  <mark class="text-danger">đã được kích hoạt và được bạn cho phép tìm kiếm</mark>.</p>
                                <p>Chú ý: <mark class="text-danger">làm mới hồ sơ hằng ngày để nhà tuyển dụng dễ tìm kiếm</mark>.</p>
                            </div>  
                        </div> 
                    </div>
                </div>
                <?php  
                if (!empty($info['title']))
                {
                ?>
                <div class="panel-body" id="data-profile">
                    <div class="form-group" >
                        <div class="panel panel-default" style="padding: 0px 20px; color:rgba(0, 0, 0, 0.85)">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span><b>Tên hồ sơ:</b></span>&nbsp;<?php echo $info['title']; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <span><b>Cho phép nhà tuyển dụng tìm kiếm:</b></span>
                                        <span title=".slideThree">
                                            <div class="slideThree">
                                           <?php if (!empty($info['status_search'])): ?>
                                               <input type="checkbox" value="1" id="slideThree" name="check" checked />
                                           <?php else: ?>
                                                <input type="checkbox" value="0" id="slideThree" name="check"  />
                                           <?php endif ?>
                                                <label  for="slideThree"></label>
                                            </div>
                                        </span>
                                    </div>
                                    <script type="text/javascript">
                                        var id = $('#slideThree').val();
                                        if (id == 1)
                                        {
                                            $('.slideThree').css('background','#1dcc43');
                                        } else {
                                            $('.slideThree').css('background','rgba(153, 153, 153, 0.33)');
                                        }
                                        $('input[name="check"]').click(function(e){
                                            var message = (id == 0) ? 'Bạn muốn cho nhà tuyển dụng tìm kiếm' : 'Bạn không muốn cho nhà tuyển dụng tìm kiếm';
                                            var r = confirm(message);
                                            if (r == true)
                                            {   
                                                if (id == 1)
                                                {
                                                    id = 0;
                                                     $('.slideThree').css('background','rgba(153, 153, 153, 0.33)');
                                                    search(id);
                                                    return;
                                                }
                                                else if (id == 0)
                                                {
                                                    id = 1;
                                                    $('.slideThree').css('background','#1dcc43');
                                                    search(id);      
                                                    return;
                                                }
                                            }
                                            else {
                                               e.preventDefault();
                                            }
                                        });
                                    </script>
                                    <script type="text/javascript">
                                        function search(id)
                                        {
                                            $.ajax({
                                                url: '<?php echo base_url('change-search') ?>',
                                                type: 'GET',
                                                dataType: 'html',
                                                data: {'id': id, 'csrf_test_name' : getToken()},
                                            })
                                            .done(function() {
                                                console.log("success");
                                            })
                                            .fail(function() {
                                                console.log("error");
                                            })
                                        }
                                    </script>
                                </div>
                            </div>
                            <hr>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span><b>Cấp bậc:</b></span>&nbsp;
                                        <?php foreach ($rank as $key => $value): ?>
                                            <?php if ($value['rank_id'] == $info['rank']): ?>
                                                <?php echo $value['rank_name']; break; ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                    <div class="col-md-3">
                                        <span><b>Ngày cập nhật:&nbsp;</b></span> <span id="date-update"><?php  echo date_format(date_create($info['date_update']),'d/m/Y'); ?></span>
                                    </div>
                                    <div class="col-md-3">
                                        <span><b>Lượt xem:</b></span>&nbsp;
                                        <?php echo (!empty($info['view'])) ? $info['view'] : '0';  ?>
                                    </div>
                                    <div class="col-md-3">
                                        <span><b>Trạng thái:</b></span>&nbsp;
                                        <span style="color: <?php echo (!empty($info['status_profile'])) ? '#21ad2c' : 'rgb(247, 1, 1)'; ?>;">
                                            <?php echo (!empty($info['status_profile'])) ? 'Đã kích hoạt' : 'Chưa kích hoạt';  ?>
                                        </span>
                                    </div>
                                </div>  
                            </div>
                            <hr>
                            <div class="panel-body" id="link-profile">
                             <a href="<?php echo base_url('ung-vien/'.$info['candidate_id'].'/'.$this->my_string->remove_vn_unicode(str_replace(" ","-",$info['name']))); ?>" class="btn btn-primary hbtn"  title=""><i class="fa fa-eye"></i>&nbsp;Xem hồ sơ</a>
                             <a href="<?php echo base_url('quan-ly-ho-so/ho-so-ca-nhan'); ?>" class="btn btn-primary hbtn"  title=""><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                             <a href="#" class="btn btn-primary hbtn" value="1" name="refresh"  title=""><i class="fa fa-undo"></i>&nbsp;Làm mới</a>
                             <a href="" name="remove" class="btn btn-primary hbtn"  title=""><i class="fa fa-remove"></i>&nbsp;Xóa</a>
                         </div>
                     </div>
                 </div>
            </div>
            <script type="text/javascript">
                $('a[name="refresh"]').click(function(e){
                    e.preventDefault();
                    var id = $(this).attr('value');
                    if (confirm('Bạn muốn làm mới hồ sơ'))
                    {
                        $.ajax({
                            url: '<?php echo base_url('refresh') ?>',
                            type: 'GET',
                            dataType: 'json',
                            data: {id: id, 'csrf_test_name' : getToken()},
                        })
                        .done(function(result) {
                            console.log(result);
                            if (result.successful == true)
                            {
                                alert('Bạn đã làm mới hồ sơ')
                                $('#date-update').html(result.date);
                            } 
                        })
                        .fail(function() {
                            console.log("error");
                        })
                    }
                });
                $('a[name="remove"]').click(function(e){
                    e.preventDefault();
                    if (confirm('Bạn muốn xóa hồ sơ không'))
                    {
                        $.ajax({
                            url: '<?php echo base_url('remove-profile') ?>',
                            type: 'GET',
                            dataType: 'json',
                            data: {'csrf_test_name' : getToken()},
                        })
                        .done(function(result) {
                            console.log(result);
                            if (result.successful == true)
                            {
                                alert('Thành công');
                                $('#data-profile').html('');
                            } 
                        })
                        .fail(function() {
                            console.log("error");
                        })
                    }
                });
            </script>
            <?php 
            }
            if (!empty($info['file_name']))
            {
            ?>
            <!-- profile file -->
            <div class="panel-body" style="padding-top: 0px;" id="pfile">
                <div class="form-group" >
                    <div class="panel panel-default" style="padding: 0px 20px; color:rgba(0, 0, 0, 0.85)">
                        <div class="panel-body">
                            <span><b>Tên file đính kèm:</b></span>&nbsp;
                            <?php echo $info['file_name']; ?>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <span><b>Hồ sơ:</b></span>&nbsp;đính kèm máy tính
                                </div>
                                <div class="col-md-4">
                                    <span><b>Ngày đăng:</b></span>&nbsp;
                                    <?php  echo date_format(date_create($info['date_file_update']),'d/m/Y'); ?>
                                </div>
                                <div class="col-md-4">
                                    <span><b>Trạng thái:</b></span>&nbsp;
                                    <span style="color: <?php echo (!empty($info['status_file'])) ? '#21ad2c' : 'rgb(247, 1, 1)'; ?>;">
                                        <?php echo (!empty($info['status_file'])) ? 'Đã kích hoạt' : 'Chưa kích hoạt';  ?>
                                    </span>
                                </div>
                            </div>  
                        </div>
                        <hr>
                        <div class="panel-body" id="link-file">
                            <!-- https://docs.google.com/gview?url=&embedded=true -->
                            <a href="<?php echo base_url($info['file_path']); ?>" target="_blank" class="btn btn-primary hbtn"  title=""><i class="fa fa-eye"></i>&nbsp;Xem </a>
                            <a href="" id="remove-file" value="1" class="btn btn-primary hbtn"  title=""><i class="fa fa-remove"></i>&nbsp;Xóa</a>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $('#remove-file').click(function(e){
                    e.preventDefault();
                    if (confirm('Bạn muốn xóa file đính kèm không'))
                    {
                        $.ajax({
                            url: '<?php echo base_url('remove-file') ?>',
                            type: 'GET',
                            dataType: 'json',
                            data: {'csrf_test_name' : getToken()},
                        })
                        .done(function(result) {
                            console.log(result);
                            if (result.successful == true)
                            {
                                alert('Thành công');
                                $('#pfile').html('');
                            } 
                        })
                        .fail(function() {
                            console.log("error");
                        })
                    }
                });
            </script>
            <?php  
            }
            ?>
            <!-- </div> -->
            <!-- end profile file -->
            <div class="panel panel-default profile" >
                <div class="panel-body">
                    <div class="form-group" >
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p><span class="hspan">Bạn chưa có hồ sơ trên icanmax:</span></p>
                            <p class="p-profile">Cách 1: Tạo trực tuyến trên website icanmax.</p>
                            <a class="btn btn-primary hbtn" href="<?php echo base_url('quan-ly-ho-so/ho-so-ca-nhan'); ?>" style="width: 100%;" role="button"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;TẠO TRỰC TUYẾN TRÊN ICANMAX</a>
                            <p class="p-profile">Cách 2: Tải hồ sơ đã có từ máy tính.</p>
                            <a class="btn btn-gray" href="<?php echo base_url('quan-ly-ho-so/dinh-kem-file'); ?>" role="button"><i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp;ĐÍNH KÈM FILE MÁY TÍNH</a>
                        </div>  
                    </div> 
                </div>
            </div>
    </div>
</section>
<aside class="sidebar col-sm-3">
    <!--RIGHT -->
    <?php $this->load->view('profile/profile_right'); ?>  
</aside>
</div>
</div>
</main>
