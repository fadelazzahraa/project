<?php

// $a = [2,3,4,5,6,10,11];
// $arrayx = array('1'=>'2');

// foreach($a as $inp){
//     $arrayx[$inp] = 1;
// }
// foreach($arrayx as $xx){
//     echo array_search(2, $arrayx) . "=>1 \n";
    
// }

$a = array('1' => '1',
            '2'=> '2',
            '3'=> '3',
            '4'=> '2',
            '5'=> '1',
            '6'=> '3',
);
echo array_search(3, $a);
unset($a[array_search(3, $a)]);
echo array_search(3, $a);

echo "<br>";
echo $arrayx['11'];
?>