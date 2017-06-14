<?php
if(isset($product)):
?>
<div class="container">
	<div class="row">
		<form method="post" action="<?=URL?>login/AddProductToCart/<?=$product['id']?>&&<?=$_SESSION['userId']?>">
   				<div class="col-xs-4 item-photo">
                	<img src="<?=URL?>public/img/<?=$product['image']?>" class="img-responsive" style="max-width:100%;">
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <!-- Datos del vendedor y titulo del producto -->
                    <h3><?=$product['product']?></h3>    

                    <!-- Precios -->
                    <h6 class="title-price"><small>Prijs</small></h6>
                    <h3 style="margin-top:0px;"><span><i class="fa fa-eur" aria-hidden="true"></i></span><?=$product['price']?></h3>

                    <!-- Detalles especificos del producto -->
                    <div class="section">
                        <h6 class="title-attr" style="margin-top:15px;" ><small>Kleuren</small></h6>                    
                        <div>
                            <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                            <div class="attr" style="width:25px;background:white;"></div>
                        </div>
                    </div>   
                    <div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>Aantal</small></h6>                    
                        <div>
                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                            <input type="text" name="product_qty" value="1" />
                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                        </div>
                    </div>                

                    <!-- Botones de compra -->
                    <div class="section" style="padding-bottom:20px;">
                        <input type="hidden" name="product_id" value="<?=$product['id']?>" />
                        <input type="hidden" name="user_id" value="<?=$_SESSION['userId']?>" />
                        <button class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>In winkelwagen</button>
                    </div>                                        
                </div>                              

                <div class="col-xs-9">
                    <ul class="menu-items">
                        <li class="active">Beschrijving</li>
                    </ul>
                    <div style="width:100%;border-top:1px solid silver">
                        <p style="padding:15px;">
                            <small>
                            <?=$product['description']?>
                            </small>
                        </p>
                    </div>
                </div>
            </form>		
	</div>
</div>
<?php
endif;
?>