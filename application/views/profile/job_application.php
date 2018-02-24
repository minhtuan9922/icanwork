<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title"><i class="glyphicon glyphicon-open"></i>&nbsp;VIỆC LÀM ĐÃ ỨNG TUYỂN (100)</h2>
                <div class="row">
                    <div class="entry">
                    <table class="table table-hover" id="table-job">
                        <thead>
                            <tr>
                                <th class="col-left" >Vị trí tuyển dụng</th>
                                <th>Khu vực</th>
                                <th>Ngày ứng tuyển</th>
                                <th>Hồ sơ đã nộp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr name="1">
                                <td class="col-left">
                                    <div style="display: inline-flex;">
                                        <div>
                                           <img src="<?php echo base_url('asset/'); ?>img/l4.jpg" width="50" height="50" alt="">
                                        </div>
                                        <div style="margin: 7px;">
                                            <p><b><a href="">Chuyên viên IT 1</a></b></p>
                                            <span>Công Ty TNHH Quốc Tế Bình Minh</span>
                                        </div>
                                    </div>
                                </td>
                                <td><div>TPHCM</div><div>Bình Dương</div></td>
                                <td><div >02-10-2017</div></td>
                                <td><a href="" target="_blank" title="">Xem hồ sơ</a></td>
                                <td><i class="fa fa-remove"  value="1" style="cursor: pointer;"></i></td>
                            </tr>
                        </tbody>
                    </table>
                    <script type="text/javascript">
                        $('#table-job tbody tr td i').click(function(){
                            var id = $(this).attr('value');
                            if (confirm('Bạn muốn xóa công việc đã ứng tuyển ?'))
                            {
                                $('#table-job tbody tr[name='+ id +']').remove();
                            } 
                        });
                    </script>
                    <div class="hcenter">
                        <ul class="pagination">
                            
                        </ul>       
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            window.pagObj = $('.pagination').twbsPagination({
                                totalPages: 10,
                                visiblePages: 5,
                                onPageClick: function (event, page) {
                                    //panigation(page);
                                }
                            }).on('page', function (event, page) {
                                //panigation(page);
                            });
                        });
                    </script>                        
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