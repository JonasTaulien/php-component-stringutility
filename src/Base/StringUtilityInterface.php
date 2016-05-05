<?php
namespace JonasRudolph\PHPComponents\StringUtility\Base;


interface StringUtilityInterface
{

    /**
     * Returns true if the string contains the needle and otherwise false.
     *
     * @param string $string
     * @param string $needle
     *
     * @return bool
     */
    public function contains($string, $needle);



    /**
     * Returns true if the string starts with the prefix and otherwise false.
     *
     * @param string $string
     * @param string $prefix
     *
     * @return bool
     */
    public function startsWith($string, $prefix);



    /**
     * Returns true if the string ends with the suffix and otherwise false.
     * @param string $string
     * @param string $suffix
     *
     * @return bool
     */
    public function endsWith($string, $suffix);



    /**
     * If the string starts with the prefix, this function removes the string without the prefix.
     * For example:
     * removePrefix('http://www.my-domain.com', 'http://') <=> 'www.my-domain.com'
     *
     * If the string does not start with the prefix, this function will return the string.
     *
     * @param string $string
     * @param string $prefix
     *
     * @return string
     */
    public function removePrefix($string, $prefix);



    /**
     * Returns the substring after the first occurrence of the needle
     * For example:
     * removeUntilEndOfNeedle('www.my-domain.com/index.php', '.com/') <=> 'index.php'
     *
     * If the needle is not found, this function will return the string.
     *
     * @param string $string
     * @param string $needle
     *
     * @return string
     */
    public function substringAfter($string, $needle);



    /**
     * Returns the substring before the first occurrence of the needle
     * For example:
     * removeNeedleAndRest('www.my-domain.com/user?id=1&token=xyz', '?') <=> 'http://www.mydomain.com/user'
     *
     * If the needle is not found, this function will return the string.
     *
     * @param string $string
     * @param string $needle
     *
     * @return string
     */
    public function substringBefore($string, $needle);

    /**
     * Returns array with two strings. The first is the string before the first occurrence of the delimiter,
     * the second the string which starts at the first character after the first occurrence of the delimiter.
     * For example:
     * splitAt('user@my-domain.com:secret', ':') <=> array('user@my-domain.com', 'secret')
     * or
     * splitAt('this and that', ' and ') <=> array('this', 'that')
     *
     * If the delimiter is not contained in the string, this function will return an array with the given string as first
     * and an empty string as the second element.
     *
     * @param string $string
     * @param string $delimiter
     *
     * @return string[]
     */
    public function split($string, $delimiter);
}