<h1>Profiel</h1>
<p>
Voornaam: <?= $profile['firstname'];?>
<br/>
Achternaam: <?= $profile['prefix'] . " " . $profile['lastname'];?>
<br/>
Gebruikersnaam: <?= $profile['username'];?>
<br/>
Email: <?= $profile['email'];?>
<br/>
<br/>
<a href="<?= URL ?>login/profileEdit/<?= $_SESSION['userId'] ?>">Wijzig profiel</a>
</p>