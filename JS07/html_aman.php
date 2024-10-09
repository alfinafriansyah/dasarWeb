<!DOCTYPE html>
<html>
<head>
    <title>Input Form</title>
</head>
<body>
    <h2>Form Input</h2>
    <form method="post" action="">
        <label for="input">Input:</label>
        <input type="text" name="input" id="input"><br><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['input'];
        echo "Input yang diterima: " . $input;
        echo "<br>";

        // Validasi email
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Lanjutkan dengan pengolahan email yang aman
            echo "Email yang diterima: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        } else {
            // Tangani input yang tidak valid
            echo "Email tidak valid!";
        }
    }
    ?>
</body>
</html>
