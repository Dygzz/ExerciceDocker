<?php 
session_start();
if($_SESSION["message"] != '') {
   echo $_SESSION["message"];
}
if($_SESSION["isConnect"] == true) {
echo 'vous êtes connecter';
}
else {

?>

<h2>Inscription</h2>
<form method="POST" action="/test.php">
    <label for="Prenom">Prénom</label>
    <input type="text" name="Prenom">
    <label for="nom">Nom</label>
    <input type="text" name="nom">
    <input type="submit" name="envoyer" id="">
</form>

<h2>Connexion</h2>

<form method="POST" action="/test.php">
    <label for="PrenomC">Prénom</label>
    <input type="text" name="PrenomC">
    <label for="nomC">Nom</label>
    <input type="text" name="nomC">
    <input type="submit" name="envoyer" id="">
</form>

<?php 

}

?>
