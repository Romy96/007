<h1>Toevoegen product</h1>

    <div class="row">
        <form role="form" method="post" action="<?=URL?>backend/insert_product" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">   <!-- white background -->
                        <div class="box-body">      <!-- some whitespace -->
                            <div class="box-body">  
                                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                                <div class="form-group">
                                    <label for="product">Product:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                                        <input type="text" class="form-control" id="product" name="product" placeholder="Vul naam van product in" required>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="afbeelding">Afbeelding achtergrond:</label>
                                     <div class="input-group">
                                        <input type="text" class="form-control" data-slug="source" placeholder="afbeelding achtergrond" id="afbeelding" name="afbeelding">
                                        <span class="custom-file-control"></span>
                                        <small class="text-muted">Put image URL from your documents or internet into the field.</small>
                                    </div>
                                </div> -->
                                 <div class="form-group">
                                    <label for="price">Prijs:</label>
                                    <div class="input-group">
                                    	<span class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></span>
                                        <input type="number" class="form-control" placeholder="vul bedrag van product in" id="price" name="price">
                                	</div>
                                </div>
                                <div class='form-group'>
                                    <label for="category">Categorie:</label>
                                     <div class="input-group">
                                        <input class="form-control" placeholder="category" name="category" type="text" id="category">
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for="description">Beschrijving:</label>
                                     <div class="input-group">
                                        <textarea class="form-control" placeholder="description" name="description" type="text" id="description" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for="amount">Aantal:</label>
                                     <div class="input-group">
                                        <input class="form-control" placeholder="amount" name="amount" type="number" id="amount">
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for="fileToUpload">Select image to upload:</label>
                                    <div class="input-group">
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                    </div>
                                </div>
                                <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-info pull-right">
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </div>