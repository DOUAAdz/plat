<?php
include "config.php";

$result = $conn->query("SELECT * FROM plats");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des plats</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Liste des plats</h2>
        <a href="ajouter.php" class="btn">Ajouter un plat</a>
        <div class="plats">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="plat">
                    <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['nom']; ?>">
                    <h3><?php echo $row['nom']; ?></h3>
                    <p><?php echo $row['description']; ?></p>
                    <p><strong><?php echo $row['prix']; ?> DA</strong></p>
                    <a href="modifier.php?id=<?php echo $row['id']; ?>" class="btn">Modifier</a>
                    <a href="supprimer.php?id=<?php echo $row['id']; ?>" class="btn delete">Supprimer</a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
