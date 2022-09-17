<?php

function pre($vars, $status = false)
{
    echo "<pre>";
    print_r($vars);
    if (!$status) {
        die;
    }
}

function currentStatusValue($status = "0"){
    $statusColor = STATUS;

    return $statusColor[$status];
}