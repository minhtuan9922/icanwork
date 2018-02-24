<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
    <div class="container">
        <div class="row">
            <section class="page col-sm-9">
                <h2 class="page-title"><i class="glyphicon glyphicon-open"></i>&nbsp;HỒ SƠ ĐÃ LƯU (100)</h2>
                <div class="row">
                    <div class="entry">
                    <table class="table table-hover" id="table-job">
                        <thead>
                            <tr>
                                <th class="col-left" >Tên ứng viên</th>
                                <th>Ghi chú</th>
                                <th>Danh mục</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr name="1">
                                
                            </tr>
                        </tbody>
                    </table>
                    <!-- <script type="text/javascript">
                        $('#table-job tbody tr td i').click(function(){
                            var id = $(this).attr('value');
                            if (confirm('Bạn muốn xóa công việc đã ứng tuyển ?'))
                            {
                                $('#table-job tbody tr[name='+ id +']').remove();
                            } 
                        });
                    </script> -->
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