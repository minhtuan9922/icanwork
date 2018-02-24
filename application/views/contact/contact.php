<!-- before breadcrumb -->
<?php $this->load->view('general/before_breadcrumb'); ?>
<!-- end before breadcrumb -->
<?php $this->load->view('general/breadcrumb'); ?>
<main class="site-main page-main">
	<div class="container">
		<div class="row">
			<section class="page col-sm-9">
				<h2 class="page-title">THÔNG TIN LIÊN HỆ</h2>
				<div class="entry">
					<div class="tab-content">
						<div id="home" class="tab-pane fade active in">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam congue lectus diam, sit amet cursus massa efficitur sed. Pellentesque efficitur dolor tellus, sit amet vestibulum leo facilisis ac. Nullam vitae fringilla neque. Aliquam erat nunc, vestibulum at suscipit quis, consequat nec lorem. Phasellus porttitor mollis fermentum. Nulla eu eros libero. Donec semper, urna a rhoncus rutrum, nulla neque dignissim neque, nec congue tortor enim id mauris. Nulla euismod dolor lacus, porttitor imperdiet elit ornare nec. In finibus non justo id viverra.</p>

							<p>Nullam rhoncus lorem quis lobortis euismod. Aliquam ornare et sem ut commodo. Maecenas nec velit neque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer ullamcorper blandit eros, tincidunt tincidunt lacus rutrum at. Duis convallis luctus velit, nec ultricies arcu imperdiet eu. Quisque laoreet enim et gravida commodo.</p>

							<p>Curabitur felis nibh, porttitor eu nibh cursus, suscipit placerat dui. Donec nec aliquet enim. Quisque aliquet placerat fringilla. Nulla sed hendrerit lacus. Quisque consectetur mattis turpis eu ullamcorper. Nunc vehicula, tellus ac laoreet cursus, massa felis mattis enim, vitae luctus nisi leo nec ante. Suspendisse potenti. Cras at orci euismod, scelerisque ligula in, porttitor dui.</p>

							<p>Curabitur euismod lobortis sapien. Maecenas magna ligula, vulputate in nulla ac, tincidunt suscipit erat. Sed ac tempor nisi. Suspendisse laoreet, odio et consequat varius, sem urna convallis leo, egestas malesuada elit erat id tellus. Suspendisse scelerisque in felis at pretium. Maecenas dictum quam posuere ex hendrerit tempus. Donec vehicula quis erat quis sollicitudin. Vestibulum ultrices vitae arcu quis dignissim. Donec sagittis tincidunt arcu id pellentesque. Nullam eu risus tristique, mattis arcu laoreet, sagittis purus. Nulla facilisi. Nam ac justo quis elit pharetra scelerisque. Curabitur et dapibus ex. In quis pretium turpis. Aliquam tincidunt quam interdum, faucibus odio a, porttitor dui.</p>

							<p>Aenean non dapibus ante, sed dictum enim. Maecenas elementum auctor imperdiet. Nam eu mi placerat, dignissim libero condimentum, ornare est. Nunc euismod viverra sapien quis porttitor. Fusce eleifend quam quis nibh dictum scelerisque in vel lacus. Duis ac risus quis eros pretium lobortis. In malesuada est est.</p>  
						</div>
						<div id="menu1" class="tab-pane fade">
							<h3>Menu 1</h3>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div>   
						<div id="menu2" class="tab-pane fade">
							<h3>Menu 2</h3>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div> 
						<div id="menu3" class="tab-pane fade">
							<h3>Menu 3</h3>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
						</div> 
					</div>                   
				</div>
			</section>
			<aside class="sidebar col-sm-3">
				<div class="widget">
					<h4>LIÊN HỆ</h4>
					<ul>
						<li class="current"><a data-toggle="pill" href="#home" title="">Văn phòng Bình Dương</a></li>
						<li><a data-toggle="pill" href="#menu1" title="">Văn phòng Tân Bình</a></li>
						<li><a data-toggle="pill" href="#menu2" title="">Văn phòng Đồng Nai</a></li>
						<li><a data-toggle="pill" href="#menu3" title="">Văn phòng vũng Tàu</a></li>
					</ul>
				</div>
				 <img src="<?php echo base_url('asset/'); ?>img/banner1.jpg" class="img-responsive" style="width: 100%;" alt="Post" title="banner Quảng Cáo">
                <hr id="line">
                <img src="<?php echo base_url('asset/'); ?>img/banner2.jpg" class="img-responsive" style="width: 100%;" alt="Post" title="banner Quảng Cáo">
			</aside>
			<script>
				$(document).ready(function(){
					$(".widget li").click(function(e){
						$('.widget li').removeClass();
						$(this).addClass('current');
					});
				});
			</script>
		</div>
	</div>
</main>