<h1>Producten</h1>

<div class="row">
        <div class="col-xs-12">
        <div class="row">
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="<?=URL?>backend/create_product" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Nieuwe product
                    </a>
            </div>
        </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="products" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="no-sort">Product</th>
                            <th class="no-sort">Prijs</th>
                            <th>Categorie</th>
                            <th class="no-sort">Beschrijving</th>
                            <th class="no-sort">Aantal</th>
                            <th class="no-sort">Afbeelding</th>
                            <th class="no-sort" data-sortable="false">Acties</th>
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
                                            <a href="<?=URL?>backend/edit_product/<?=$row['id']?>" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                            <a href="<?=URL?>backend/delete_product/<?=$row['id']?>" onclick="return confirm('Weet je het zeker?')" class="btn btn-default btn-flat"><i class="fa fa-trash"></i></a>
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