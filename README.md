# Emoji Calculator

## Installation

You can install the package via composer:

```bash
composer require ahmad/calmoji
```

## Usage

``` php
php artisan calmoji
```

## Examples

``` php
php artisan calmoji

 Expression (write exit/quit to quit):
 > 4️2️+🎱+25✖️2

💯

 Expression (write exit/quit to quit):
 > 4️2

4️2️

 Expression (write exit/quit to quit):
 > 100✖💯

💯0️0️

 Expression (write exit/quit to quit):
 > 8️✖🎱

6️4️

 Expression (write exit/quit to quit):
 > 🔟x🔟

💯

 Expression (write exit/quit to quit):
 > 1 plus 1

2️

 Expression (write exit/quit to quit):
 > 1%0


 [ERROR] 🤷‍ Division by zero


 Expression (write exit/quit to quit):
 > 1 + 1

2️

 Expression (write exit/quit to quit):
 > 1 2 + 2


 [ERROR] 🤷‍ Number can not have a space in it.


 Expression (write exit/quit to quit):
 > + 12


 [ERROR] 🤷‍ Missing operands. + 12


 Expression (write exit/quit to quit):
 > 2 + 2 +


 [ERROR] 🤷‍ Missing operands. 2 + 2 +


 Expression (write exit/quit to quit):
 > exit
```