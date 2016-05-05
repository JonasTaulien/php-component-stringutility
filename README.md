# php-component-stringutility
* Well tested functions on strings:

```
$stringUtility->contains('mySecr3t', 'cr3') === true

$stringUtility->startsWith('https://my-domain.com', 'https') === true

$stringUtility->endsWith('www.my-domain.com/img/logo.svg', '.svg') === true;

$stringUtility->removePrefix('http://www.my-domain.com', 'http://') === 'www.my-domain.com'

$stringUtility->substringAfter('www.my-domain.com/index.php', '.com/') === 'index.php'

$stringUtility->substringBefore('www.my-domain.com/user?id=1&token=xyz', '?') === 'www.my-domain.com/user'

$stringUtility->splitAt('user@my-domain.com:secret', ':') === ['user@my-domain.com', 'secret']
```

## TODO:
- Tag component with `git tag 0.1.0`
- Implement Unit-Tests
