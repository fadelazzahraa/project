<?php 
    function initCart($array){
        $initArray = array();

        foreach($array as $i){
            $initArray[$i['id']] = 0;
        }

        return $initArray;
    }

    function isCartNotEmpty($array){
        foreach ($array as $item){
            if ($item != 0){
                return 1;
            };
        };
        return 0;
    }

    function addToCart($array, $id){
        $array[$id] = $array[$id] + 1;
        return $array;
    }

    function countCartItem($array){
        $count = 0;
        foreach ($array as $item){
            $count = $count + $item;
        }
        return $count;
    }

    function deleteFromCart($array, $id){
        $array[$id] = $array[$id] - 1;
        return $array;
    }

?>