<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Info</title>
</head>
<body>

<?php 
    // We need to use sessions, so you should always start sessions using the below code.
    session_start();
    // If the user is logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.php');
        exit;
    }

    echo '<p class="text-2xl font-bold">Welcome ' . $_SESSION['name'] . '</p><br>';
    echo '<p class="text-2xl font-bold">Your password is ' . $_SESSION['password']. '</p><br>';
?>

   <a href="logout.php"><button class="border-2 border-red-600 text-red-600 rounded-full hover:text-white hover:bg-red-600 font-semibold px-4 py-2">Log out</button></a> 

</body>
</html>