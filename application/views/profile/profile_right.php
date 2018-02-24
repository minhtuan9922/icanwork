<h2 class="page-title"><i class="fa fa-star"></i>&nbsp;QUẢN LÝ CHỨC NĂNG</h2>
<div>
      <div class="fast-job">
            <ul class="user-info">
                  <!-- begin candidate -->
                  <?php if ($this->session->userdata('type') == 1): ?>
                  <li ><a href="<?php echo base_url('viec-lam-phu-hop'); ?>" <?php echo (isset($user_active) && $user_active == 'job') ? 'id="user-active"' : ''; ?> title=""><i class="fa fa-newspaper-o" ></i>&nbsp;Việc làm phù hợp với bạn</a></li>
                  <hr id="line">
                  <li><a href="<?php echo base_url('account'); ?>" <?php echo (isset($user_active) && $user_active == 'account') ? 'id="user-active"' : ''; ?> title=""><i class="fa fa-info-circle" ></i>&nbsp;Thông tin cá nhân</a></li>
                  <hr id="line">
                  <li><a href="<?php echo base_url('quan-ly-ho-so'); ?>" <?php echo (isset($user_active) && $user_active == 'profile') ? 'id="user-active"' : ''; ?> title=""><i class="glyphicon glyphicon-book" ></i>&nbsp;Quản lý hồ sơ</a></li>
                  <hr id="line">
                  <li><a href="<?php echo base_url('viec-lam-da-luu'); ?>" <?php echo (isset($user_active) && $user_active == 'save') ? 'id="user-active"' : ''; ?> title=""><i class="glyphicon glyphicon-save" ></i>&nbsp;Việc làm đã lưu</a></li>
                  <hr id="line">
                  <li><a href="<?php echo base_url('viec-lam-da-ung-tuyen'); ?>" <?php echo (isset($user_active) && $user_active == 'application') ? 'id="user-active"' : ''; ?> title=""><i class="glyphicon glyphicon-open" ></i>&nbsp;Việc làm đã ứng tuyển</a></li>
                  <hr id="line">
                  <li><a href="<?php echo base_url('cau-hinh-thong-bao'); ?>" <?php echo (isset($user_active) && $user_active == 'notification') ? 'id="user-active"' : ''; ?> title=""><i class="fa fa-cog" ></i>&nbsp;Cấu hình thông báo</a></li>
                  <?php endif ?>
                  <!-- end candidate -->
                  <!-- begin recruit -->
                  <?php if ($this->session->userdata('type') == 2): ?>
                  <li><a href="<?php echo base_url('thong-tin-nha-tuyen-dung'); ?>" <?php echo (isset($user_active) && $user_active == 'application') ? 'id="user-active"' : ''; ?> title=""><i class="fa fa-info-circle" ></i>&nbsp;Thông tin nhà tuyển dụng</a></li>
                  <hr id="line">
                  <li><a href="<?php echo base_url('quan-ly-tuyen-dung'); ?>" <?php echo (isset($user_active) && $user_active == 'management_recruit') ? 'id="user-active"' : ''; ?> title=""><i class="glyphicon glyphicon-book" ></i>&nbsp;Quản lý tuyển dụng</a></li>
                   <hr id="line">
                  <li><a href="<?php echo base_url('ho-so-da-luu'); ?>" <?php echo (isset($user_active) && $user_active == 'save') ? 'id="user-active"' : ''; ?> title=""><i class="glyphicon glyphicon-save" ></i>&nbsp;Hồ sơ đã lưu</a></li>
                  <hr id="line">
                  <li><a href="<?php echo base_url('ho-so-da-ung-tuyen'); ?>" <?php echo (isset($user_active) && $user_active == 'application') ? 'id="user-active"' : ''; ?> title=""><i class="glyphicon glyphicon-open" ></i>&nbsp;Hồ sơ đã ứng tuyển</a></li>
                  <?php endif ?>
                  <!-- end recruit-->
            </ul>      
      </div>
</div>
<?php if ($this->session->userdata('type') == 1 && !empty($show) ==true): ?>
<hr id="line">
<h2 class="page-title"><i class="fa fa-bullhorn"></i>&nbsp;NHẬN THÔNG BÁO</h2>
<div>
      <div class="fast-job">
            <select  id="input" name="notification" class="form-control" style="">
                  <option value="">Từ chối</option>
                  <option value="">Hằng ngày</option>
                  <option value="">Hằng tuần</option>
                  <option value="">Hằng tháng</option>
            </select>
      </div>
</div>
<hr id="line">
<h2 class="page-title"><i class="fa fa-bar-chart"></i>&nbsp;THỐNG KÊ TÀI KHOẢN</h2>
<div>
      <div class="fast-job">
            <div style="color:black;">
            <span>Lượt xem hồ sơ</span><span style="color:#e4305a;float:right;">300</span>
            <hr id="line">
            <span>Số nhà tuyển dụng xem hồ sơ</span><span style="color:#e4305a;float:right;">300</span>
            <hr id="line">
            <span>Lượt ứng tuyển</span><span style="color:#e4305a;float:right;">300</span>           
            </div>      
      </div>
</div>
<?php endif ?>
<div class="banner">
      <hr class="hhr">
      <img src="<?php echo base_url('asset/'); ?>img/h2.jpg" class="img-responsive" alt="Post" title="banner Quảng Cáo">
      <hr class="hhr">
      <img src="<?php echo base_url('asset/'); ?>img/h3.jpeg" class="img-responsive" alt="Post" title="banner Quảng Cáo">
</div>
 
