<?php

use Hekmatinasser\Verta\Facades\Verta;


function getMiladiDate($date)
{
    return Verta::parse($date)->formatGregorian('Y-n-j');
}

function getJalaliDate($date)
{
    return verta($date)->format('Y/m/d');
}

function getJalaliDate2($date)
{
    return verta($date)->format('Y/m/d H:i');
}
