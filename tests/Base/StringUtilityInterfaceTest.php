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
        $this->assertSame($wantedResult, $result);
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
        $this->assertSame($wantedResult, $result);
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
        $this->assertSame($wantedResult, $result);
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
        $this->assertSame($wantedResult, $result);
    }



    /**
     * @param string $string
     * @param string $startAfter
     * @param string $untilBefore
     * @param string $expectedResult
     *
     * @dataProvider substringDataProvider
     */
    public function testSubstringBetween($string, $startAfter, $untilBefore, $expectedResult)
    {
        $result = $this->stringUtility->substringBetween($string, $startAfter, $untilBefore);
        $this->assertSame($expectedResult, $result);
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
        $this->assertSame($wantedResult, $result);
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
        $this->assertSame($wantedResult, $result);
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
        $this->assertSame($wantedResult, $result);
    }



    /**
     * @param string $string
     * @param string $suffix
     * @param string $wantedResult
     *
     * @dataProvider removeSuffixDataProvider
     */
    public function testRemoveSuffix($string, $suffix, $wantedResult)
    {
        $result = $this->stringUtility->removeSuffix($string, $suffix);
        $this->assertSame($wantedResult, $result);
    }



    /**
     * @param string $string
     * @param string $wantedResult
     *
     * @dataProvider removeWhitespaceDataProvider
     */
    public function testRemoveWhitespace($string, $wantedResult)
    {
        $result = $this->stringUtility->removeWhitespace($string);
        $this->assertSame($wantedResult, $result);
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
            ['', '', ''],

            ['123456789', '1234567890', '123456789'],
            ['http://www.my-domain.com', 'http://ww.', 'http://www.my-domain.com'],
            ['asd-asd', 'sd-', 'asd-asd']
        ];
    }



    public function removeSuffixDataProvider()
    {
        return [
            ['my-domain.com', '.com', 'my-domain'],
            ['123456789', '123456789', ''],
            ['123456', '', '123456'],
            ['dasd-asd', 'd', 'dasd-as'],
            ['', '', ''],

            ['123456789', '1234567890', '123456789'],
            ['http://www.my-domain.com', '://www.my-domain.com', 'http'],
            ['asd-asd', '-asd', 'asd']
        ];
    }



    public function substringDataProvider()
    {
        return [
            'only unique words' => [
                'string'            => 'a line with only unique words',
                'startAfter'        => 'with',
                'untilBefore'       => 'unique',
                'expectedResult'    => ' only '
            ],
            'duplicated words' => [
                'string'            => 'a line with some duplicated words like line some or words',
                'startAfter'        => 'some',
                'untilBefore'       => 'words',
                'expectedResult'    => ' duplicated '
            ],
            'no after' => [
                'string'            => 'no after available here',
                'startAfter'        => 'some',
                'untilBefore'       => 'here',
                'expectedResult'    => 'no after available '
            ],
            'no before' => [
                'string'            => 'no before available here',
                'startAfter'        => 'before',
                'untilBefore'       => 'some',
                'expectedResult'    => ' available here'
            ],
            'no after and no before' => [
                'string'            => 'no before and after available here',
                'startAfter'        => 'some',
                'untilBefore'       => 'word',
                'expectedResult'    => 'no before and after available here'
            ],
            'after is empty' => [
                'string'            => 'no before and after available here',
                'startAfter'        => '',
                'untilBefore'       => 'available',
                'expectedResult'    => 'no before and after '
            ],
            'before is empty' => [
                'string'            => 'no before and after available here',
                'startAfter'        => 'before',
                'untilBefore'       => '',
                'expectedResult'    => ''
            ],
            'before and after are empty' => [
                'string'            => 'no before and after available here',
                'startAfter'        => '',
                'untilBefore'       => '',
                'expectedResult'    => ''
            ],
            'before is before after' => [
                'string'            => 'no before and after available here',
                'startAfter'        => 'after',
                'untilBefore'       => 'before',
                'expectedResult'    => ' available here'
            ],
            'the string contains only startAfter and untilBefore' => [
                'string'            => 'startAfteruntilBefore',
                'startAfter'        => 'startAfter',
                'untilBefore'       => 'untilBefore',
                'expectedResult'    => ''
            ],
            'all empty' => [
                'string'            => '',
                'startAfter'        => '',
                'untilBefore'       => '',
                'expectedResult'    => ''
            ]
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
            ['', '', ''],

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
            ['abcdefg', 'efg', 'abcd'],
            ['', '', ''],

            ['abcdefg', 'aabcdefg', 'abcdefg'],
            ['abcdefg', 'efgh', 'abcdefg'],
            ['http://my-domain.com', 'HTTP://', 'http://my-domain.com']
        ];
    }



    public function splitAtDataProvider()
    {
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



    public function removeWhitespaceDataProvider()
    {
        return [
            ['This Is My Story', 'ThisIsMyStory'],
            ["\tA String.\nWith\rLinebreak \0 and\tOther whitespace\t", 'AString.WithLinebreakandOtherwhitespace'],
            [' ', ''],
            ["\n", ''],
            ["\t", ''],
            ["\r", ''],
            ["\0", ''],
            ["\x0B", ''],
            [' 12345 ', '12345'],
            ['abcdefg', 'abcdefg']
        ];
    }

}