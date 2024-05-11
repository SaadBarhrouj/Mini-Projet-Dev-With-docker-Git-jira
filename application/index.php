<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connexion à la base de données
    include "connexion.php";

    // Vérifier si la connexion a été établie avec succès
    if (!$link) {
        die("La connexion à la base de données a échoué: " . mysqli_connect_error());
    }

    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifier les informations de connexion dans la base de données
    $sql = "SELECT * FROM student WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($link,$sql);

    if (mysqli_num_rows($result) == 1) {
        // L'utilisateur est authentifié, démarrer une session et stocker l'e-mail
        session_start();
        $_SESSION['email'] = $email;
        // Rediriger vers la page des notes
        header('Location: app.php');
        exit; // Terminer le script après la redirection
    } else {
        // Rediriger vers la page de connexion avec un message d'erreur
        header('Location: login.php?error=1');
        exit; // Terminer le script après la redirection
    }

    // Fermer la connexion à la base de données
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .home {
            position: relative;
            height: 100vh;
            width: 100%;
            background-image: url("https://static.vecteezy.com/system/resources/previews/029/593/642/non_2x/blue-purple-gradient-abstract-background-with-smoke-neon-glow-effect-generative-ai-free-photo.jpeg");
            background-position: center;
            background-size: cover;
        }

        .login_form {
            box-size: 80px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

        }

        .login_form h2 {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 30px;
        }

        .input_box {
            position: relative;
            margin-bottom: 30px;
        }

        .input_box input {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #333;
            outline: none;
            font-size: 16px;
        }

        .input_box input:focus {
            border-bottom: 1px solid #007bff; /* Couleur bleue pour mettre en évidence le champ actif */
        }

        .input_box i {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: #333;
        }

        .pw-hide {
            cursor: pointer;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background-color: #007bff; /* Couleur bleue */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3; /* Couleur bleue plus foncée au survol */
        }

        .error-message {
            text-align: center;
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <section class="home"></section>
    <div class="login_form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h2>Login</h2>
            <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
                <p class="error-message">Adresse e-mail ou mot de passe incorrect.</p>
            <?php endif; ?>
            <div class="input_box">
                <input type="email" name="email" placeholder="Adresse e-mail" required>
                <i class="uil uil-envelope-alt email"></i>
            </div>
            <div class="input_box">
                <input type="password" name="password" id="password" placeholder="Mot de passe" required />
                <i class="uil uil-lock password"></i>
                <i class="uil uil-eye-slash pw-hide" id="togglePassword"></i>
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>

    <script>
        // JavaScript pour afficher/masquer le mot de passe
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('uil-eye-slash');
        });
    </script>
</body>
</html>
