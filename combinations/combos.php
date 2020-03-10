<?php
function combos($generatedCards){
    // $generatedCards = ["Ac","Kc","6s","Ac","Ks","2s","3h"];
    $cards = '';
    $onePair = 0;
    $set = 0;
    $match = 0;
    $kare = false;
    for ($i=0; $i < count($generatedCards); $i++) { 
        $cards=$cards.$generatedCards[$i][0];
    }
    
for ($i=strlen($cards); $i >0; $i--) {
    for ($j=strlen($cards); $j > 1 ; $j--) {
        if($cards[$i-1]!=='1' && $cards[$i-1]===$cards[$j-2]){
            $match+=1;
        }
    }
    // echo $match;
    if($match === 1){
        if((int)$cards[$i-1]==0 || (int)$cards[$i-1]>6){
            // echo $cards[$i-1];
            $onePair +=1;
            $match = 0;
            $cards = str_replace($cards[$i-1],'1',$cards);
       }
       $match = 0;
       $cards = str_replace($cards[$i-1],'1',$cards);
    }else if ($match === 2){
        $cards = str_replace($cards[$i-1],'1',$cards);
        $set +=1;
        $match = 0; 
    }else if ($match === 3){
        $cards = str_replace($cards[$i-1],'1',$cards);
        $kare =true;
        $match = 0; 
    }
    $cards = substr($cards, 0, -1);
}

    if($onePair ===1 && $set !==1 && !$kare ){
        return "onePair";
    }else if($onePair ===2 && $set !==1 && !$kare){
        return "twoPair";
    }else if($set ===1 && $onePair !==1 && !$kare){
        return "set";
    }else if($set ===1 && $onePair ===1){
        return "full_house";
    }else if($set ===2){
        return "full_house";
    }else if($kare){
        return "kare";
    }else if ($kare && $onePair===1){
        return "kare";
    }else if ($kare && $set===1){
        return "kare";
    }else{
        return false;
    }
}
// echo combos();
?>
