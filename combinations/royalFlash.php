<?php
function royalFlash($generatedCards){
    $royalD = '';
    $royalC = '';
    $royalH = '';
    $royalS = '';
    for ($i=0; $i < count($generatedCards) ; $i++) { 
        if($generatedCards[$i] === "Ad"){
            $royalD[0] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Ac"){
            $royalC[0] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Ah"){
            $royalH[0] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "As"){
            $royalS[0] = $generatedCards[$i][0];
        }
        
        else if($generatedCards[$i] === "Kd"){
            $royalD[1] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Kc"){
            $royalC[1] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Kh"){
            $royalH[1] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Ks"){
            $royalS[1] = $generatedCards[$i][0];
        }

        else if($generatedCards[$i] === "Qd"){
            $royalD[2] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Qc"){
            $royalC[2] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Qh"){
            $royalH[2] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Qs"){
            $royalS[2] = $generatedCards[$i][0];
        }

        else if($generatedCards[$i] === "Jd"){
            $royalD[3] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Jc"){
            $royalC[3] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Jh"){
            $royalH[3] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Js"){
            $royalS[3] = $generatedCards[$i][0];
        }

        else if($generatedCards[$i] === "Td"){
            $royalD[4] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Tc"){
            $royalC[4] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Th"){
            $royalH[4] = $generatedCards[$i][0];
        }else if($generatedCards[$i] === "Ts"){
            $royalS[4] = $generatedCards[$i][0];
        }
    }
    if($royalD === 'AKQJT'||
       $royalC === 'AKQJT'||
       $royalH === 'AKQJT'||
       $royalS === 'AKQJT'
    ){
        return "royalFlash";
    }else{
        return false;
    }
}

?>
