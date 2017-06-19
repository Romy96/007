<h1>Creër recht</h1>

<div class="row">
        <form role="form" method="post" action="<?=URL?>backend/insert_permission">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">   <!-- white background -->
                        <div class="box-body">      <!-- some whitespace -->
                            <div class="box-body">  
                                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                                <div class="form-group">
                                    <label for="permission">Recht:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <input type="text" class="form-control" id="permission" name="permission" placeholder="Vul naam voor recht in (in het engels)" required>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label for="description">Beschrijving:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <textarea class="form-control" placeholder="description" name="description" type="text" id="description" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label for="role">Rol(len):</label>
                                	<div class="input-group">
                                	<?php
                                		if(isset($roles)):
                                			foreach($roles as $row):
                                	?>
										<div class="checkbox">
										  <label><input type="checkbox" name="role[]" value="<?=$row['id']?>"><?=$row['name']?></label>
										</div>
                                	<?php
                                			endforeach;
                                		endif;
                                	?>
                                	</div>
                                </div>
                                <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-info pull-right">
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>