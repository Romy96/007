<h3>Maak een afspraak of stel een vraag.</h3>

<br></br>
<form name="contactform" method="post" action="/Pages/mail.php">                         
    <div class="form-group col-xs-12 floating-label-form-group controls"> <i class="fa fa-user"></i>
        <label for="first_name">Voornaam *</label>
    </div>
    <input class="form-control type="text" name="first_name" placeholder="Voornaam">
    <br>

    <div class="form-group col-xs-12 floating-label-form-group controls"> <i class="fa fa-user"></i>
        <label for="last_name">Achternaam *</label>
    </div>
    <input  class="form-control type="text" name="last_name" placeholder="Achternaam">
    <br>

    <div class="form-group col-xs-12 floating-label-form-group controls"> <i class="fa fa-envelope-o"></i>
        <label for="email">Email Addres *</label>
    </div>
    <input class="form-control type="text" name="email" placeholder="Email address">
    <br>

    <div class="form-group col-xs-12 floating-label-form-group controls"> <i class="fa fa-mobile"></i>
        <label for="telephone">Telefoon nummer *</label>
    </div>
    <input class="form-control type="text" name="telephone" placeholder="telefoon nummer">
    <br>

    <div class="form-group col-xs-12 floating-label-form-group controls"> <i class="fa fa-file-text"></i>
        <label for="comments">vraag en/of afspraak</label>
    </div>
    <textarea class="form-control" placeholder="Typ hier je vraag en/of afspraak" name="comments" maxlength="1000" cols="25" rows="6"></textarea>
    <br>
    
    <div class="form-group col-xs-12">
        <button type="submit" value="Submit" class="btn btn-success btn-lg">Send</button>
    </div>
</form>