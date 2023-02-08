<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    $number = 10;
    function firstFunction($num)
    {
      switch ($num % 5) {
        case 0:
          echo "Hello";
          break;

        case 1:
          echo "How are you?";
          break;

        case 2:
          echo "I'm doing well, thank you";
          break;

        case 3:
          echo "See you later";
          break;

        case 4:
          echo "Good-bye";
          break;
      }
    }

    firstFunction($number);
    ?>

</body>
</html>