<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Log in</title>
</head>
<body>

<?php 

// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is logged in redirect to the login page...
if (isset($_SESSION['loggedin'])) {
    header('Location: info.php');
    exit;
}

$err = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Now we check if the data from the login form was submitted, isset() will check if the data exists.
    if (!isset($_POST['username'], $_POST['password']) || empty($_POST['username']) || empty($_POST['password'])) {
        // Could not get the data that should have been sent.
        $err = 'Please fill both the username and password fields!';
    } else {
        // Verification success! User has logged-in!
        // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
        session_regenerate_id();
        $_SESSION['loggedin'] = true;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];

        header('Location: info.php');
    }
}

?>

    <div class="flex flex-col items-center">
        <h1 class="text-2xl py-5">Login</h1>
        <?php echo $err; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="flex flex-col gap-2">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username">
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" name="password" placeholder="Password" id="password">
            <input type="submit" value="Login" class="border my-5 hover:bg-gray-200">
        </form>
    </div>
</body>
</html>