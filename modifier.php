<?php
include "config.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM plats WHERE id=$id");
    $plat = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $categorie = $_POST["categorie"];
    $sql = "UPDATE plats SET nom='$nom', description='$description', prix='$prix', categorie='$categorie' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erreur : " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un plat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Modifier un plat</h2>
        <form action="" method="post">
            <input type="text" name="nom" value="<?php echo $plat['nom']; ?>" required>
            <textarea name="description" required><?php echo $plat['description']; ?></textarea>
            <input type="number" name="prix" value="<?php echo $plat['prix']; ?>" step="0.01" required>
            <input type="text" name="categorie" value="<?php echo $plat['categorie']; ?>" required>
            <button type="submit">Modifier</button>
        </form>
    </div>
</body>
</html>
