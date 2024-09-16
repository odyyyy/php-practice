<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Shape</h1>
    <?php 
        include 'create_svg.php';

        if (isset($_GET['num'])) {
            $shape_id = intval($_GET['num']);
            $shape_svg = create_svg($shape_id);
            echo $shape_svg;
            
        }
    ?>

</body>
</html>