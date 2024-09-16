<?php 

function sort_array($arr_str) {

    $arr = explode(",", $arr_str);
    $n = count($arr); 
    for ($i = 0; $i < $n; $i++) { 
        $low = $i; 
        for ($j = $i + 1; $j < $n; $j++) { 
            if ($arr[$j] < $arr[$low]) { 
                $low = $j; 
            } 
        } 
          
        if ($arr[$i] > $arr[$low]) { 
            $tmp = $arr[$i]; 
            $arr[$i] = $arr[$low]; 
            $arr[$low] = $tmp; 
        } 
    } 
    return $arr; 
}

?>
