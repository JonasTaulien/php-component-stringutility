<?php
namespace JonasRudolph\PHPComponents\StringUtility\Base;


interface StringUtilityInterface
{

    /**
     * Returns true if the string contains the needle and otherwise false.<br>
     * Every string contains the empty string: contains('any string', '') <=> true
     *
     * @param string $string
     * @param string $needle
     *
     * @return bool
     */
    public function contains($string, $needle);



    /**
     * Returns true if the string starts with the prefix and otherwise false.<br>
     * Every string starts with the empty string: startsWith('any string', '') <=> true
     *
     * @param string $string
     * @param string $prefix
     *
     * @return bool
     */
    public function startsWith($string, $prefix);



    /**
     * Returns true if the string ends with the suffix and otherwise false.<br>
     * Every string ends with the empty string: endsWith('any string', '') === true
     *
     * @param string $string
     * @param string $suffix
     *
     * @return bool
     */
    public function endsWith($string, $suffix);



    /**
     * If the string starts with the prefix, this function returns the string without the prefix.<br>
     * For example:<br>
     * removePrefix('http://www.my-domain.com', 'http://') === 'www.my-domain.com'<br>
     * removePrefix('any string', '') === 'any string'<br>
     * <br>
     * If the string does not start with the prefix, this function will return the string.
     *
     * @param string $string
     * @param string $prefix
     *
     * @return string
     */
    public function removePrefix($string, $prefix);



    /**
     * If the string ends with the suffix, this function returns the string without the suffix.<br>
     * For example:<br>
     * removeSuffix('my-domain.com', '.com') === 'my-domain'<br>
     * removeSuffix('any string', '') === 'any string'<br>
     * <br>
     * If the string does not end with the suffix, this function will return the string.
     *
     * @param string $string
     * @param string $suffix
     * @return string
     */
    public function removeSuffix($string, $suffix);



    /**
     * Returns the string without any whitspace characters.<br>
     *
     * Removed characters:
     * - " " (ASCII 32 (0x20)), an ordinary space.
     * - "\t" (ASCII 9 (0x09)), a tab.
     * - "\n" (ASCII 10 (0x0A)), a line feed.
     * - "\r" (ASCII 13 (0x0D)), a carriage return.
     * - "\0" (ASCII 0 (0x00)), a NUL-Byte.
     * - "\x0B" (ASCII 11 (0x0B)), a vertical tab.
     *
     * @param string $string
     * @return string
     */
    public function removeWhitespace($string);



    /**
     * Returns the substring after the first occurrence of the needle<br>
     * For example:<br>
     * substringAfter('www.my-domain.com/index.php', '.com/') === 'index.php'<br>
     * substringAfter('any string', '') === 'any string'<br>
     * <br>
     * If the needle is not found, this function will return the string.<br>
     *
     * @param string $string
     * @param string $needle
     *
     * @return string
     */
    public function substringAfter($string, $needle);



    /**
     * Returns the substring before the first occurrence of the needle<br>
     * For example:<br>
     * substringBefore('www.my-domain.com/user?id=1', '?') === 'http://www.mydomain.com/user' <br>
     * substringBefore('any string', '') === ''<br>
     * <br>
     * If the needle is not found, this function will return the string.<br>
     *
     * @param string $string
     * @param string $needle
     *
     * @return string
     */
    public function substringBefore($string, $needle);



    /**
     * Returns array with two strings. The first is the string before the first occurrence of the delimiter,
     * the second the string which starts at the first character after the first occurrence of the delimiter.<br>
     * For example:<br>
     * split('user@my-domain.com:secret', ':') === array('user@my-domain.com', 'secret')<br>
     * split('this and that', ' and ') === array('this', 'that')<br>
     * split('any string', '') === array('', 'any string')<br>
     * <br>
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