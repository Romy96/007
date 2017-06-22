<h1>Toevoegen nieuwsletter</h1>

    <div class="row">
        <form role="form" method="post" action="<?=URL?>backend/insert_newsletter" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">   <!-- white background -->
                        <div class="box-body">      <!-- some whitespace -->
                            <div class="box-body">  
                                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                                <div class="form-group">
                                    <label for="title">Titel:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Vul titel van nieuwsbrief in" required>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for="description">Beschrijving:</label>
                                     <div class="input-group">
                                        <textarea class="form-control" placeholder="description" name="description" type="text" id="description" rows="5"></textarea>
                                    </div>
                                </div>
                                <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-info pull-right">
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>