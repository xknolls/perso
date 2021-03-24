<?php 

function getColorClass(float $percent) : string
{
    if ($percent < 50 && $percent > 15) {
        $sClass = 'bg-warning';
    } elseif ($percent <= 15 && $percent > 1) {
        $sClass = 'bg-danger';
    } elseif ($percent < 1) {
        $sClass = 'bg-dark';
    } else {
        $sClass = 'bg-success';
    }
    return $sClass;
}