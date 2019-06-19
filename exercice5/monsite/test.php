<?php
include('Calcul.php');

session_start();

$mysqli = new mysqli('maria', 'monuser', 'password');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if (!empty($_POST['Prenom']) && !empty($_POST['nom'])) {
    if ($results = $mysqli->query("SELECT * FROM mabase.utilisateur WHERE nom = '" . $_POST['nom'] . "'")) {
        $row = $results->fetch_all();
        if (empty($row)) {
            if ($mysqli->query("INSERT INTO mabase.utilisateur VALUES ('" . $_POST['Prenom'] . "', '" . $_POST['nom'] . "')") === TRUE) {
                $_SESSION["nom"] = $_POST['nom'];
                $_SESSION["Prenom"] = $_POST['Prenom'];
                $_SESSION["isConnect"] = true;
                $_SESSION["message"] = "";
            }
        } else {
            header('Location: index.php');
            $_SESSION["message"] = "ce nom existe deja";
        }
    }
}

if (!empty($_POST['PrenomC']) && !empty($_POST['nomC'])) {
    if ($results = $mysqli->query("SELECT * FROM mabase.utilisateur WHERE nom = '" . $_POST['nomC'] . "' AND prenom = '" . $_POST['PrenomC'] . "'")) {
        $row = $results->fetch_all();
        if (!empty($row)) {
            $_SESSION["nom"] = $_POST['nomC'];
            $_SESSION["Prenom"] = $_POST['PrenomC'];
            $_SESSION["isConnect"] = true;
            $_SESSION["message"] = "";
        } else {
            header('Location: index.php');
            $_SESSION["message"] = "Mauvais identifiant";
        }
    }
}

if (!isset($_SESSION["isConnect"])) {
    header('Location: index.php');
}

echo 'Nom : ' . $_SESSION["nom"];
echo '</br>';
echo 'Prenom : ' . $_SESSION["Prenom"];
echo '</br>';

$mysqli->close();
?>
<a href="/deconnexion.php">Deconexion</a>

<h2> La suite de Fibonacci</h2>
<form method="POST" action="/test.php">
    <input type="text" name="chiffre" id="">
    <input type="submit" name="envoyer" id="">
</form>
<?php 
if (!empty($_POST['chiffre']) && 0 < $_POST['chiffre']) {
      $exampleClass = new Calcul();
      echo "Dans la suite de fibonacci : " . $_POST['chiffre'] . " ittération en partant de 0 donne " . $exampleClass->fibonacci($_POST['chiffre']);
      echo '</br>';
    }
?>
<h2>La Factoriel d'un nombre</h2>
<form method="POST" action="/test.php">
    <input type="text" name="nombre" id="">
    <input type="submit" name="envoyer" id="">
</form>
<?php 
if (!empty($_POST['nombre']) && 0 < $_POST['nombre']) {
      $exampleClass = new Calcul();
      echo "La factorielle de " . $_POST['nombre'] . " est " . $exampleClass->factorielle($_POST['nombre']);
      echo '</br>';
    }
?>
