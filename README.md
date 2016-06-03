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

$stringUtility->splitAt('user@my-domain.com:secret', ':') === ['user@my-domain.com', 'secret']
```
