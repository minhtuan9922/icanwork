<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 fbox">
            <h4>COMPANY NAME</h4>
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam congue lectus diam, sit amet cursus massa efficitur sed. </p>
            <ul class="list-inline">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>                        
            </ul>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 fbox">
            <h4>SERVICES</h4>
            <ul class="big">
                <li><a href="#" title="">Title One</a></li>
                <li><a href="#" title="">Title Two</a></li>
                <li><a href="#" title="">Title Three</a></li>
                <li><a href="#" title="">Title Four</a></li>
                <li><a href="#" title="">Title Five</a></li>
                <li><a href="#" title="">Title Six</a></li>
                <li><a href="#" title="">Title Seven</a></li>
                <li><a href="#" title="">Title Eight</a></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 fbox">
            <h4>CONTENT</h4>
            <ul class="big">
                <li><a href="#" title="">Title One</a></li>
                <li><a href="#" title="">Title Two</a></li>
                <li><a href="#" title="">Title Three</a></li>
                <li><a href="#" title="">Title Four</a></li>
                <li><a href="#" title="">Title Five</a></li>
                <li><a href="#" title="">Title Six</a></li>
                <li><a href="#" title="">Title Seven</a></li>
                <li><a href="#" title="">Title Eight</a></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 fbox">
            <h4>CONTENT</h4>
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p><a href="tel:+902222222222"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> +90 222 222 22 22</a></p>
            <p><a href="mailto:iletisim@agrisosgb.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> mail@awebsitename.com</a></p>
        </div>
    </div>
</div>
<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p class="pull-left">&copy; 2017 COMPANY TRỊNH NGỌC HOÀNG</p>
            </div>
            <div class="col-md-8">
                <ul class="list-inline navbar-right">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">MENU ITEM</a></li>
                    <li><a href="#">MENU ITEM</a></li>
                    <li><a href="#">MENU ITEM</a></li>
                    <li><a href="#">MENU ITEM</a></li>
                    <li><a href="#">MENU ITEM</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--to top-->
<a href="#" id="toTop" ><span id="toTopHover" style="opacity: 0;"></span></a> 
<script type="text/javascript">
    $(document).ready(function() {
        $(function(){
            $(window).scroll(function(){
                if ($(window).scrollTop() > 200)
                {
                    $('#toTop').css('display','block');
                } else {
                    $('#toTop').css('display','none');
                }
            });
        });
        $('#toTop').each(function(){
            $(this).click(function(e){ 
                e.preventDefault();
                $('html,body').animate({ scrollTop: 0 }, 'slow');
                return false; 
            });
        });
    });
</script>