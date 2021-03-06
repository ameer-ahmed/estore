<?php

if(!function_exists('appDirection')) {
    function appDirection() {
        return app()->getLocale() == 'ar' ? '-rtl' : '';
    }
}

if(!function_exists('requestMethodIs')) {
    function requestMethodIs (string $method) : bool {
        return request()->method() == strtoupper($method);
    }
}
