<?php if (!empty($post_recruit)): ?>
    <div class="table-responsive">  
    <table class="table table-hover" id="table-job">
        <thead>
            <tr>
                <th class="col-left" >Vị trí tuyển dụng</th>
                <th>Số lượng</th>
                <th>Lượt xem</th>
                <th>Lượt ứng tuyển</th>
                <th>Ngày cập nhật</th>
                <th>Trạng thái</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($post_recruit as $key => $value): ?>
                <tr name="<?php echo $value['post_id'] ?>">
                    <td class="col-left ">
                        <div class="hide-text">
                        <?php if ($value['status'] == 0): ?>
                            <i class="fa fa-warning" style="color:orange" title="Chưa kích hoạt"></i>
                        <?php else: ?>
                            <i class="fa fa-check" style="color:green" title="Đã kích hoạt"></i>
                        <?php endif ?>   
                            <a href="#"><?php echo $value['job'] ?></a>
                            <?php if ($value['icon'] == 1): ?>
                                <img class="hot-gif" src="<?php echo base_url('asset/img/icon/hot1.gif'); ?>">
                            <?php endif ?>
                        </div>
                    </td>
                    <td><?php echo $value['number'] ?></td>
                    <td><?php echo (!empty($value['view'])) ? $value['view'] : '0'; ?></td>
                    <td><?php echo (!empty($value['num_recruitment'])) ? $value['num_recruitment'] : '0'; ?></td>
                    <td><?php echo date_format(date_create($value['date_update']), "d/m/Y") ?></td>
                    <td>
                        <?php  
                        $day_1 = date_format(date_create($value['date_deadline']),"Y-m-d");
                        $day_2 = date('Y-m-d'); //current date
                        $days = (strtotime($day_1) - strtotime($day_2)) / (60 * 60 * 24);
                        if ($days == 0)
                        {
                            echo '<div style="color:orange;">Ngày cuối cùng</div>';
                        } else if ($days > 0 )  {
                            echo '<div style="color:green;">Còn '.intval($days).' ngày</div>';
                        } else {
                            echo '<div style="color:red;">Hết hạn</div>';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('quan-ly-tuyen-dung/sua-tuyen-dung/'.$value['post_id']); ?>" ><i style="cursor: pointer;" class="fa fa-edit"></i></a>
                        <i name="remove" value="<?php echo $value['post_id'] ?>" style="cursor: pointer;" class="fa fa-remove"></i>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
            <script type="text/javascript">
                $('#table-job tbody tr td i[name="remove"]').click(function(){
                    var id = $(this).attr('value');
                    if (confirm('Bạn muốn xóa bài đăng không ?'))
                    {
                        $.ajax({
                            url: '<?php echo base_url('remove-recruit') ?>',
                            type: 'POST',
                            dataType: 'html',
                            data: {id: id, 'csrf_test_name': getToken()},
                        })
                        .done(function(result) {
                            $('#table-job tbody tr[name='+ id +']').remove();
                            alert(result);
                        })
                        .fail(function() {
                            console.log("error");
                        })
                        
                    } 
                });
            </script> 
            <div class="hcenter">
                <ul class="pagination">

                </ul>       
            </div>
            <script type="text/javascript">
                $('#table-job tbody tr').attr('tk','ok');
                var sum = $('#table-job tbody tr[tk="ok"]').length;
                var numberPage = <?php echo $this->config->item('number_recruit') ?>;
                var numPages = Math.ceil(sum/numberPage);
                var soNut = 0;
                panigation(1);
                function panigation(pageCurrent)
                {
                    $('#table-job tbody tr[tk="notok"]').css('display','none');
                    $('#table-job tbody tr[tk="ok"]').css('display','block');
                    var sum = $('#table-job tbody tr[tk="ok"]').length;
                    var numPages = Math.ceil(sum/numberPage);
                    var start = (pageCurrent - 1) * numberPage;
                    var end   = numberPage * pageCurrent - 1;
                    var listRows=$('#table-job tbody tr[tk="ok"]');
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
                    soNut = numPages;
                }
                function bodauTiengViet(str) {
                    str = str.toLowerCase();
                    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, 'a');
                    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, 'e');
                    str = str.replace(/ì|í|ị|ỉ|ĩ/g, 'i');
                    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, 'o');
                    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, 'u');
                    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, 'y');
                    str = str.replace(/đ/g, 'd');
                // str = str.replace(/\W+/g, ' ');
                // str = str.replace(/\s/g, '-');
                return str;
            }
            //enter
            $("#search-recruit").keyup(function(event){
                if(event.keyCode == 13){
                    $("#btnSearch").click();
                }
            });
            //search
            $('#btnSearch').click(function(e) {
                var search_string = bodauTiengViet($.trim($('#search-recruit').val()).replace(/ +/g,' ').toLowerCase());
                if (search_string =='') {
                    $('#table-job tbody tr').attr('tk','ok');
                    panigation(1);
                } else 
                {
                    var listRows = $('#table-job tbody tr');
                    $(listRows).attr('tk','notok');
                    for(i = 0 ; i<listRows.length; i++)
                    {
                        var str = bodauTiengViet(listRows[i].children[0].innerHTML.toLowerCase());
                        if(str.search(search_string) >=0 )
                        {
                            $(listRows[i]).attr('tk','ok');
                        }
                    }
                    panigation(1);
                }
                $('.pagination').twbsPagination('destroy');
                $('.pagination').twbsPagination({
                    totalPages: soNut,
                    visiblePages: 3,
                    onPageClick: function (event, page) {
                        panigation(page);
                    }
                }).on('page', function (event, page) {
                    panigation(page);
                });
            });
        </script>
        <script type="text/javascript">
            $(function () {
                window.pagObj = $('.pagination').twbsPagination({
                    totalPages: numPages,
                    visiblePages: 3,
                    first: 'Đầu',
                    last: 'Cuối',
                    prev: 'Trước',
                    next: 'Kế tiếp',
                    onPageClick: function (event, page) {
                        panigation(page);
                    }
                }).on('page', function (event, page) {
                    panigation(page);
                });
            });
        </script>                        
    </div>
<?php else: ?>
    <p>Chưa có bài tuyển dụng nào</p>
<?php endif ?>