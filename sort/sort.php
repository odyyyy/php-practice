<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include 'sort_algorythm.php';
    $arr_str = "1,7,3,1,5,6,1,8,9,4";

    $sortedArr = sort_array($arr_str);

    echo "Отсортированный массив: " . implode(" ", $sortedArr); 

    ?>

</body>
</html>