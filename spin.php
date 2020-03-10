<?php
include './combinations/flash.php';
include './combinations/straight.php';
include './combinations/combos.php';
include './combinations/royalFlash.php';
include './helpers/calculateWinRate.php';
include './helpers/winMessage.php';
include './COMBO_WIN_RATES.php';

    $cards = ['Ad','Ac','Ah','As','Kd','Kc','Kh','Ks','Qd','Qc','Qh','Qs','Jd','Jc','Jh','Js','Td','Tc','Th','Ts','9d','9c','9h','9s','8d','8c','8h','8s','7d','7c','7h','7s','6d','6c','6h','6s','5d','5c','5h','5s','4d','4c','4h','4s','3d','3c','3h','3s','2d','2c','2h','2s'];
    $cardPositions = [];
    $generatedCards =[];

    function randNum(&$cardPositions){
        if(count($cardPositions)!==7){
            $randNum = mt_rand(0,51);
            $match = false;
            foreach($cardPositions as $cardPosition){
                if($cardPosition===$randNum ){
                    $match = true;
                    break;
                }
            }
            if(!$match){
            array_push($cardPositions,$randNum);
            randNum($cardPositions); 
            }else if ($match){
                randNum($cardPositions);
            }
        }
    }

    function retrieveCards(&$generatedCards,&$cards,&$cardPositions){
    for ($i=0; $i < count($cardPositions) ; $i++) { 
        array_push($generatedCards,$cards[$cardPositions[$i]]);
    }
    }

if($_POST['action'] == 'spinCheck') {
    if((int)$_POST['balance']<1 || (int)$_POST['balance']<(int)$_POST['betSize']){
        header('HTTP/1.1 500 Internal Server error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('msg' => 'balance error', 'code' => 1337)));
    } 
}else if($_POST['action'] == 'spinEffect'){
        randNum($cardPositions);
        retrieveCards($generatedCards,$cards,$cardPositions);
        echo json_encode($generatedCards);
    
}else if ($_POST['action'] == 'spin'){
    if((int)$_POST['balance']<1 || (int)$_POST['balance']<(int)$_POST['betSize']){
        header('HTTP/1.1 500 Internal Server error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('msg' => 'balance error', 'code' => 1337)));
    }else{
        $betSize = $_POST['betSize'];
        randNum($cardPositions);
        retrieveCards($generatedCards,$cards,$cardPositions);
        $flash = flash($generatedCards);
        $straight = straight($generatedCards);
        $combos = combos($generatedCards);
        $royalFlash = royalFlash($generatedCards);
        $finalCombo = false;
    
    if(!$combos && !$flash && !$straight && !$royalFlash){
        $finalCombo = false;
    }else if ($royalFlash){
        $finalCombo = $royalFlash;
    }else if ($combos === "full_house" || $combos === "kare" && !$royalFlash){
        $finalCombo = $combos;
    }else if ($combos !== "full_house" && $combos !== "kare" && !$royalFlash && $flash ){
        $finalCombo = $flash;
    }else if ($combos !== "full_house" && $combos !== "kare" && !$flash && !$royalFlash && $straight){
        $finalCombo = $straight;
    }else if ($combos !== "full_house" && $combos !== "kare" && !$flash && !$straight && !$royalFlash){
        $finalCombo = $combos;
    }
    
    $winRate = calculateWinRate($betSize,$finalCombo,$COMBO_WIN_RATES);
    $msg=winMessage($betSize,$winRate,$COMBO_WIN_RATES);  
    $balance = $_POST['balance'] - $betSize + $winRate;
    
    $afterSpinData = array(
        'generatedCards'=>$generatedCards,
        'finalCombo'=>$finalCombo,
        'winRate'=> $winRate,
        'msg'=>$msg,
        'balance'=>$balance
    );
    echo json_encode($afterSpinData);

    } 
   

}
