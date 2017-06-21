<h1>Gebruikers</h1>

<div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header"> 
                        <div class="col-md-6">
                        <form action="<?=URL?>backend/search_user" method="post">  
                            <h3>Search</h3>
                            <div id="custom-search-input">
                                <div class="input-group col-md-12">
                                    <input type="text" name="term" class="form-control input-lg" placeholder="vul gebruikersnaam in"/><br />  
                                    <span class="input-group-btn">
                                        <button class="btn btn-info btn-lg" type="button">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>    
                        </form> 
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Woonadres</th>
                            <th>Postcode</th>
                            <th>Gebruikersnaam</th>
                            <th>Wachtwoord</th>
                            <th>Emailadres</th>
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
                                        <?=$row['firstname']?>
                                    </td>
                                    <td>
                                    	<?=$row['prefix']?> <?=$row['lastname']?>
                                    </td>
                                    <td>
                                        <?=$row['home_adress']?>
                                    </td>
                                    <td>
                                        <?=$row['zip_code']?>
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
                                        <div class="btn-group">
                                            <a href="<?=URL?>backend/edit/<?=$row['id']?>" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
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