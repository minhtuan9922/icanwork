<!DOCTYPE html5>
<html lang="en">
<head>
   <?php $this->load->view('general/head.php'); ?>
</head>
<body>
        <!--header-->
        <?php $this->load->view('general/header.php'); ?>
        <!--end header-->
    <main class="site-main">
        <?php $this->load->view($content);?>
    </main>
    <footer class="site-footer">
        <?php $this->load->view('general/footer'); ?>       
    </footer>
        <?php $this->load->view('general/script'); ?>
    <script type="text/javascript">
        $('.carousel[data-type="multi"] .item').each(function(){
          var next = $(this).next();
          if (!next.length) {
            next = $(this).siblings(':first');
          }
          next.children(':first-child').clone().appendTo($(this));

          for (var i=0;i<4;i++) {
            next=next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }

            next.children(':first-child').clone().appendTo($(this));
          }
        });        
    </script>
</body>
</html>