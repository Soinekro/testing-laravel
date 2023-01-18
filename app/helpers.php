<?php
function igv($price)
{
    return round(($price * 0.18), 2);
}
function total_price($price)
{
    return round(($price + igv($price)), 2);
}

function get_igv_to_total_price($price)
{
    return round($price * 100/118,2);
}

function mail_validation($email)
{
    return (bool)filter_var($email, FILTER_VALIDATE_EMAIL);
}
