<?php
function CalculoMedia(float $primeira,float $segunda):float{
    $media = ($primeira + $segunda) / 2;
    return $media;
};

function formatarNota(float $nota):string{
    $notaFormada = number_format($nota,2,",",".");
    return $notaFormada;
};