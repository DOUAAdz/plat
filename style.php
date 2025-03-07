body {
    font-family: Arial, sans-serif;
    background: url('big.jpg') no-repeat center center fixed;
    background-size: cover;
    text-align: center;
    margin: 0;
    padding: 0;
}

.container {
    background: rgba(255, 255, 255, 0.9);
    width: 60%;
    margin: 50px auto;
    padding: 20px;
    box-shadow: 0px 0px 10px gray;
    border-radius: 8px;
}

.plats {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;}
    .plat img {
        width: 100%; /* Ajuste la largeur à 100% du conteneur */
        height: 200px; /* Hauteur fixe pour uniformiser les images */
        object-fit: cover; /* Recadre l'image pour qu'elle remplisse le cadre sans déformation */
        border-radius: 8px;
    }
    


.plat {
    width: 250px;
    margin: 20px;
    padding: 15px;
    background: white;
    box-shadow: 0px 0px 5px gray;
    border-radius: 8px;
    text-align: left;
}

.plat img {
    width: 100%;
    border-radius: 8px;
}

.btn {
    display: inline-block;
    padding: 8px 12px;
    margin: 10px;
    text-decoration: none;
    color: white;
    background: #28a745;
    border-radius: 5px;
}

.btn.delete {
    background: #dc3545;
}

input, textarea {
    width: 100%;
    margin: 10px 0;
    padding: 10px;
    border: 1px solid gray;
    border-radius: 5px;
}
