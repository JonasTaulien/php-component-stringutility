<?php
namespace JonasRudolph\PHPComponents\StringUtility\Tests\Base;

use JonasRudolph\PHPComponents\StringUtility\Base\StringUtilityInterface;
use PHPUnit_Framework_TestCase;


/**
 * Created:
 * Date: 04.05.16
 * Time: 22:11
 */
abstract class StringUtilityInterfaceTest extends PHPUnit_Framework_TestCase
{
    /** @var StringUtilityInterface */
    private $stringUtility;



    protected function setUp()
    {
        $this->stringUtility = $this->createNewStringUtilityInstance();
    }



    /**
     * @return StringUtilityInterface
     */
    protected abstract function createNewStringUtilityInstance();



    /**
     * @param string $string
     * @param string $needle
     * @param bool $wantedResult
     *
     * @dataProvider containsDataProvider
     */
    public function testContains($string, $needle, $wantedResult)
    {
        $result = $this->stringUtility->contains($string, $needle);
        $this->assertEquals($wantedResult, $result);
    }



    /**
     * @param string $string
     * @param string $prefix
     * @param bool $wantedResult
     *
     * @dataProvider startsWithDataProvider
     */
    public function testStartsWith($string, $prefix, $wantedResult)
    {
        $result = $this->stringUtility->startsWith($string, $prefix);
        $this->assertEquals($wantedResult, $result);
    }



    /**
     * @param string $string
     * @param string $suffix
     * @param bool $wantedResult
     *
     * @dataProvider endsWithDataProvider
     */
    public function testEndsWith($string, $suffix, $wantedResult)
    {
        $result = $this->stringUtility->endsWith($string, $suffix);
        $this->assertEquals($wantedResult, $result);
    }



    /**
     * @param string $string
     * @param string $prefix
     * @param string $wantedResult
     *
     * @dataProvider removePrefixDataProvider
     */
    public function testRemovePrefix($string, $prefix, $wantedResult)
    {
        $result = $this->stringUtility->removePrefix($string, $prefix);
        $this->assertEquals($wantedResult, $result);
    }



    /**
     * @param string $string
     * @param string $needle
     * @param string $wantedResult
     *
     * @dataProvider substringAfterDataProvider
     */
    public function testSubstringAfter($string, $needle, $wantedResult)
    {
        $result = $this->stringUtility->substringAfter($string, $needle);
        $this->assertEquals($wantedResult, $result);
    }



    /**
     * @param string $string
     * @param string $needle
     * @param string $wantedResult
     *
     * @dataProvider substringBeforeDataProvider
     */
    public function testSubstringBefore($string, $needle, $wantedResult)
    {
        $result = $this->stringUtility->substringBefore($string, $needle);
        $this->assertEquals($wantedResult, $result);
    }



    /**
     * @param string $string
     * @param string $delimiter
     * @param string[] $wantedResult
     *
     * @dataProvider splitAtDataProvider
     */
    public function testSplitAt($string, $delimiter, $wantedResult)
    {
        $result = $this->stringUtility->split($string, $delimiter);
        $this->assertEquals($wantedResult, $result);
    }



    public function containsDataProvider()
    {
        return [
            ['mySecr3t', 'cr3', true],
            ['http://www.my-domain.com', 'http://www.my-domain.com', true],
            ['', '', true],
            ['a', '', true],
            ['http://www.my-domain.com', 'http', true],
            ['123456789', '5', true],
            ['123456789', '89', true],

            ['http://www.my-domain.com', 'HTTP', false],
            ['', 'a', false],
            ['mySecr3t', 'mySecr3t1', false],
        ];
    }



    public function startsWithDataProvider()
    {
        return [
            ['http://www.my-domain.com', 'http://www.my-domain.com', true],
            ['', '', true],
            ['a', '', true],
            ['http://www.my-domain.com', 'http://', true],
            ['123456789', '12', true],

            ['http://www.my-domain.com', 'http://www.my-domain.com/index.php', false],
            ['http://www.my-domain.com', 'HTTP://', false],
            ['http://www.my-domain.com', '.com', false],
            ['http://www.my-domain.com', 'tt', false],
            ['123456789', '5', false],
        ];
    }



    public function endsWithDataProvider()
    {
        return [
            ['http://www.my-domain.com', 'http://www.my-domain.com', true],
            ['', '', true],
            ['a', '', true],
            ['http://www.my-domain.com', '.com', true],
            ['123456789', '89', true],

            ['http://www.my-domain.com', 'xhttp://www.my-domain.com', false],
            ['http://www.my-domain.com', '.COM', false],
            ['http://www.my-domain.com', 'http', false],
            ['http://www.my-domain.com', 'comm', false],
            ['123456789', '5', false],
        ];
    }



    public function removePrefixDataProvider()
    {
        return [
            ['http://www.my-domain.com', 'http://', 'www.my-domain.com'],
            ['123456789', '123456789', ''],
            ['123456', '', '123456'],
            ['asd-asd', 'a', 'sd-asd'],

            ['123456789', '1234567890', '123456789'],
            ['http://www.my-domain.com', 'http://ww.', 'http://www.my-domain.com'],
            ['asd-asd', 'sd-', 'asd-asd']
        ];
    }



    public function substringAfterDataProvider()
    {
        return [
            ['www.my-domain.com/index.php', '.com/', 'index.php'],
            ['www.my-domain.com/index.php', '', 'www.my-domain.com/index.php'],
            ['www.my-domain.com/index.php', 'w', 'ww.my-domain.com/index.php'],
            ['www.my-domain.com/index.php', 'www.my-domain.com/index.php', ''],
            ['www.my-domain.com/index.php', '.php', ''],
            ['www.my-domain.com/index.php', '.', 'my-domain.com/index.php'],
            ['12345', '23', '45'],

            ['http://www.my-domain.com', 'HTTP', 'http://www.my-domain.com'],
            ['', 'a', ''],
            ['mySecr3t', 'mySecr3t1', 'mySecr3t'],
        ];
    }



    public function substringBeforeDataProvider()
    {
        return [
            ['www.my-domain.com/user?id=1&token=xyz', '?', 'www.my-domain.com/user'],
            ['www.my-domain.com', '.', 'www'],
            ['12345', '34', '12'],
            ['abcdefg', 'abcdefg', ''],
            ['abcdefg', '', ''],

            ['abcdefg', 'aabcdefg', 'abcdefg'],
            ['abcdefg', 'efgh', 'abcdefg'],
            ['http://my-domain.com', 'HTTP://', 'http://my-domain.com']
        ];
    }


    public function splitAtDataProvider(){
        return [
            ['user@my-domain.com:secret', ':', ['user@my-domain.com', 'secret']],
            ['user@my-domain.com', '@', ['user', 'my-domain.com']],
            ['this and that', ' and ', ['this', 'that']],
            ['this and that and thus', ' and ', ['this', 'that and thus']],
            ['', '', ['', '']],
            ['abc', '', ['', 'abc']],
            ['this and that', 'this and that', ['', '']],
            ['this and that', 'that', ['this and ', '']],

            ['user(at)my-domain.com', '@', ['user(at)my-domain.com', '']],
            ['abc', 'abcd', ['abc', '']],
            ['bcd', 'abcd', ['bcd', '']]
        ];
    }

}