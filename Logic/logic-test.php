<?php


function getMax(array $number){
    $current = 0;
    foreach ($number as $num){
        if($num > $current){
            $current = $num;
        }
    }
    echo $current . PHP_EOL;
}


function getMin(array $number){
    $current = null;
    foreach ($number as $num){
        if($current == null){
            $current = $num;
        }elseif($num < $current){
            $current = $num;
        }
    }
    echo $current . PHP_EOL;
}

function printString($number){
    $string = null;
    for ($i = $number; $i >= 0; $i--){
        if($i % 25 == 0){
            $string = $string . " KI";
        }elseif ($i % 40 == 0){
            $string = $string . " OS";
        }elseif ($i % 60 == 0){
            $string = $string . " TIX";
        }elseif ($i % 99 == 0){
            $string = $string . " KIOSTIX";
        }
    }
    echo $string . PHP_EOL;
}

function palindrom($string){
    $stringSplit = str_split($string);
    $palindrom = true;
    for ($i = 0; $i <= count($stringSplit) - 1; $i++){
        for ($j = count($stringSplit) - 1; $j >= 0; $j--){
            if($stringSplit[$j] !== $stringSplit[$j]){
                $palindrom = false;
            }
        }
    }
    echo $palindrom ? $string . " adalah Palindrom" . PHP_EOL: $string .  "bukan palindrom ". PHP_EOL;
}

getMax([10,20,30,40]);
getMin([10,20,30,40]);
printString(100);
palindrom('LEVEL');
