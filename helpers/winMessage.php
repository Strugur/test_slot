<?php
function winMessage($betSize, $winRate, $COMBO_WIN_RATES)
{
    if ($winRate === $betSize * $COMBO_WIN_RATES['onePair']) {
        return "One pair!!! You have won {$winRate} coin(s)";
    } else if ($winRate === $betSize * $COMBO_WIN_RATES['twoPair']) {
        return "Two pair!!! You have won {$winRate} coin(s)";
    } else if ($winRate === $betSize * $COMBO_WIN_RATES['set']) {
        return "SET!!! You have won {$winRate} coin(s)";
    } else if ($winRate === $betSize * $COMBO_WIN_RATES['straight']) {
        return "STRAIGHT!!! You have won {$winRate} coin(s)";
    } else if ($winRate === $betSize * $COMBO_WIN_RATES['flash']) {
        return "FLASH!!! You have won {$winRate} coin(s)";
    } else if ($winRate === $betSize * $COMBO_WIN_RATES['full_house']) {
        return "Full house!!! You have won {$winRate} coin(s)";
    } else if ($winRate === $betSize * $COMBO_WIN_RATES['kare']) {
        return "Four of kinds!!! You have won {$winRate} coin(s)";
    } else if($winRate === 0){
        return "You haven't won";
    }
}
