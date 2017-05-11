<h1>Profiel</h1>
<p>
Avatar: <?= $profile['image'];?>
<br />
Voornaam: <?= $profile['firstname'];?>
<br/>
Achternaam: <?= $profile['prefix'] . " " . $profile['lastname'];?>
<br/>
Huisadres: <?= $profile['home_adress'];?>
<br/>
Postcode: <?= $profile['zip_code'];?>
<br/>
Gebruikersnaam: <?= $profile['username'];?>
<br/>
Email: <?= $profile['email'];?>
<br/>
<br/>
<a href="<?= URL ?>login/profileEdit/<?= $_SESSION['userId'] ?>">Wijzig profiel</a>
</p>