<h1>Gebruikers</h1>

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
                            <th>Sorteer</th>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Gebruikersnaam</th>
                            <th>Wachtwoord</th>
                            <th>Emailadres</th>
                            <th>Admin? (0 is nee, 1 is ja)</th>
                            <th data-sortable="false">Acties</th>
                        </tr>
                        </thead>
                        <tbody>
						
						<?php
                        if(isset($users)):
                            foreach($users as $row):
                        ?>
                                <tr>
                                    <td>
                                        <?=$row['id']?>
                                    </td>
                                    <td>
                                        <?=$row['firstname']?>
                                    </td>
                                    <td>
                                    	<?=$row['prefix']?> <?=$row['lastname']?>
                                    </td>
                                    <td>
										<?=$row['username']?>
                                    </td>
                                    <td>
										<?=$row['password']?>
                                    </td>
                                    <td>
										<?=$row['email']?>
                                    </td>
                                    <td>
										<?=$row['is_admin']?>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?=URL?>backend/editUser" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
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