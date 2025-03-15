<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    
    $errors = [];
    if (empty($name)) {
        $errors[] = "Name cannot be empty.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }else{
        echo "<h2>Form Submitted Successfully!</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Email:</strong> $password</p>";
    }
    if (!empty($errors)) {
        header("Location: index.html?error=" . urlencode(implode(" ", $errors)));
        exit();
    }
    header("Location: index.html?success=Form successfully submitted.");
    exit();
}
?>
