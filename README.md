# php-component-stringutility
* Well tested functions on strings:

```php 
use JonasRudolph\PHPComponents\StringUtility\Base\StringUtilityInterface;
use JonasRudolph\PHPComponents\StringUtility\Implementation\StringUtility;

/** @var StringUtilityInterface */
$stringUtility = new StringUtility();

$stringUtility->contains('mySecr3t', 'cr3') === true

$stringUtility->startsWith('https://my-domain.com', 'https') === true

$stringUtility->endsWith('www.my-domain.com/img/logo.svg', '.svg') === true;

$stringUtility->removePrefix('http://www.my-domain.com', 'http://') === 'www.my-domain.com'

$stringUtility->removeSuffix('my-domain.com', '.com') === 'my-domain'

$stringUtility->removeWhitespace("Any String\tWith\nWhitespace\r.\0") === 'AnyStringWithWitespace.'

$stringUtility->substringAfter('www.my-domain.com/index.php', '.com/') === 'index.php'

$stringUtility->substringBefore('www.my-domain.com/user?id=1&token=xyz', '?') === 'www.my-domain.com/user'

$stringUtility->substringBetween('there is no foo without a bar', 'no ', ' without') === 'foo'

$stringUtility->split('user@my-domain.com:secret', ':') === ['user@my-domain.com', 'secret']
```

## Consistent rules used in all functions
* When a function searches for a needle anywhere in a string and the string contains the needle more than once - then, the function will use the first occurence of the needle in the string for further computations  
  That means:
  
    ```php  
    $stringUtility->substringAfter('abefbg', 'b') === 'efbg'
    $stringUtility->substringBefore('abefbg', 'b') === 'a'
    $stringUtility->split('user@my-domain.com:secret', ':') === ['user@my-domain.com', 'secret']
    ``` 
  
  One exception is the substringBetween function which will search for the first $untilBefore-string *after* the occurence of the first $startAfter-string  
  
    ```php  
    $stringUtility->substringBetween('abefbg', 'b', 'b') === 'ef'
    $stringUtility->substringBetween('abefbg', 'e', 'b') === 'f'
    $stringUtility->substringBetween('abcdefg', 'c', 'b') === 'defg'
    ```
  
* Every character of a a string is surrounded by the empty string ('') infinitly times  
  That means:  
  
    ```php
    $stringUtility->contains($myString, '') === true
    $stringUtility->startsWith($myString, '') === true
    $stringUtility->endsWith($myString, '') === true;
    $stringUtility->substringAfter($myString, '') === $myString
    $stringUtility->substringBefore($myString, '') === ''
    $stringUtility->substringBetween('abcd', '', 'b') === 'a'
    $stringUtility->substringBetween($myString, $x, '') === ''
    $stringUtility->split($myString, '') === ['', $myString]
    ```

## Contributors
* [Jonas Rudolph](https://github.com/JonasRudolph)
* [Stev Leibelt](https://github.com/stevleibelt)
