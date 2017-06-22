<h1>Nieuwsbrieven</h1>

<div class="row">
        <div class="col-xs-12">
        <div class="row">
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="<?=URL?>backend/create_newsletter" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Nieuwe nieuwsbrief
                    </a>
            </div>
        </div>
                <!-- /.box-header -->
            <div class="box box-primary">
                <div class="box-header"> 
                </div>
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Titel</th>
                            <th>Beschrijving</th>
                            <th data-sortable="false">Acties</th>
                        </tr>
                        </thead>
                        <tbody>
						
						<?php
                        if(isset($newsletters)):
                            foreach($newsletters as $row):
                        ?>
                                <tr>
                                    <td>
                                        <?=$row['title']?>
                                    </td>
                                    <td>
                                    	<?=$row['description']?> 
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                        	<a href="<?=URL?>backend/send_newsletter/<?=$row['id']?>" class="btn btn-default btn-flat"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                            <a href="<?=URL?>backend/edit_newsletter/<?=$row['id']?>" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                            <a href="<?=URL?>backend/delete_newsletter/<?=$row['id']?>" onclick="return confirm('Weet je het zeker?')" class="btn btn-default btn-flat"><i class="fa fa-trash"></i></a>
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