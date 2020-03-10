<?php
function straight($generatedCards){
    $cards = '';
    for ($i=0; $i < count($generatedCards); $i++) { 
        $cards=$cards.$generatedCards[$i][0];
    }
    $straightA = '';
    $straightK = '';
    $straightQ = '';
    $straightJ = '';
    $straightT = '';
    $straight9 = '';
    $straight8 = '';
    $straight7 = '';
    $straight6 = '';
    $straight5 = '';

    for ($i=0; $i < strlen($cards); $i++) { 
        if($cards[$i]=="A"){
            $straightA[0] = "A";
            $straight5[4] = "A";
        }else if($cards[$i]=="K"){
            $straightA[1] = "K";
            $straightK[0] = "K";
        }else if($cards[$i]=="Q"){
            $straightA[2] = "Q";
            $straightK[1] = "Q";
            $straightQ[0] = "Q";
        }else if($cards[$i]=="J"){
            $straightA[3] = "J";
            $straightK[2] = "J";
            $straightQ[1] = "J";
            $straightJ[0] = "J";
        }else if($cards[$i]=="T"){
            $straightA[4] = "T";
            $straightK[3] = "T";
            $straightQ[2] = "T";
            $straightJ[1] = "T";
            $straightT[0] = "T";
        }else if($cards[$i]=="9"){
            $straightK[4] = "9";
            $straightQ[3] = "9";
            $straightJ[2] = "9";
            $straightT[1] = "9";
            $straight9[0] = "9";
        }else if($cards[$i]=="8"){
            $straightQ[4] = "8";
            $straightJ[3] = "8";
            $straightT[2] = "8";
            $straight9[1] = "8";
            $straight8[0] = "8";
        }else if($cards[$i]=="7"){
            $straightJ[4] = "7";
            $straightT[3] = "7";
            $straight9[2] = "7";
            $straight8[1] = "7";
            $straight7[0] = "7";
        }else if($cards[$i]=="6"){
            $straightT[4] = "6";
            $straight9[3] = "6";
            $straight8[2] = "6";
            $straight7[1] = "6";
            $straight6[0] = "6";
        }else if($cards[$i]=="5"){
            $straight9[4] = "5";
            $straight8[3] = "5";
            $straight7[2] = "5";
            $straight6[1] = "5";
            $straight5[0] = "5";
        }else if($cards[$i]=="4"){
            $straight8[4] = "4";
            $straight7[3] = "4";
            $straight6[2] = "4";
            $straight5[1] = "4";
        }else if($cards[$i]=="3"){
            $straight7[4] = "3";
            $straight6[3] = "3";
            $straight5[2] = "3";
        }else if($cards[$i]=="2"){
            $straight6[4] = "2";
            $straight5[3] = "2";
        }
    }
    

    if($straightA ==="AKQJT"){
        return "straight";
    }else if($straightK ==="KQJT9"){
        return "straight";
    }else if($straightK ==="QJT98"){
        return "straight";
    }else if($straightK ==="JT987"){
        return "straight";
    }else if($straightK ==="T9876"){
        return "straight";
    }else if($straightK ==="98765"){
        return "straight";
    }else if($straightK ==="87654"){
        return "straight";
    }else if($straightK ==="76543"){
        return "straight";
    }else if($straightK ==="65432"){
        return "straight";
    }else if($straightK ==="5432A"){
        return "straight";
    }else{
        return false;
    }
    
}

?>