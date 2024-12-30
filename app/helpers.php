<?php

if (!function_exists('assets')) {
    function assets($file_name)
    {
        return asset($file_name) . '?v=' . filemtime(public_path($file_name));
    }
}
