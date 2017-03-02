<?php
namespace JonasRudolph\PHPComponents\StringUtility\Implementation;

use JonasRudolph\PHPComponents\StringUtility\Base\StringUtilityInterface;


class StringUtility implements StringUtilityInterface
{
    /**
     * @inheritdoc
     */
    public function contains($string, $needle)
    {
        return ($needle === '') || (strpos($string, $needle) !== false);
    }



    /**
     * @inheritdoc
     */
    public function startsWith($string, $prefix)
    {
        return ($prefix === '') || (substr($string, 0, strlen($prefix)) === $prefix);
    }



    /**
     * @inheritdoc
     */
    public function endsWith($string, $suffix)
    {
        return ($suffix === '') || (substr($string, (strlen($string) - strlen($suffix))) === $suffix);
    }



    /**
     * @inheritdoc
     */
    public function removePrefix($string, $prefix)
    {
        if ($string === $prefix) {
            $remainingString = '';

        } else if ($this->startsWith($string, $prefix)) {
            $remainingString = substr($string, strlen($prefix));

        } else {
            $remainingString = $string;
        }

        return $remainingString;
    }



    /**
     * @inheritdoc
     */
    public function removeSuffix($string, $suffix)
    {
        if ($string === $suffix) {
            $remainingString = '';

        } else if ($this->endsWith($string, $suffix)) {
            $remainingString = substr($string, 0, (strlen($string) - strlen($suffix)));

        } else {
            $remainingString = $string;
        }

        return $remainingString;
    }



    /**
     * @inheritdoc
     */
    public function removeWhitespace($string)
    {
        return str_replace([' ', "\t", "\n", "\r", "\0", "\x0B"], '', $string);
    }



    /**
     * @inheritdoc
     */
    public function substringAfter($string, $needle)
    {
        if (($needle === '') || (false === ($strposResult = strpos($string, $needle)))) {
            $remainingString = $string;
        } else {
            $indexOfFirstCharacterOfRemainingString = $strposResult + strlen($needle);
            $stringLength = strlen($string);
            if ($indexOfFirstCharacterOfRemainingString === $stringLength) {
                $remainingString = '';
            } else {
                $remainingString = substr($string, $indexOfFirstCharacterOfRemainingString);
            }
        }

        return $remainingString;
    }



    /**
     * @inheritdoc
     */
    public function substringBefore($string, $needle)
    {
        $strposResult = ($needle === '') ? 0 : strpos($string, $needle);

        return (false === $strposResult) || ($string === '')
            ? $string
            : substr($string, 0, $strposResult);
    }



    /**
     * @inheritdoc
     */
    public function substringBetween($string, $startAfter, $untilBefore)
    {
        return $this->substringBefore(
            $this->substringAfter(
                $string,
                $startAfter
            ),
            $untilBefore
        );
    }



    /**
     * @inheritdoc
     */
    public function split($string, $delimiter)
    {
        $first = $this->substringBefore($string, $delimiter);
        $rest = $this->removePrefix($string, $first);
        $second = $this->substringAfter($rest, $delimiter);

        return [$first, $second];
    }
}