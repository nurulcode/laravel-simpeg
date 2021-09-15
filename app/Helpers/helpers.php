<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

function activeMenu($uri = '') {
    $active = '';
    if (Request::segment(1) === $uri) {
        $active = 'mm-show';
    }
    return $active;
}
