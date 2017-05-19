<h1>Producten</h1>

<div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Prijs</th>
                            <th><a href="<?=URL?>backend/products/SortProductByCategory">Categorie</a></th>
                            <th>Beschrijving</th>
                            <th>Aantal</th>
                            <th data-sortable="false">Acties</th>
                        </tr>
                        </thead>
                        <tbody>
						
						<?php
                        if(isset($products)):
                            foreach($products as $row):
                        ?>
                                <tr>
                                    <td>
                                        <?=$row['product']?>
                                    </td>
                                    <td>
                                    	<?=$row['price']?>
                                    </td>
                                    <td>
                                        <?=$row['category']?>
                                    </td>
                                    <td>
                                       <?=$row['description']?>
                                    </td>
                                    <td>
                                        <?=$row['amount']?>
                                    </td>
                                    <td>
										<img style="max-width:200px;max-height:200px;" src="<?=$row['image']?>" alt="plaatje">
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?=URL?>backend/products/<?=$row['id']?>" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>