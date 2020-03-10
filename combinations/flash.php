<?php
function flash($generatedCards){
    $diamons=0;
    $clubs =0;
    $hearts =0;
    $spades = 0;
    for ($i=0; $i < 7 ; $i++) { 
        if($generatedCards[$i][1]==="d"){
            $diamons+=1;
        }else if ($generatedCards[$i][1]==="c"){
            $clubs+=1;
        }else if ($generatedCards[$i][1]==="h"){
            $hearts+=1;
        }else if ($generatedCards[$i][1]==="s"){
            $spades+=1;
        }
    }

    if($diamons >=5||$clubs>=5||$hearts>=5||$spades>=5){
        return 'flash';
    }else{
        return false;
    }
    
}
?>
