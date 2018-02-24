<div class="bread_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(''); ?>"><b>Trang chủ</b></a></li>
                    <?php if (!empty($breadcrum)): ?>
                        <?php foreach ($breadcrum as $key => $value): ?>
                            <?php if (!empty($value['link'])): ?>
                                    <li class=""><a href="<?php echo $value['link'] ?>"><?php echo $value['name']; ?></a></li>
                                <?php else: ?>
                                    <li class=""><?php echo $value['name']; ?></li>
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php endif ?>
                </ol>                    
            </div>
        </div>
    </div>
</div>