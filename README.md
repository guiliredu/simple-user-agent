## Simple User Agent - PHP

A simple class to parse data from a user agent.

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use SimpleUserAgent\UserAgent;

$agent = new UserAgent();

```

You can set a user agent in the first parameter of the constructor. If the parameter is empty, it will try to parse data from `$_SERVER['HTTP_USER_AGENT']`

```php
$agent = new UserAgent('Mozilla/5.0 ...');
```

You can set a user agent after instantiation, calling this method:

```php
$agent->setAgent('Mozilla/5.0 ...');
```

To get the data, you can call these available methods

```php
$this->getAgent() // Full user agent string
$this->getDevice() // iPhone
$this->getOS() // iOS
$this->getBrowser() // Apple Safari
$this->getPrefix() // Safari
$this->getVersion() // 11.0
$this->getEngine() // WebKit
$this->isBot() // true / false
$this->getInfo() // Array with all the above info
```

---

This project is under development - For test purposes only

---

References:

- https://deviceatlas.com/blog/list-of-user-agent-strings
- https://developers.whatismybrowser.com/useragents/explore/
