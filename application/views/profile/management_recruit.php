<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title"><i class="glyphicon glyphicon-book"></i>&nbsp;Quản lý tuyển dụng</h2>
                <div class="row" id="content">
                    <div class="entry">
                        <div class="row"  >
                            <div class="col-md-4 padr">
                                <select name="tick" id="input" class="form-control">
                                    <option value="0">Tất cả tin tuyển dụng</option>
                                    <option value="1">Tuyển dụng còn hạn</option>
                                    <option value="2">Tuyển dụng hết hạn</option>
                                    <option value="3">Sắp xếp thời gian tăng dần</option>
                                    <option value="4">Sắp xếp thời gian giảm dần</option>
                                    <option value="5">Tuyển dụng đang chờ duyệt</option>
                                    <option value="6">Tuyển dụng đẵ duyệt</option>
                                </select>
                                <div id="ref">
                                </div>
                            </div>
                            <div class="col-md-5 padl">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="search-recruit" placeholder="Tìm kiếm...">
                                    <div class="input-group-btn">
                                        <button class="form-control" id="btnSearch" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a  class="btn btn-primary hbtn hrifht" href="<?php echo base_url('quan-ly-tuyen-dung/dang-tuyen-dung'); ?>" role="button"><i class="fa fa-plus"></i>&nbsp;Đăng tuyển dụng mới</a>
                            </div>
                        </div>
                        <script type="text/javascript">
                            //sort
                            $('select[name="tick"]').change(function(e){
                                id_tick = $(this).val();
                                $('#ref').html('<i style="font-size: 30px;"  class="fa fa-refresh fa-spin"></i>');
                                $.ajax({
                                    url: '<?php echo base_url('tick') ?>',
                                    type: 'GET',
                                    dataType: 'html',
                                    data: {id_tick: id_tick, 'csrf_test_name': getToken()},
                                })
                                .done(function(result) {
                                    $('.table-recruit').html(result);
                                    setTimeout(function(){ $('#ref').html('') },1000);
                                })
                                .fail(function() {
                                    console.log("error");
                                })
                            });
                        </script>
                        <hr id="line">
                        <div class="table-recruit">
                            <?php $this->load->view('profile/table/table_recruit'); ?>
                        </div>
                    </div>  
                </section>
            <!-- right-->
            <aside class="sidebar col-sm-3">
                <?php $this->load->view('profile/profile_right'); ?> 
            </aside>
            <!-- end right -->
        </div>
    </div>
</main>