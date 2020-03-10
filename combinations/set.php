<?php
function set(){
    $generatedCards = ["Ac","Ac","2s","Ac","3s","3s","3h"];
    $cards = '';
    $match = 0;
    for ($i=0; $i < count($generatedCards); $i++) { 
        $cards=$cards.$generatedCards[$i][0];
    }
    
for ($i=strlen($cards); $i >0; $i--) {
    $stop = false;
    for ($j=strlen($cards); $j > 1 ; $j--) {
        if($cards[$i-1]===$cards[$j-2]){
            $match+=1;
            $stop = true;
        }
    }
    
    
    $cards = substr($cards, 0, -1);
}
    echo $match;
    if($match === 3){
        return 'set';
    }else if($match === 6 || $match === 7 || $match === 9 ){
        return "kare";
    }else if($match === 4 || $match === 5){
        return "full_house";
    }
}
echo set();
?>
