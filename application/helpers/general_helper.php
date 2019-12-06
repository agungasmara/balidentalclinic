<?php
use Carbon\Carbon;

/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (! function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (! function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

if (! function_exists('currency_format')) {
    function currency_format($val, $cur = 'Rp.') {
        return $cur . ' ' . number_format($val, 0, ',', '.');
    }
}

if (! function_exists('date_format_conversion')) {
    function date_format_conversion($date, $oldFormat, $newFormat) {
        if (is_null($date) || empty($date))
            return NULL;
        
        $date = Carbon::createFromFormat($oldFormat, $date);
        return $date->format($newFormat);
    }
}

if (! function_exists('bytesFormat')) {
    function bytesFormat($bytes, $precision = 2)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1024, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow]; 
    }
}