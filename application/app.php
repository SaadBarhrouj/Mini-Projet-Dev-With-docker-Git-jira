<?php
    // Inclure le fichier de connexion à la base de données
    include "connexion.php";

    // Démarrer la session pour récupérer l'email de l'utilisateur connecté
    session_start();
    $email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats</title>
    <style>
       h1 {
            margin: 0;
            margin-bottom: 80px;
            padding: 100px 0; /* Ajout d'un espace en haut et en bas du titre */
            font-size: 5em;
            width: 100%;
            color: white;
            text-align: center;
            background-image: url("https://keystoneacademic-res.cloudinary.com/image/upload/f_auto/q_auto/g_auto/w_780/dpr_2.0/element/13/132149_KeystoneCOVER.jpg");
            background-size: 100% auto; /* Utiliser la largeur de l'image originale */
            background-position: top center; /* Positionner l'image en haut et centrer horizontalement */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.7);
        }

        body {
            width: 80%;
            margin: auto;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            margin: 25px auto;
            padding: 5px;
            font-size: 0.9em;
            font-family: sans-serif;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            width: 100%;
            background-color: #6d9fc5; /* Bleu moyen pour le tableau */
            color: #fff; /* Texte blanc dans le tableau */
        }

        td, th {
            padding: 15px;
            text-align: center;
            font-size: 1.5em;
        }

        thead tr{
            background-color : black;
            color : #ffffff;
            text-align : center;
        }

        tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }

        tbody tr:nth-of-type(even) {
            background-color: lightgrey;
            color: black;
        }
        tbody tr:nth-of-type(odd) {
            background-color: white; 
            color: black;
        }
    </style>
</head>
<body>

<h1>Résultats</h1>

<table>
    <thead>
    <tr>
        <th>Matière</th>
        <th>Note</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Préparer et exécuter la requête SQL pour récupérer les résultats de l'étudiant
    $sql = "SELECT * FROM student WHERE email = '$email'";
    $result = mysqli_query($link, $sql);

    // Afficher les résultats dans le tableau
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td>SE</td>
            <td><?php echo $row["système d'exploitation"]; ?></td>
        </tr>
        <tr>
            <td>C Avancé</td>
            <td><?php echo $row["C Avancé"]; ?></td>
        </tr>
        <tr>
            <td>ADO</td>
            <td><?php echo $row["ADO"]; ?></td>
        </tr>
        <tr>
            <td>THL</td>
            <td><?php echo $row["THL"]; ?></td>
        </tr>
        <tr>
            <td>Développement Web</td>
            <td><?php echo $row["Développement web"]; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

</body>
</html>
