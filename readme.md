# WordPress Eloquent
[![Build Status](https://travis-ci.org/madeITBelgium/WordPress-Eloquent.svg?branch=master)](https://travis-ci.org/madeITBelgium/WordPress-Eloquent)
[![Coverage Status](https://coveralls.io/repos/github/madeITBelgium/WordPress-Eloquent/badge.svg?branch=master)](https://coveralls.io/github/madeITBelgium/WordPress-Eloquent?branch=master)
[![Latest Stable Version](https://poser.pugx.org/madeITBelgium/WordPress-Eloquent/v/stable.svg)](https://packagist.org/packages/madeITBelgium/WordPress-Eloquent)
[![Latest Unstable Version](https://poser.pugx.org/madeITBelgium/WordPress-Eloquent/v/unstable.svg)](https://packagist.org/packages/madeITBelgium/WordPress-Eloquent)
[![Total Downloads](https://poser.pugx.org/madeITBelgium/WordPress-Eloquent/d/total.svg)](https://packagist.org/packages/madeITBelgium/WordPress-Eloquent)
[![License](https://poser.pugx.org/madeITBelgium/WordPress-Eloquent/license.svg)](https://packagist.org/packages/madeITBelgium/WordPress-Eloquent)

This laravel packages add all the models to use a WordPress database in your Laravel application.

# Installation

```
composer require madeitbelgium/wordpress-eloquent
```

Or require this package in your `composer.json` and update composer.

```php
"madeitbelgium/wordpress-eloquent": "^1.0"
```

# Documentation
## Installation

Change your user model, and extend it to MadeITBelgium\WPEloquent\Model\User.
```php
<?php

namespace App;

...
use MadeITBelgium\WPEloquent\Model\User as WPUser;
...

class User extends WPUser
{
  ...
}
```

### Custom post type
```php
<?php

namespace App;

use MadeITBelgium\WPEloquent\Model\Post;

class CustomPostType extends Post
{
    protected $post_type = 'custom_post_type';

}
```

The complete documentation can be found at: [http://www.madeit.be/](http://www.madeit.be/)

# Support

Support github or mail: tjebbe.lievens@madeit.be

# Contributing

Please try to follow the psr-2 coding style guide. http://www.php-fig.org/psr/psr-2/
# License

This package is licensed under LGPL. You are free to use it in personal and commercial projects. The code can be forked and modified, but the original copyright author should always be included!
