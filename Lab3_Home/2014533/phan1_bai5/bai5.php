<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
    $ans = 0;
    if (isset($_POST["sub"])) {
      $num1 = $_POST["n1"];
      $num2 = $_POST["n2"];
      $oprnd = $_POST["sub"];
      if ($oprnd == "+") {
        $ans = $num1 + $num2;
      } elseif ($oprnd == "-") {
        $ans = $num1 - $num2;
      } elseif ($oprnd == "x") {
        $ans = $num1 * $num2;
      } elseif ($oprnd == "/") {
        $ans = $num1 / $num2;
      }
    } ?>

    <div class="container">
        <form method="post" action="">
            <h1>Simple Calculator</h1>
            <div>First Number: <input name="n1" value=""></div>
            <div>Second Number: <input name="n2" value=""></div>
            <input type="submit" name="sub" value="+">
            <input type="submit" name="sub" value="-">
            <input type="submit" name="sub" value="x">
            <input type="submit" name="sub" value="/">
            <br>
            <br>Result: <input type='text' value="<?php echo $ans; ?>"><br>
        </form>
	</div>
</body>
</html>