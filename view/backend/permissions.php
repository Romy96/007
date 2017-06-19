<h1>Rechten</h1>

<div class="row">
        <div class="col-xs-12">
        <div class="row">
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="<?=URL?>backend/create_permission" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Nieuwe recht
                    </a>
            </div>
        </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Recht</th>
                            <th>Beschrijving</th>
                        </tr>
                        </thead>
                        <tbody>
						
						<?php
                        if(isset($permissions)):
                            foreach($permissions as $row):
                        ?>
                                <tr>
                                    <td>
                                        <?=$row['displayname']?>
                                    </td>
                                    <td>
                                    	<?=$row['description']?>
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