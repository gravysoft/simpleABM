<?php

function iecho(&$param, $optionalString= '', $condition = true){
    if ($condition)
        if (isset($param))
            if (strlen($optionalString)>0)
                echo $optionalString;
            else echo $param;

}

function ireturn(&$param, $optionalString= '', $condition = true){
    if ($condition)
        if (isset($param))
            if (strlen($optionalString)>0)
                return $optionalString;
            else return $param;
     
    return false;
}
?>
