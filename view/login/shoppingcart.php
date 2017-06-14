<?php
if(isset($ProductsofUser)):
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (is_array($ProductsofUser)):
                            foreach($ProductsofUser as $row):
                    ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?=URL?>public/img/<?=$row['image']?>" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?=$row['product']?></a></h4>
                                <span>Amount: </span><span class="text-success"><strong><?=$row['amount']?></strong></span>
                            </div>
                        </div>
                        </td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><i class="fa fa-eur" aria-hidden="true"></i><?=$row['price']?></strong>
                        </td>
                       <td class="col-sm-1 col-md-1 text-center"><strong><i class="fa fa-eur" aria-hidden="true"></i><?=$row['price']?></strong>
                        <td class="col-sm-1 col-md-1">
                        <a href="<?=URL?>login/remove_product/<?=$row['id']?>/<?=$_SESSION['userId']?>" onclick="return confirm('Weet je het zeker?')" class="btn btn-danger">
                            <input type="hidden" name="product_id" value="<?=$row['id']?>">
                            <input type="hidden" name="user_id" value="<?=$_SESSION['userId']?>">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a>
                        </td>
                    </tr>
                    <?php
                            endforeach;
                        endif;
                    ?>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>$24.59</strong></h5></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$6.94</strong></h5></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>$31.53</strong></h3></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
endif;
?>