<?php
// include '../COMBO_WIN_RATES.php';

function calculateWinRate($betSize, $combo, $COMBO_WIN_RATES)
{
    $betSize = (int) $betSize;

    if ($betSize === 0) {
        return false;
    } else if ($combo === "onePair") {
        return $betSize * $COMBO_WIN_RATES['onePair'];
    } else if ($combo === "twoPair") {
        return $betSize * $COMBO_WIN_RATES['twoPair'];
    } else if ($combo === "set") {
        return $betSize * $COMBO_WIN_RATES['set'];
    } else if ($combo === "straight") {
        return $betSize * $COMBO_WIN_RATES['straight'];
    } else if ($combo === "flash") {
        return $betSize * $COMBO_WIN_RATES['flash'];
    } else if ($combo === "full_house") {
        return $betSize * $COMBO_WIN_RATES['full_house'];
    } else if ($combo === "kare") {
        return $betSize * $COMBO_WIN_RATES['kare'];
    }  else if ($combo === "royalFlash") {
        return $betSize * $COMBO_WIN_RATES['royalFlash'];
    }else {
        return $betSize - $betSize;
    }
}
