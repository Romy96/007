<?php
if(isset($_SESSION['userId'])):
?>

<h1>Welkom <?=$_SESSION['username']?>!</h1>

<?php
endif;
?>

<div class="container">
        <div class="row">
        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h1 class="gallery-title">Gallery</h1>
        </div>

        <div align="center">
            <button class="btn btn-default filter-button" data-filter="all">All</button>
             <?php
			if (isset($products)):
				foreach ($products as $category):
			?>
            <button class="btn btn-default filter-button" data-filter="<?=$category['category']?>"><?=$category['category']?></button>
            <?php
            	endforeach;
            endif;
         	?>
        </div>
        <br/>
        <?php
			if (isset($products)):
				foreach ($products as $row):
		?>
            <a href="<?= URL ?>login/product_info/<?=$row['id']?>">
                <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter <?=$row['category']?>">
                    <img src="<?=URL?>public/img/<?=$row['image']?>" class="img-responsive">
                    <p><?=$row['product']?></p>
                    <p><span><i class="fa fa-eur" aria-hidden="true"></i></span><?=$row['price']?></p>
                </div>
            </a>
        <?php
            	endforeach;
            endif;
         ?>
        </div>
    </div>