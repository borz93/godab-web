<?php

return [

    'default'   => [
        'length'    => 5,
        'width'     => 125,
        'height'    => 36,
        'quality'   => 95,
    ],

    'flat'   => [
        'length'    => 6,
        'width'     => 160,
        'height'    => 46,
        'quality'   => 95,
        'lines'     => 6,
        'bgImage'   => false,
        'bgColor'   => '#303F9F',
        'fontColors'=> ['#F44336', '#2196F3', '#009688', '#4CAF50', '#CDDC39', '#FF9800', '#9E9E9E', '#FFFFFF'],
        'contrast'  => -5,
    ],

    'mini'   => [
        'length'    => 3,
        'width'     => 60,
        'height'    => 32,
    ],

    'inverse'   => [
        'length'    => 5,
        'width'     => 120,
        'height'    => 36,
        'quality'   => 90,
        'sensitive' => true,
        'angle'     => 12,
        'sharpen'   => 10,
        'blur'      => 2,
        'invert'    => true,
        'contrast'  => -5,
    ]

];
