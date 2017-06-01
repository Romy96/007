<?php 
if(isset($product)):
 ?>
<h1>Bewerken product</h1>

    <div class="row">
        <form role="form" method="post" action="<?=URL?>backend/save_product">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">   <!-- white background -->
                        <div class="box-body">      <!-- some whitespace -->
                            <div class="box-body">  
                                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                                <div class="form-group">
                                    <label for="product">Product:</label>
                                    <div class="input-group">
                                    	<input type="hidden" name="id" value="<?=$product['id']?>">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <input type="text" class="form-control" id="product" name="product" value="<?=$product['product']?>">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="afbeelding">Afbeelding achtergrond:</label>
                                     <div class="input-group">
                                        <input type="text" class="form-control" data-slug="source" placeholder="afbeelding achtergrond" id="afbeelding" name="afbeelding">
                                        <span class="custom-file-control"></span>
                                        <small class="text-muted">Put image URL from your documents or internet into the field.</small>
                                    </div>
                                </div> -->
                                 <div class="form-group">
                                    <label for="price">Prijs:</label>
                                    <div class="input-group">
                                    	<span class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></span>
                                        <input type="number" class="form-control" value="<?=$product['price']?>" id="price" name="price">
                                	</div>
                                </div>
                                <div class='form-group'>
                                    <label for="category">Categorie:</label>
                                     <div class="input-group">
                                        <input class="form-control" value="<?=$product['category']?>" name="category" type="text" id="category">
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for="description">Beschrijving:</label>
                                     <div class="input-group">
                                        <textarea class="form-control" name="description" type="text" id="description" rows="10"><?=$product['description']?></textarea>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for="amount">Aantal:</label>
                                     <div class="input-group">
                                        <input class="form-control" value="<?=$product['amount']?>" name="amount" type="number" id="amount">
                                    </div>
                                </div>
                                <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-info pull-right">
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>

    <?php
    endif;
    ?>