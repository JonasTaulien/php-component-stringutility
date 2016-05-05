<?php
namespace JonasRudolph\PHPComponents\StringUtility\Implementation;

use JonasRudolph\PHPComponents\StringUtility\Base\StringUtilityInterface;


class StringUtility implements StringUtilityInterface
{
    public function contains($string, $needle)
    {
        return ($needle === '') || (strpos($string, $needle) !== false);
    }



    public function startsWith($string, $prefix)
    {
        return substr($string, 0, strlen($prefix)) === $prefix;
    }



    public function endsWith($string, $suffix)
    {
        return substr($string, (strlen($string) - strlen($suffix))) === $suffix;
    }



    public function removePrefix($string, $prefix)
    {
        return $this->startsWith($string, $prefix) ? substr($string, strlen($prefix)) : $string;
    }



    public function substringAfter($string, $needle)
    {
        //If needle empty or not found: Return string
        //Else return characters after needle
        return (($needle === '') || (false === ($strposResult = strpos($string, $needle))))
            ? $string
            : substr($string, ($strposResult + strlen($needle)));
    }



    public function substringBefore($string, $needle)
    {
        $strposResult = ($needle === '') ? 0 : strpos($string, $needle);

        return (false === $strposResult)
            ? $string
            : substr($string, 0, $strposResult);
    }



    public function split($string, $delimiter)
    {
        $strposResult = ($delimiter === '') ? 0 : strpos($string, $delimiter);

        return (false === $strposResult)
            ? [$string, '']
            : [substr($string, 0,  $strposResult), substr($string, $strposResult + strlen($delimiter))];
    }

}