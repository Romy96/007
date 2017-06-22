<?php
if(isset($newsletter)):
?>

<h1>Bewerk nieuwsletter</h1>

    <div class="row">
        <form role="form" method="post" action="<?=URL?>backend/update_newsletter" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">   <!-- white background -->
                        <div class="box-body">      <!-- some whitespace -->
                            <div class="box-body">  
                                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                                <div class="form-group">
                                    <label for="title">Titel:</label>
                                    <div class="input-group">
                                    	<input type="hidden" name="id" value="<?=$newsletter['id']?>">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <input type="text" class="form-control" id="title" name="title" value="<?=$newsletter['title']?>" required>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for="description">Beschrijving:</label>
                                     <div class="input-group">
                                        <textarea class="form-control" name="description" type="text" id="description" rows="5"><?=$newsletter['description']?></textarea>
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