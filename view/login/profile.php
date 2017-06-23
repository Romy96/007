<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <h4><?= $profile['firstname'];?> <?= $profile['prefix'] . " " . $profile['lastname'];?></h4>
                        <small><cite><?= $profile['home_adress'];?>, <?= $profile['zip_code'];?> <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?= $profile['email'];?>
                            <br />
                            <i class="fa fa-user" aria-hidden="true"></i> <?= $profile['username'];?>
                        <!-- Split button -->

                        <div class="btn-group">
                        <a href="<?= URL ?>login/profileEdit/<?= $_SESSION['userId'] ?>" class="btn btn-info" role="button">Wijzig profiel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>