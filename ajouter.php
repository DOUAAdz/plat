<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "restaurant");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];

    // Ensure the images folder exists
    if (!is_dir("images")) {
        mkdir("images", 0777, true);
    }

    // Check if an image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        // Try to upload the image
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            // Insert into database
            $sql = "INSERT INTO plats (nom, description, prix, categorie, image) 
                    VALUES ('$nom', '$description', '$prix', '$categorie', '$image')";

            if ($conn->query($sql) === TRUE) {
                echo "Plat ajouté avec succès !";
                header("Location: index.php");
                exit();
            } else {
                echo "Erreur lors de l'ajout du plat: " . $conn->error;
            }
        } else {
            echo "Erreur lors de l'upload de l'image.";
        }
    } else {
        echo "Aucune image sélectionnée.";
    }
    function resizeImage($source, $destination, $new_width, $new_height) {
        list($width, $height, $type) = getimagesize($source);
        
        // Créer une nouvelle image avec la taille spécifiée
        $new_image = imagecreatetruecolor($new_width, $new_height);
        
        // Charger l'image selon son type
        switch ($type) {
            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($source);
                break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($source);
                break;
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($source);
                break;
            default:
                return false; // Format non supporté
        }
        
        // Redimensionner l'image
        imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        
        // Sauvegarder l'image redimensionnée
        switch ($type) {
            case IMAGETYPE_JPEG:
                imagejpeg($new_image, $destination, 90);
                break;
            case IMAGETYPE_PNG:
                imagepng($new_image, $destination);
                break;
            case IMAGETYPE_GIF:
                imagegif($new_image, $destination);
                break;
        }
        
        // Libérer la mémoire
        imagedestroy($new_image);
        imagedestroy($image);
        
        return true;
    }
    
    // Dossier de destination
    $target_dir = "images/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $temp_file = $_FILES['image']['tmp_name'];
    
    // Redimensionner et enregistrer l’image
    if (resizeImage($temp_file, $target_file, 300, 200)) { // Change la taille selon ton besoin
        echo "Image redimensionnée et uploadée avec succès.";
    } else {
        echo "Erreur lors du traitement de l'image.";
        exit;
    }
    
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un plat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Ajouter un plat</h2>
        <form action="ajouter.php" method="post" enctype="multipart/form-data">
            <input type="text" name="nom" placeholder="Nom du plat" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="number" name="prix" placeholder="Prix (DA)" step="0.01" required>
            <input type="text" name="categorie" placeholder="Catégorie" required>
            <input type="file" name="image" required>
            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>
