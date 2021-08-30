<?php

if (!function_exists('generateShortLink')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function generateShortLink($code): string
    {
        return config('app.url') . '/' . $code;
    }
}
