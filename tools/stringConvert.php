<?php
namespace tools;

class stringConvert  
{
    
    public static function toCamel(String $string) : string{
        $result = "";
        
        $result = str_replace("-", "_", $string);
        $result = ucwords($result, "_");
        $result = str_replace("_", "", $result);

        return $result;
    }
}
