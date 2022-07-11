<?php

if(!function_exists('appDirection')) {
    function appDirection() {
        return app()->getLocale() == 'ar' ? '-rtl' : '';
    }
}
