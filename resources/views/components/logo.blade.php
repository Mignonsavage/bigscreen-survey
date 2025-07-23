<?php
?>
@props(['theme' => 'light'])

@php
    $gradients = [
        'light' => [
            'top' => 'stop-color:#8a8a8a;',
            'topEnd' => 'stop-color:#6a6a6a;',
            'side' => 'stop-color:#4a4a4a;',
            'sideEnd' => 'stop-color:#3a3a3a;',
            'front' => 'stop-color:#7a7a7a;',
            'frontEnd' => 'stop-color:#5a5a5a;',
        ],
        'dark' => [
            'top' => 'stop-color:#cccccc;',
            'topEnd' => 'stop-color:#aaaaaa;',
            'side' => 'stop-color:#888888;',
            'sideEnd' => 'stop-color:#666666;',
            'front' => 'stop-color:#bbbbbb;',
            'frontEnd' => 'stop-color:#999999;',
        ]
    ];
    $currentGradient = $gradients[$theme];
@endphp

<svg {{ $attributes->merge(['viewBox' => '0 0 800 200', 'xmlns' => 'http://www.w3.org/2000/svg']) }}>
    <defs>
        <linearGradient id="topGradient" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" style="{{ $currentGradient['top'] }}stop-opacity:1" /><stop offset="100%" style="{{ $currentGradient['topEnd'] }}stop-opacity:1" /></linearGradient>
        <linearGradient id="sideGradient" x1="0%" y1="0%" x2="100%" y2="0%"><stop offset="0%" style="{{ $currentGradient['side'] }}stop-opacity:1" /><stop offset="100%" style="{{ $currentGradient['sideEnd'] }}stop-opacity:1" /></linearGradient>
        <linearGradient id="frontGradient" x1="0%" y1="0%" x2="0%" y2="100%"><stop offset="0%" style="{{ $currentGradient['front'] }}stop-opacity:1" /><stop offset="100%" style="{{ $currentGradient['frontEnd'] }}stop-opacity:1" /></linearGradient>
    </defs>
    <g id="letter-b"><rect x="20" y="40" width="15" height="120" fill="url(#frontGradient)"/><rect x="35" y="40" width="40" height="15" fill="url(#frontGradient)"/><rect x="35" y="90" width="40" height="15" fill="url(#frontGradient)"/><rect x="35" y="145" width="40" height="15" fill="url(#frontGradient)"/><rect x="75" y="55" width="15" height="20" fill="url(#frontGradient)"/><rect x="75" y="105" width="15" height="25" fill="url(#frontGradient)"/><polygon points="20,40 25,35 50,35 35,40" fill="url(#topGradient)"/><polygon points="35,40 50,35 90,35 75,40" fill="url(#topGradient)"/><polygon points="35,90 50,85 90,85 75,90" fill="url(#topGradient)"/><polygon points="35,145 50,140 90,140 75,145" fill="url(#topGradient)"/><polygon points="35,40 50,35 50,50 35,55" fill="url(#sideGradient)"/><polygon points="75,55 90,50 90,70 75,75" fill="url(#sideGradient)"/><polygon points="75,105 90,100 90,125 75,130" fill="url(#sideGradient)"/></g>
    <g id="letter-i"><rect x="110" y="40" width="15" height="120" fill="url(#frontGradient)"/><polygon points="110,40 115,35 130,35 125,40" fill="url(#topGradient)"/><polygon points="125,40 130,35 130,155 125,160" fill="url(#sideGradient)"/></g>
    <g id="letter-g"><rect x="145" y="40" width="15" height="120" fill="url(#frontGradient)"/><rect x="160" y="40" width="40" height="15" fill="url(#frontGradient)"/><rect x="160" y="145" width="40" height="15" fill="url(#frontGradient)"/><rect x="160" y="90" width="25" height="15" fill="url(#frontGradient)"/><rect x="185" y="105" width="15" height="40" fill="url(#frontGradient)"/><polygon points="145,40 150,35 200,35 200,40" fill="url(#topGradient)"/><polygon points="160,90 165,85 185,85 185,90" fill="url(#topGradient)"/><polygon points="160,145 165,140 200,140 200,145" fill="url(#topGradient)"/></g>
    <g id="letter-s"><rect x="220" y="40" width="40" height="15" fill="url(#frontGradient)"/><rect x="220" y="55" width="15" height="20" fill="url(#frontGradient)"/><rect x="220" y="90" width="40" height="15" fill="url(#frontGradient)"/><rect x="245" y="105" width="15" height="25" fill="url(#frontGradient)"/><rect x="220" y="145" width="40" height="15" fill="url(#frontGradient)"/><polygon points="220,40 225,35 260,35 260,40" fill="url(#topGradient)"/><polygon points="220,90 225,85 260,85 260,90" fill="url(#topGradient)"/><polygon points="220,145 225,140 260,140 260,145" fill="url(#topGradient)"/></g>
    <g id="letter-c"><rect x="280" y="40" width="15" height="120" fill="url(#frontGradient)"/><rect x="295" y="40" width="40" height="15" fill="url(#frontGradient)"/><rect x="295" y="145" width="40" height="15" fill="url(#frontGradient)"/><polygon points="280,40 285,35 335,35 335,40" fill="url(#topGradient)"/><polygon points="295,145 300,140 335,140 335,145" fill="url(#topGradient)"/></g>
    <g id="letter-r"><rect x="355" y="40" width="15" height="120" fill="url(#frontGradient)"/><rect x="370" y="40" width="40" height="15" fill="url(#frontGradient)"/><rect x="370" y="90" width="40" height="15" fill="url(#frontGradient)"/><rect x="410" y="55" width="15" height="20" fill="url(#frontGradient)"/><rect x="385" y="105" width="15" height="15" fill="url(#frontGradient)"/><rect x="400" y="120" width="15" height="15" fill="url(#frontGradient)"/><rect x="415" y="135" width="15" height="25" fill="url(#frontGradient)"/><polygon points="355,40 360,35 410,35 410,40" fill="url(#topGradient)"/><polygon points="370,90 375,85 410,85 410,90" fill="url(#topGradient)"/></g>
    <g id="letter-e1"><rect x="450" y="40" width="15" height="120" fill="url(#frontGradient)"/><rect x="465" y="40" width="40" height="15" fill="url(#frontGradient)"/><rect x="465" y="90" width="30" height="15" fill="url(#frontGradient)"/><rect x="465" y="145" width="40" height="15" fill="url(#frontGradient)"/><polygon points="450,40 455,35 505,35 505,40" fill="url(#topGradient)"/><polygon points="465,90 470,85 495,85 495,90" fill="url(#topGradient)"/><polygon points="465,145 470,140 505,140 505,145" fill="url(#topGradient)"/></g>
    <g id="letter-e2"><rect x="525" y="40" width="15" height="120" fill="url(#frontGradient)"/><rect x="540" y="40" width="40" height="15" fill="url(#frontGradient)"/><rect x="540" y="90" width="30" height="15" fill="url(#frontGradient)"/><rect x="540" y="145" width="40" height="15" fill="url(#frontGradient)"/><polygon points="525,40 530,35 580,35 580,40" fill="url(#topGradient)"/><polygon points="540,90 545,85 570,85 570,90" fill="url(#topGradient)"/><polygon points="540,145 545,140 580,140 580,145" fill="url(#topGradient)"/></g>
    <g id="letter-n"><rect x="600" y="40" width="15" height="120" fill="url(#frontGradient)"/><rect x="615" y="55" width="15" height="15" fill="url(#frontGradient)"/><rect x="630" y="70" width="15" height="15" fill="url(#frontGradient)"/><rect x="645" y="85" width="15" height="15" fill="url(#frontGradient)"/><rect x="660" y="100" width="15" height="15" fill="url(#frontGradient)"/><rect x="675" y="40" width="15" height="120" fill="url(#frontGradient)"/><polygon points="600,40 605,35 620,35 615,40" fill="url(#topGradient)"/><polygon points="675,40 680,35 695,35 690,40" fill="url(#topGradient)"/></g>
</svg>
