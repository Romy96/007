
<h1>Rollen</h1>

<div class="row">
        <div class="col-xs-12">
        <div class="row">
            <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="<?=URL?>backend/create_role" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-plus" aria-hidden="true"></i> Nieuwe rol
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
                            <th>Rollen</th>
                        </tr>
                        </thead>
                        <tbody>
						
						<?php
                        if(isset($roles)):
                            foreach($roles as $row):
                        ?>
                                <tr>
                                    <td>
                                        <?=$row['name']?>
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