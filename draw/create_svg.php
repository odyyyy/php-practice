<?php 

function create_svg($shape_id) {

    $shape = choose_shape($shape_id);
    return '<svg height="200" width="200">
        ' . $shape . '
        </svg>';
}

function choose_color($shape_id) {
    switch ($shape_id) {
        case 1:
            return "red";
            break;
        case 2:
            return "green";
            break;
        case 3:
            return "blue";
            break;
        default:
            return "black";
    }
}

function choose_shape($shape_id) {
    $INCREASE = 4;
    $size = 2 << $shape_id * $INCREASE;
    $color = choose_color($shape_id);
    switch ($shape_id) {
        case 1:
            return '<circle cx="50" cy="50" r="' .  $size . '" fill="' . $color . '" />';
            break;
        case 2:
            return '<rect x="10" y="10" width="' .  $size . '" height="' .  $size . '" fill="' . $color . '" />';
            break;
        default :
            return '<ellipse cx="60" cy="50" rx="60" ry="40" fill="' . $color . '" />';
            break;
    }
}



?>