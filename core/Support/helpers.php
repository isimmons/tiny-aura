<?php

if( ! function_exists('arrayToObject'))
{
    function arrayToObject($array)
    {
        if(is_array($array))
            return (object) array_map(__FUNCTION__, $array);

        return $array;
    }
}