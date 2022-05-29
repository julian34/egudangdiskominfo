{
    "packages": [
        {
            "name": "codeigniter/coding-standard",
            "version": "v1.2.0",
            "version_normalized": "1.2.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/CodeIgniter/coding-standard.git",
                "reference": "f79b0009c9fb894e8725eccdde136671eb516c2c"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/CodeIgniter/coding-standard/zipball/f79b0009c9fb894e8725eccdde136671eb516c2c",
                "reference": "f79b0009c9fb894e8725eccdde136671eb516c2c",
                "shasum": ""
            },
            "require": {
                "ext-tokenizer": "*",
                "friendsofphp/php-cs-fixer": "^3.2",
                "nexusphp/cs-config": "^3.3",
                "php": "^7.3 || ^8.0"
            },
            "require-dev": {
                "nexusphp/tachycardia": "^1.3",
                "phpstan/phpstan": "^0.12.94",
                "phpunit/phpunit": "^9.5"
            },
            "time": "2021-10-18T14:26:57+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "CodeIgniter\\CodingStandard\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "John Paul E. Balandan, CPA",
                    "email": "paulbalandan@gmail.com"
                }
            ],
            "description": "Official Coding Standards for CodeIgniter based on PHP CS Fixer",
            "support": {
                "forum": "http://forum.codeigniter.com/",
                "issues": "https://github.com/CodeIgniter/coding-standard/issues",
                "slack": "https://codeigniterchat.slack.com",
                "source": "https://github.com/CodeIgniter/coding-standard"
            },
            "install-path": "../codeigniter/coding-standard"
        },
        {
            "name": "composer/pcre",
            "version": "1.0.1",
            "version_normalized": "1.0.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/composer/pcre.git",
                "reference": "67a32d7d6f9f560b726ab25a061b38ff3a80c560"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/composer/pcre/zipball/67a32d7d6f9f560b726ab25a061b38ff3a80c560",
                "reference": "67a32d7d6f9f560b726ab25a061b38ff3a80c560",
                "shasum": ""
            },
            "require": {
                "php": "^5.3.2 || ^7.0 || ^8.0"
            },
            "require-dev": {
                "phpstan/phpstan": "^1.3",
                "phpstan/phpstan-strict-rules": "^1.1",
                "symfony/phpunit-bridge": "^4.2 || ^5"
            },
            "time": "2022-01-21T20:24:37+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Composer\\Pcre\\": "src"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Jordi Boggiano",
                    "email": "j.boggiano@seld.be",
                    "homepage": "http://seld.be"
                }
            ],
            "description": "PCRE wrapping library that offers type-safe preg_* replacements.",
            "keywords": [
                "PCRE",
                "preg",
                "regex",
                "regular expression"
            ],
            "support": {
                "issues": "https://github.com/composer/pcre/issues",
                "source": "https://github.com/composer/pcre/tree/1.0.1"
            },
            "funding": [
                {
                    "url": "https://packagist.com",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/composer",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/composer/composer",
                    "type": "tidelift"
                }
            ],
            "install-path": "./pcre"
        },
        {
            "name": "composer/semver",
            "version": "3.3.2",
            "version_normalized": "3.3.2.0",
            "source": {
                "type": "git",
                "url": "https://github.com/composer/semver.git",
                "reference": "3953f23262f2bff1919fc82183ad9acb13ff62c9"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/composer/semver/zipball/3953f23262f2bff1919fc82183ad9acb13ff62c9",
                "reference": "3953f23262f2bff1919fc82183ad9acb13ff62c9",
                "shasum": ""
            },
            "require": {
                "php": "^5.3.2 || ^7.0 || ^8.0"
            },
            "require-dev": {
                "phpstan/phpstan": "^1.4",
                "symfony/phpunit-bridge": "^4.2 || ^5"
            },
            "time": "2022-04-01T19:23:25+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "3.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Composer\\Semver\\": "src"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nils Adermann",
                    "email": "naderman@naderman.de",
                    "homepage": "http://www.naderman.de"
                },
                {
                    "name": "Jordi Boggiano",
                    "email": "j.boggiano@seld.be",
                    "homepage": "http://seld.be"
                },
                {
                    "name": "Rob Bast",
                    "email": "rob.bast@gmail.com",
                    "homepage": "http://robbast.nl"
                }
            ],
            "description": "Semver library that offers utilities, version constraint parsing and validation.",
            "keywords": [
                "semantic",
                "semver",
                "validation",
                "versioning"
            ],
            "support": {
                "irc": "irc://irc.freenode.org/composer",
                "issues": "https://github.com/composer/semver/issues",
                "source": "https://github.com/composer/semver/tree/3.3.2"
            },
            "funding": [
                {
                    "url": "https://packagist.com",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/composer",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/composer/composer",
                    "type": "tidelift"
                }
            ],
            "install-path": "./semver"
        },
        {
            "name": "composer/xdebug-handler",
            "version": "2.0.5",
            "version_normalized": "2.0.5.0",
            "source": {
                "type": "git",
                "url": "https://github.com/composer/xdebug-handler.git",
                "reference": "9e36aeed4616366d2b690bdce11f71e9178c579a"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/composer/xdebug-handler/zipball/9e36aeed4616366d2b690bdce11f71e9178c579a",
                "reference": "9e36aeed4616366d2b690bdce11f71e9178c579a",
                "shasum": ""
            },
            "require": {
                "composer/pcre": "^1",
                "php": "^5.3.2 || ^7.0 || ^8.0",
                "psr/log": "^1 || ^2 || ^3"
            },
            "require-dev": {
                "phpstan/phpstan": "^1.0",
                "phpstan/phpstan-strict-rules": "^1.1",
                "symfony/phpunit-bridge": "^4.2 || ^5.0 || ^6.0"
            },
            "time": "2022-02-24T20:20:32+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Composer\\XdebugHandler\\": "src"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "John Stevenson",
                    "email": "john-stevenson@blueyonder.co.uk"
                }
            ],
            "description": "Restarts a process without Xdebug.",
            "keywords": [
                "Xdebug",
                "performance"
            ],
            "support": {
                "irc": "irc://irc.freenode.org/composer",
                "issues": "https://github.com/composer/xdebug-handler/issues",
                "source": "https://github.com/composer/xdebug-handler/tree/2.0.5"
            },
            "funding": [
                {
                    "url": "https://packagist.com",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/composer",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/composer/composer",
                    "type": "tidelift"
                }
            ],
            "install-path": "./xdebug-handler"
        },
        {
            "name": "doctrine/annotations",
            "version": "1.13.2",
            "version_normalized": "1.13.2.0",
            "source": {
                "type": "git",
                "url": "https://github.com/doctrine/annotations.git",
                "reference": "5b668aef16090008790395c02c893b1ba13f7e08"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/doctrine/annotations/zipball/5b668aef16090008790395c02c893b1ba13f7e08",
                "reference": "5b668aef16090008790395c02c893b1ba13f7e08",
                "shasum": ""
            },
            "require": {
                "doctrine/lexer": "1.*",
                "ext-tokenizer": "*",
                "php": "^7.1 || ^8.0",
                "psr/cache": "^1 || ^2 || ^3"
            },
            "require-dev": {
                "doctrine/cache": "^1.11 || ^2.0",
                "doctrine/coding-standard": "^6.0 || ^8.1",
                "phpstan/phpstan": "^0.12.20",
                "phpunit/phpunit": "^7.5 || ^8.0 || ^9.1.5",
                "symfony/cache": "^4.4 || ^5.2"
            },
            "time": "2021-08-05T19:00:23+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Doctrine\\Common\\Annotations\\": "lib/Doctrine/Common/Annotations"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Guilherme Blanco",
                    "email": "guilhermeblanco@gmail.com"
                },
                {
                    "name": "Roman Borschel",
                    "email": "roman@code-factory.org"
                },
                {
                    "name": "Benjamin Eberlei",
                    "email": "kontakt@beberlei.de"
                },
                {
                    "name": "Jonathan Wage",
                    "email": "jonwage@gmail.com"
                },
                {
                    "name": "Johannes Schmitt",
                    "email": "schmittjoh@gmail.com"
                }
            ],
            "description": "Docblock Annotations Parser",
            "homepage": "https://www.doctrine-project.org/projects/annotations.html",
            "keywords": [
                "annotations",
                "docblock",
                "parser"
            ],
            "support": {
                "issues": "https://github.com/doctrine/annotations/issues",
                "source": "https://github.com/doctrine/annotations/tree/1.13.2"
            },
            "install-path": "../doctrine/annotations"
        },
        {
            "name": "doctrine/instantiator",
            "version": "1.4.1",
            "version_normalized": "1.4.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/doctrine/instantiator.git",
                "reference": "10dcfce151b967d20fde1b34ae6640712c3891bc"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/doctrine/instantiator/zipball/10dcfce151b967d20fde1b34ae6640712c3891bc",
                "reference": "10dcfce151b967d20fde1b34ae6640712c3891bc",
                "shasum": ""
            },
            "require": {
                "php": "^7.1 || ^8.0"
            },
            "require-dev": {
                "doctrine/coding-standard": "^9",
                "ext-pdo": "*",
                "ext-phar": "*",
                "phpbench/phpbench": "^0.16 || ^1",
                "phpstan/phpstan": "^1.4",
                "phpstan/phpstan-phpunit": "^1",
                "phpunit/phpunit": "^7.5 || ^8.5 || ^9.5",
                "vimeo/psalm": "^4.22"
            },
            "time": "2022-03-03T08:28:38+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Doctrine\\Instantiator\\": "src/Doctrine/Instantiator/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Marco Pivetta",
                    "email": "ocramius@gmail.com",
                    "homepage": "https://ocramius.github.io/"
                }
            ],
            "description": "A small, lightweight utility to instantiate objects in PHP without invoking their constructors",
            "homepage": "https://www.doctrine-project.org/projects/instantiator.html",
            "keywords": [
                "constructor",
                "instantiate"
            ],
            "support": {
                "issues": "https://github.com/doctrine/instantiator/issues",
                "source": "https://github.com/doctrine/instantiator/tree/1.4.1"
            },
            "funding": [
                {
                    "url": "https://www.doctrine-project.org/sponsorship.html",
                    "type": "custom"
                },
                {
                    "url": "https://www.patreon.com/phpdoctrine",
                    "type": "patreon"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/doctrine%2Finstantiator",
                    "type": "tidelift"
                }
            ],
            "install-path": "../doctrine/instantiator"
        },
        {
            "name": "doctrine/lexer",
            "version": "1.2.3",
            "version_normalized": "1.2.3.0",
            "source": {
                "type": "git",
                "url": "https://github.com/doctrine/lexer.git",
                "reference": "c268e882d4dbdd85e36e4ad69e02dc284f89d229"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/doctrine/lexer/zipball/c268e882d4dbdd85e36e4ad69e02dc284f89d229",
                "reference": "c268e882d4dbdd85e36e4ad69e02dc284f89d229",
                "shasum": ""
            },
            "require": {
                "php": "^7.1 || ^8.0"
            },
            "require-dev": {
                "doctrine/coding-standard": "^9.0",
                "phpstan/phpstan": "^1.3",
                "phpunit/phpunit": "^7.5 || ^8.5 || ^9.5",
                "vimeo/psalm": "^4.11"
            },
            "time": "2022-02-28T11:07:21+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Doctrine\\Common\\Lexer\\": "lib/Doctrine/Common/Lexer"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Guilherme Blanco",
                    "email": "guilhermeblanco@gmail.com"
                },
                {
                    "name": "Roman Borschel",
                    "email": "roman@code-factory.org"
                },
                {
                    "name": "Johannes Schmitt",
                    "email": "schmittjoh@gmail.com"
                }
            ],
            "description": "PHP Doctrine Lexer parser library that can be used in Top-Down, Recursive Descent Parsers.",
            "homepage": "https://www.doctrine-project.org/projects/lexer.html",
            "keywords": [
                "annotations",
                "docblock",
                "lexer",
                "parser",
                "php"
            ],
            "support": {
                "issues": "https://github.com/doctrine/lexer/issues",
                "source": "https://github.com/doctrine/lexer/tree/1.2.3"
            },
            "funding": [
                {
                    "url": "https://www.doctrine-project.org/sponsorship.html",
                    "type": "custom"
                },
                {
                    "url": "https://www.patreon.com/phpdoctrine",
                    "type": "patreon"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/doctrine%2Flexer",
                    "type": "tidelift"
                }
            ],
            "install-path": "../doctrine/lexer"
        },
        {
            "name": "dompdf/dompdf",
            "version": "v1.2.2",
            "version_normalized": "1.2.2.0",
            "source": {
                "type": "git",
                "url": "https://github.com/dompdf/dompdf.git",
                "reference": "5031045d9640b38cfc14aac9667470df09c9e090"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/dompdf/dompdf/zipball/5031045d9640b38cfc14aac9667470df09c9e090",
                "reference": "5031045d9640b38cfc14aac9667470df09c9e090",
                "shasum": ""
            },
            "require": {
                "ext-dom": "*",
                "ext-mbstring": "*",
                "phenx/php-font-lib": "^0.5.4",
                "phenx/php-svg-lib": "^0.3.3 || ^0.4.0",
                "php": "^7.1 || ^8.0"
            },
            "require-dev": {
                "ext-json": "*",
                "ext-zip": "*",
                "mockery/mockery": "^1.3",
                "phpunit/phpunit": "^7.5 || ^8 || ^9",
                "squizlabs/php_codesniffer": "^3.5"
            },
            "suggest": {
                "ext-gd": "Needed to process images",
                "ext-gmagick": "Improves image processing performance",
                "ext-imagick": "Improves image processing performance",
                "ext-zlib": "Needed for pdf stream compression"
            },
            "time": "2022-04-27T13:50:54+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Dompdf\\": "src/"
                },
                "classmap": [
                    "lib/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "LGPL-2.1"
            ],
            "authors": [
                {
                    "name": "Fabien Ménager",
                    "email": "fabien.menager@gmail.com"
                },
                {
                    "name": "Brian Sweeney",
                    "email": "eclecticgeek@gmail.com"
                },
                {
                    "name": "Gabriel Bull",
                    "email": "me@gabrielbull.com"
                }
            ],
            "description": "DOMPDF is a CSS 2.1 compliant HTML to PDF converter",
            "homepage": "https://github.com/dompdf/dompdf",
            "support": {
                "issues": "https://github.com/dompdf/dompdf/issues",
                "source": "https://github.com/dompdf/dompdf/tree/v1.2.2"
            },
            "install-path": "../dompdf/dompdf"
        },
        {
            "name": "fakerphp/faker",
            "version": "v1.19.0",
            "version_normalized": "1.19.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/FakerPHP/Faker.git",
                "reference": "d7f08a622b3346766325488aa32ddc93ccdecc75"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/FakerPHP/Faker/zipball/d7f08a622b3346766325488aa32ddc93ccdecc75",
                "reference": "d7f08a622b3346766325488aa32ddc93ccdecc75",
                "shasum": ""
            },
            "require": {
                "php": "^7.1 || ^8.0",
                "psr/container": "^1.0 || ^2.0",
                "symfony/deprecation-contracts": "^2.2 || ^3.0"
            },
            "conflict": {
                "fzaninotto/faker": "*"
            },
            "require-dev": {
                "bamarni/composer-bin-plugin": "^1.4.1",
                "doctrine/persistence": "^1.3 || ^2.0",
                "ext-intl": "*",
                "symfony/phpunit-bridge": "^4.4 || ^5.2"
            },
            "suggest": {
                "doctrine/orm": "Required to use Faker\\ORM\\Doctrine",
                "ext-curl": "Required by Faker\\Provider\\Image to download images.",
                "ext-dom": "Required by Faker\\Provider\\HtmlLorem for generating random HTML.",
                "ext-iconv": "Required by Faker\\Provider\\ru_RU\\Text::realText() for generating real Russian text.",
                "ext-mbstring": "Required for multibyte Unicode string functionality."
            },
            "time": "2022-02-02T17:38:57+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "v1.19-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Faker\\": "src/Faker/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "François Zaninotto"
                }
            ],
            "description": "Faker is a PHP library that generates fake data for you.",
            "keywords": [
                "data",
                "faker",
                "fixtures"
            ],
            "support": {
                "issues": "https://github.com/FakerPHP/Faker/issues",
                "source": "https://github.com/FakerPHP/Faker/tree/v1.19.0"
            },
            "install-path": "../fakerphp/faker"
        },
        {
            "name": "friendsofphp/php-cs-fixer",
            "version": "v3.2.1",
            "version_normalized": "3.2.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/FriendsOfPHP/PHP-CS-Fixer.git",
                "reference": "13ae36a76b6e329e44ca3cafaa784ea02db9ff14"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/FriendsOfPHP/PHP-CS-Fixer/zipball/13ae36a76b6e329e44ca3cafaa784ea02db9ff14",
                "reference": "13ae36a76b6e329e44ca3cafaa784ea02db9ff14",
                "shasum": ""
            },
            "require": {
                "composer/semver": "^3.2",
                "composer/xdebug-handler": "^2.0",
                "doctrine/annotations": "^1.12",
                "ext-json": "*",
                "ext-tokenizer": "*",
                "php": "^7.2 || ^8.0",
                "php-cs-fixer/diff": "^2.0",
                "symfony/console": "^4.4.20 || ^5.1.3",
                "symfony/event-dispatcher": "^4.4.20 || ^5.0",
                "symfony/filesystem": "^4.4.20 || ^5.0",
                "symfony/finder": "^4.4.20 || ^5.0",
                "symfony/options-resolver": "^4.4.20 || ^5.0",
                "symfony/polyfill-php72": "^1.23",
                "symfony/polyfill-php80": "^1.23",
                "symfony/polyfill-php81": "^1.23",
                "symfony/process": "^4.4.20 || ^5.0",
                "symfony/stopwatch": "^4.4.20 || ^5.0"
            },
            "require-dev": {
                "justinrainbow/json-schema": "^5.2",
                "keradus/cli-executor": "^1.5",
                "mikey179/vfsstream": "^1.6.8",
                "php-coveralls/php-coveralls": "^2.4.3",
                "php-cs-fixer/accessible-object": "^1.1",
                "php-cs-fixer/phpunit-constraint-isidenticalstring": "^1.2",
                "php-cs-fixer/phpunit-constraint-xmlmatchesxsd": "^1.2.1",
                "phpspec/prophecy": "^1.10.3",
                "phpspec/prophecy-phpunit": "^1.1 || ^2.0",
                "phpunit/phpunit": "^7.5.20 || ^8.5.14 || ^9.5",
                "phpunitgoodpractices/polyfill": "^1.5",
                "phpunitgoodpractices/traits": "^1.9.1",
                "symfony/phpunit-bridge": "^5.2.4",
                "symfony/yaml": "^4.4.20 || ^5.0"
            },
            "suggest": {
                "ext-dom": "For handling output formats in XML",
                "ext-mbstring": "For handling non-UTF8 characters.",
                "symfony/polyfill-mbstring": "When enabling `ext-mbstring` is not possible."
            },
            "time": "2021-10-05T08:12:17+00:00",
            "bin": [
                "php-cs-fixer"
            ],
            "type": "application",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "PhpCsFixer\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Dariusz Rumiński",
                    "email": "dariusz.ruminski@gmail.com"
                }
            ],
            "description": "A tool to automatically fix PHP code style",
            "support": {
                "issues": "https://github.com/FriendsOfPHP/PHP-CS-Fixer/issues",
                "source": "https://github.com/FriendsOfPHP/PHP-CS-Fixer/tree/v3.2.1"
            },
            "funding": [
                {
                    "url": "https://github.com/keradus",
                    "type": "github"
                }
            ],
            "install-path": "../friendsofphp/php-cs-fixer"
        },
        {
            "name": "kint-php/kint",
            "version": "4.1.2",
            "version_normalized": "4.1.2.0",
            "source": {
                "type": "git",
                "url": "https://github.com/kint-php/kint.git",
                "reference": "fa53c4333cda79dc9cb002cfa029abe994d0ae00"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/kint-php/kint/zipball/fa53c4333cda79dc9cb002cfa029abe994d0ae00",
                "reference": "fa53c4333cda79dc9cb002cfa029abe994d0ae00",
                "shasum": ""
            },
            "require": {
                "php": ">=5.6"
            },
            "require-dev": {
                "friendsofphp/php-cs-fixer": "^3.0",
                "phpspec/prophecy-phpunit": "^2",
                "phpunit/phpunit": "^9.0",
                "seld/phar-utils": "^1.0",
                "symfony/finder": "^3.0 || ^4.0 || ^5.0",
                "vimeo/psalm": "^4.0"
            },
            "suggest": {
                "kint-php/kint-helpers": "Provides extra helper functions",
                "kint-php/kint-twig": "Provides d() and s() functions in twig templates"
            },
            "time": "2022-02-22T20:32:24+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "init.php"
                ],
                "psr-4": {
                    "Kint\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Jonathan Vollebregt",
                    "homepage": "https://github.com/jnvsor"
                },
                {
                    "name": "Contributors",
                    "homepage": "https://github.com/kint-php/kint/graphs/contributors"
                }
            ],
            "description": "Kint - debugging tool for PHP developers",
            "homepage": "https://kint-php.github.io/kint/",
            "keywords": [
                "debug",
                "kint",
                "php"
            ],
            "support": {
                "issues": "https://github.com/kint-php/kint/issues",
                "source": "https://github.com/kint-php/kint/tree/4.1.2"
            },
            "install-path": "../kint-php/kint"
        },
        {
            "name": "laminas/laminas-escaper",
            "version": "2.10.0",
            "version_normalized": "2.10.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/laminas/laminas-escaper.git",
                "reference": "58af67282db37d24e584a837a94ee55b9c7552be"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/laminas/laminas-escaper/zipball/58af67282db37d24e584a837a94ee55b9c7552be",
                "reference": "58af67282db37d24e584a837a94ee55b9c7552be",
                "shasum": ""
            },
            "require": {
                "ext-ctype": "*",
                "ext-mbstring": "*",
                "php": "^7.4 || ~8.0.0 || ~8.1.0"
            },
            "conflict": {
                "zendframework/zend-escaper": "*"
            },
            "require-dev": {
                "infection/infection": "^0.26.6",
                "laminas/laminas-coding-standard": "~2.3.0",
                "maglnet/composer-require-checker": "^3.8.0",
                "phpunit/phpunit": "^9.5.18",
                "psalm/plugin-phpunit": "^0.16.1",
                "vimeo/psalm": "^4.22.0"
            },
            "time": "2022-03-08T20:15:36+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Laminas\\Escaper\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "description": "Securely and safely escape HTML, HTML attributes, JavaScript, CSS, and URLs",
            "homepage": "https://laminas.dev",
            "keywords": [
                "escaper",
                "laminas"
            ],
            "support": {
                "chat": "https://laminas.dev/chat",
                "docs": "https://docs.laminas.dev/laminas-escaper/",
                "forum": "https://discourse.laminas.dev",
                "issues": "https://github.com/laminas/laminas-escaper/issues",
                "rss": "https://github.com/laminas/laminas-escaper/releases.atom",
                "source": "https://github.com/laminas/laminas-escaper"
            },
            "funding": [
                {
                    "url": "https://funding.communitybridge.org/projects/laminas-project",
                    "type": "community_bridge"
                }
            ],
            "install-path": "../laminas/laminas-escaper"
        },
        {
            "name": "mikey179/vfsstream",
            "version": "v1.6.10",
            "version_normalized": "1.6.10.0",
            "source": {
                "type": "git",
                "url": "https://github.com/bovigo/vfsStream.git",
                "reference": "250c0825537d501e327df879fb3d4cd751933b85"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/bovigo/vfsStream/zipball/250c0825537d501e327df879fb3d4cd751933b85",
                "reference": "250c0825537d501e327df879fb3d4cd751933b85",
                "shasum": ""
            },
            "require": {
                "php": ">=5.3.0"
            },
            "require-dev": {
                "phpunit/phpunit": "^4.5|^5.0"
            },
            "time": "2021-09-25T08:05:01+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.6.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-0": {
                    "org\\bovigo\\vfs\\": "src/main/php"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Frank Kleine",
                    "homepage": "http://frankkleine.de/",
                    "role": "Developer"
                }
            ],
            "description": "Virtual file system to mock the real file system in unit tests.",
            "homepage": "http://vfs.bovigo.org/",
            "support": {
                "issues": "https://github.com/bovigo/vfsStream/issues",
                "source": "https://github.com/bovigo/vfsStream/tree/master",
                "wiki": "https://github.com/bovigo/vfsStream/wiki"
            },
            "install-path": "../mikey179/vfsstream"
        },
        {
            "name": "myclabs/deep-copy",
            "version": "1.11.0",
            "version_normalized": "1.11.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/myclabs/DeepCopy.git",
                "reference": "14daed4296fae74d9e3201d2c4925d1acb7aa614"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/myclabs/DeepCopy/zipball/14daed4296fae74d9e3201d2c4925d1acb7aa614",
                "reference": "14daed4296fae74d9e3201d2c4925d1acb7aa614",
                "shasum": ""
            },
            "require": {
                "php": "^7.1 || ^8.0"
            },
            "conflict": {
                "doctrine/collections": "<1.6.8",
                "doctrine/common": "<2.13.3 || >=3,<3.2.2"
            },
            "require-dev": {
                "doctrine/collections": "^1.6.8",
                "doctrine/common": "^2.13.3 || ^3.2.2",
                "phpunit/phpunit": "^7.5.20 || ^8.5.23 || ^9.5.13"
            },
            "time": "2022-03-03T13:19:32+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "src/DeepCopy/deep_copy.php"
                ],
                "psr-4": {
                    "DeepCopy\\": "src/DeepCopy/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "description": "Create deep copies (clones) of your objects",
            "keywords": [
                "clone",
                "copy",
                "duplicate",
                "object",
                "object graph"
            ],
            "support": {
                "issues": "https://github.com/myclabs/DeepCopy/issues",
                "source": "https://github.com/myclabs/DeepCopy/tree/1.11.0"
            },
            "funding": [
                {
                    "url": "https://tidelift.com/funding/github/packagist/myclabs/deep-copy",
                    "type": "tidelift"
                }
            ],
            "install-path": "../myclabs/deep-copy"
        },
        {
            "name": "nexusphp/cs-config",
            "version": "v3.3.4",
            "version_normalized": "3.3.4.0",
            "source": {
                "type": "git",
                "url": "https://github.com/NexusPHP/cs-config.git",
                "reference": "aef4a9670c1c910fe6bd987118b76a63bbc69070"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/NexusPHP/cs-config/zipball/aef4a9670c1c910fe6bd987118b76a63bbc69070",
                "reference": "aef4a9670c1c910fe6bd987118b76a63bbc69070",
                "shasum": ""
            },
            "require": {
                "ext-tokenizer": "*",
                "friendsofphp/php-cs-fixer": "^3.1",
                "php": "^7.3 || ^8.0"
            },
            "conflict": {
                "liaison/cs-config": "*"
            },
            "require-dev": {
                "nexusphp/tachycardia": "^1.3",
                "phpstan/phpstan": "^1.0",
                "phpunit/phpunit": "^9.5"
            },
            "time": "2021-11-02T13:14:51+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-develop": "3.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Nexus\\CsConfig\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "John Paul E. Balandan, CPA",
                    "email": "paulbalandan@gmail.com"
                }
            ],
            "description": "A factory for custom rulesets for PHP CS Fixer.",
            "support": {
                "issues": "https://github.com/NexusPHP/cs-config/issues",
                "slack": "https://nexusphp.slack.com",
                "source": "https://github.com/NexusPHP/cs-config.git"
            },
            "funding": [
                {
                    "url": "https://www.paypal.me/paulbalandan",
                    "type": "custom"
                }
            ],
            "install-path": "../nexusphp/cs-config"
        },
        {
            "name": "nexusphp/tachycardia",
            "version": "v1.3.5",
            "version_normalized": "1.3.5.0",
            "source": {
                "type": "git",
                "url": "https://github.com/NexusPHP/tachycardia.git",
                "reference": "b0852c17224e43c34e4ba5d88e57f95cddf5c206"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/NexusPHP/tachycardia/zipball/b0852c17224e43c34e4ba5d88e57f95cddf5c206",
                "reference": "b0852c17224e43c34e4ba5d88e57f95cddf5c206",
                "shasum": ""
            },
            "require": {
                "php": "^7.3 || ^8.0",
                "phpunit/php-timer": "^5.0",
                "phpunit/phpunit": "^9.5"
            },
            "require-dev": {
                "friendsofphp/php-cs-fixer": "^3.0",
                "nexusphp/cs-config": "^3.2",
                "phpstan/phpstan": "^1.0"
            },
            "time": "2021-11-02T13:24:48+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-1.x": "1.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Nexus\\PHPUnit\\Extension\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "John Paul E. Balandan, CPA",
                    "email": "paulbalandan@gmail.com"
                }
            ],
            "description": "Detects slow running tests in your PHPUnit-driven test suites.",
            "support": {
                "issues": "https://github.com/NexusPHP/tachycardia/issues",
                "slack": "https://nexusphp.slack.com",
                "source": "https://github.com/NexusPHP/tachycardia.git"
            },
            "funding": [
                {
                    "url": "https://www.paypal.me/paulbalandan",
                    "type": "custom"
                }
            ],
            "install-path": "../nexusphp/tachycardia"
        },
        {
            "name": "nikic/php-parser",
            "version": "v4.13.2",
            "version_normalized": "4.13.2.0",
            "source": {
                "type": "git",
                "url": "https://github.com/nikic/PHP-Parser.git",
                "reference": "210577fe3cf7badcc5814d99455df46564f3c077"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/nikic/PHP-Parser/zipball/210577fe3cf7badcc5814d99455df46564f3c077",
                "reference": "210577fe3cf7badcc5814d99455df46564f3c077",
                "shasum": ""
            },
            "require": {
                "ext-tokenizer": "*",
                "php": ">=7.0"
            },
            "require-dev": {
                "ircmaxell/php-yacc": "^0.0.7",
                "phpunit/phpunit": "^6.5 || ^7.0 || ^8.0 || ^9.0"
            },
            "time": "2021-11-30T19:35:32+00:00",
            "bin": [
                "bin/php-parse"
            ],
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.9-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "PhpParser\\": "lib/PhpParser"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Nikita Popov"
                }
            ],
            "description": "A PHP parser written in PHP",
            "keywords": [
                "parser",
                "php"
            ],
            "support": {
                "issues": "https://github.com/nikic/PHP-Parser/issues",
                "source": "https://github.com/nikic/PHP-Parser/tree/v4.13.2"
            },
            "install-path": "../nikic/php-parser"
        },
        {
            "name": "phar-io/manifest",
            "version": "2.0.3",
            "version_normalized": "2.0.3.0",
            "source": {
                "type": "git",
                "url": "https://github.com/phar-io/manifest.git",
                "reference": "97803eca37d319dfa7826cc2437fc020857acb53"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/phar-io/manifest/zipball/97803eca37d319dfa7826cc2437fc020857acb53",
                "reference": "97803eca37d319dfa7826cc2437fc020857acb53",
                "shasum": ""
            },
            "require": {
                "ext-dom": "*",
                "ext-phar": "*",
                "ext-xmlwriter": "*",
                "phar-io/version": "^3.0.1",
                "php": "^7.2 || ^8.0"
            },
            "time": "2021-07-20T11:28:43+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.0.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Arne Blankerts",
                    "email": "arne@blankerts.de",
                    "role": "Developer"
                },
                {
                    "name": "Sebastian Heuer",
                    "email": "sebastian@phpeople.de",
                    "role": "Developer"
                },
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "Developer"
                }
            ],
            "description": "Component for reading phar.io manifest information from a PHP Archive (PHAR)",
            "support": {
                "issues": "https://github.com/phar-io/manifest/issues",
                "source": "https://github.com/phar-io/manifest/tree/2.0.3"
            },
            "install-path": "../phar-io/manifest"
        },
        {
            "name": "phar-io/version",
            "version": "3.2.1",
            "version_normalized": "3.2.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/phar-io/version.git",
                "reference": "4f7fd7836c6f332bb2933569e566a0d6c4cbed74"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/phar-io/version/zipball/4f7fd7836c6f332bb2933569e566a0d6c4cbed74",
                "reference": "4f7fd7836c6f332bb2933569e566a0d6c4cbed74",
                "shasum": ""
            },
            "require": {
                "php": "^7.2 || ^8.0"
            },
            "time": "2022-02-21T01:04:05+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Arne Blankerts",
                    "email": "arne@blankerts.de",
                    "role": "Developer"
                },
                {
                    "name": "Sebastian Heuer",
                    "email": "sebastian@phpeople.de",
                    "role": "Developer"
                },
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "Developer"
                }
            ],
            "description": "Library for handling version information and constraints",
            "support": {
                "issues": "https://github.com/phar-io/version/issues",
                "source": "https://github.com/phar-io/version/tree/3.2.1"
            },
            "install-path": "../phar-io/version"
        },
        {
            "name": "phenx/php-font-lib",
            "version": "0.5.4",
            "version_normalized": "0.5.4.0",
            "source": {
                "type": "git",
                "url": "https://github.com/dompdf/php-font-lib.git",
                "reference": "dd448ad1ce34c63d09baccd05415e361300c35b4"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/dompdf/php-font-lib/zipball/dd448ad1ce34c63d09baccd05415e361300c35b4",
                "reference": "dd448ad1ce34c63d09baccd05415e361300c35b4",
                "shasum": ""
            },
            "require": {
                "ext-mbstring": "*"
            },
            "require-dev": {
                "symfony/phpunit-bridge": "^3 || ^4 || ^5"
            },
            "time": "2021-12-17T19:44:54+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "FontLib\\": "src/FontLib"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "LGPL-3.0"
            ],
            "authors": [
                {
                    "name": "Fabien Ménager",
                    "email": "fabien.menager@gmail.com"
                }
            ],
            "description": "A library to read, parse, export and make subsets of different types of font files.",
            "homepage": "https://github.com/PhenX/php-font-lib",
            "support": {
                "issues": "https://github.com/dompdf/php-font-lib/issues",
                "source": "https://github.com/dompdf/php-font-lib/tree/0.5.4"
            },
            "install-path": "../phenx/php-font-lib"
        },
        {
            "name": "phenx/php-svg-lib",
            "version": "0.4.1",
            "version_normalized": "0.4.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/dompdf/php-svg-lib.git",
                "reference": "4498b5df7b08e8469f0f8279651ea5de9626ed02"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/dompdf/php-svg-lib/zipball/4498b5df7b08e8469f0f8279651ea5de9626ed02",
                "reference": "4498b5df7b08e8469f0f8279651ea5de9626ed02",
                "shasum": ""
            },
            "require": {
                "ext-mbstring": "*",
                "php": "^7.1 || ^7.2 || ^7.3 || ^7.4 || ^8.0",
                "sabberworm/php-css-parser": "^8.4"
            },
            "require-dev": {
                "phpunit/phpunit": "^7.5 || ^8.5 || ^9.5"
            },
            "time": "2022-03-07T12:52:04+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Svg\\": "src/Svg"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "LGPL-3.0"
            ],
            "authors": [
                {
                    "name": "Fabien Ménager",
                    "email": "fabien.menager@gmail.com"
                }
            ],
            "description": "A library to read, parse and export to PDF SVG files.",
            "homepage": "https://github.com/PhenX/php-svg-lib",
            "support": {
                "issues": "https://github.com/dompdf/php-svg-lib/issues",
                "source": "https://github.com/dompdf/php-svg-lib/tree/0.4.1"
            },
            "install-path": "../phenx/php-svg-lib"
        },
        {
            "name": "php-cs-fixer/diff",
            "version": "v2.0.2",
            "version_normalized": "2.0.2.0",
            "source": {
                "type": "git",
                "url": "https://github.com/PHP-CS-Fixer/diff.git",
                "reference": "29dc0d507e838c4580d018bd8b5cb412474f7ec3"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/PHP-CS-Fixer/diff/zipball/29dc0d507e838c4580d018bd8b5cb412474f7ec3",
                "reference": "29dc0d507e838c4580d018bd8b5cb412474f7ec3",
                "shasum": ""
            },
            "require": {
                "php": "^5.6 || ^7.0 || ^8.0"
            },
            "require-dev": {
                "phpunit/phpunit": "^5.7.23 || ^6.4.3 || ^7.0",
                "symfony/process": "^3.3"
            },
            "time": "2020-10-14T08:32:19+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                },
                {
                    "name": "Kore Nordmann",
                    "email": "mail@kore-nordmann.de"
                }
            ],
            "description": "sebastian/diff v3 backport support for PHP 5.6+",
            "homepage": "https://github.com/PHP-CS-Fixer",
            "keywords": [
                "diff"
            ],
            "support": {
                "issues": "https://github.com/PHP-CS-Fixer/diff/issues",
                "source": "https://github.com/PHP-CS-Fixer/diff/tree/v2.0.2"
            },
            "install-path": "../php-cs-fixer/diff"
        },
        {
            "name": "phpdocumentor/reflection-common",
            "version": "2.2.0",
            "version_normalized": "2.2.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/phpDocumentor/ReflectionCommon.git",
                "reference": "1d01c49d4ed62f25aa84a747ad35d5a16924662b"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/phpDocumentor/ReflectionCommon/zipball/1d01c49d4ed62f25aa84a747ad35d5a16924662b",
                "reference": "1d01c49d4ed62f25aa84a747ad35d5a16924662b",
                "shasum": ""
            },
            "require": {
                "php": "^7.2 || ^8.0"
            },
            "time": "2020-06-27T09:03:43+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-2.x": "2.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "phpDocumentor\\Reflection\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Jaap van Otterdijk",
                    "email": "opensource@ijaap.nl"
                }
            ],
            "description": "Common reflection classes used by phpdocumentor to reflect the code structure",
            "homepage": "http://www.phpdoc.org",
            "keywords": [
                "FQSEN",
                "phpDocumentor",
                "phpdoc",
                "reflection",
                "static analysis"
            ],
            "support": {
                "issues": "https://github.com/phpDocumentor/ReflectionCommon/issues",
                "source": "https://github.com/phpDocumentor/ReflectionCommon/tree/2.x"
            },
            "install-path": "../phpdocumentor/reflection-common"
        },
        {
            "name": "phpdocumentor/reflection-docblock",
            "version": "5.3.0",
            "version_normalized": "5.3.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/phpDocumentor/ReflectionDocBlock.git",
                "reference": "622548b623e81ca6d78b721c5e029f4ce664f170"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/phpDocumentor/ReflectionDocBlock/zipball/622548b623e81ca6d78b721c5e029f4ce664f170",
                "reference": "622548b623e81ca6d78b721c5e029f4ce664f170",
                "shasum": ""
            },
            "require": {
                "ext-filter": "*",
                "php": "^7.2 || ^8.0",
                "phpdocumentor/reflection-common": "^2.2",
                "phpdocumentor/type-resolver": "^1.3",
                "webmozart/assert": "^1.9.1"
            },
            "require-dev": {
                "mockery/mockery": "~1.3.2",
                "psalm/phar": "^4.8"
            },
            "time": "2021-10-19T17:43:47+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "5.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "phpDocumentor\\Reflection\\": "src"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Mike van Riel",
                    "email": "me@mikevanriel.com"
                },
                {
                    "name": "Jaap van Otterdijk",
                    "email": "account@ijaap.nl"
                }
            ],
            "description": "With this component, a library can provide support for annotations via DocBlocks or otherwise retrieve information that is embedded in a DocBlock.",
            "support": {
                "issues": "https://github.com/phpDocumentor/ReflectionDocBlock/issues",
                "source": "https://github.com/phpDocumentor/ReflectionDocBlock/tree/5.3.0"
            },
            "install-path": "../phpdocumentor/reflection-docblock"
        },
        {
            "name": "phpdocumentor/type-resolver",
            "version": "1.6.1",
            "version_normalized": "1.6.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/phpDocumentor/TypeResolver.git",
                "reference": "77a32518733312af16a44300404e945338981de3"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/phpDocumentor/TypeResolver/zipball/77a32518733312af16a44300404e945338981de3",
                "reference": "77a32518733312af16a44300404e945338981de3",
                "shasum": ""
            },
            "require": {
                "php": "^7.2 || ^8.0",
                "phpdocumentor/reflection-common": "^2.0"
            },
            "require-dev": {
                "ext-tokenizer": "*",
                "psalm/phar": "^4.8"
            },
            "time": "2022-03-15T21:29:03+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-1.x": "1.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "phpDocumentor\\Reflection\\": "src"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Mike van Riel",
                    "email": "me@mikevanriel.com"
                }
            ],
            "description": "A PSR-5 based resolver of Class names, Types and Structural Element Names",
            "support": {
                "issues": "https://github.com/phpDocumentor/TypeResolver/issues",
                "source": "https://github.com/phpDocumentor/TypeResolver/tree/1.6.1"
            },
            "install-path": "../phpdocumentor/type-resolver"
        },
        {
            "name": "phpspec/prophecy",
            "version": "v1.15.0",
            "version_normalized": "1.15.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/phpspec/prophecy.git",
                "reference": "bbcd7380b0ebf3961ee21409db7b38bc31d69a13"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/phpspec/prophecy/zipball/bbcd7380b0ebf3961ee21409db7b38bc31d69a13",
                "reference": "bbcd7380b0ebf3961ee21409db7b38bc31d69a13",
                "shasum": ""
            },
            "require": {
                "doctrine/instantiator": "^1.2",
                "php": "^7.2 || ~8.0, <8.2",
                "phpdocumentor/reflection-docblock": "^5.2",
                "sebastian/comparator": "^3.0 || ^4.0",
                "sebastian/recursion-context": "^3.0 || ^4.0"
            },
            "require-dev": {
                "phpspec/phpspec": "^6.0 || ^7.0",
                "phpunit/phpunit": "^8.0 || ^9.0"
            },
            "time": "2021-12-08T12:19:24+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Prophecy\\": "src/Prophecy"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Konstantin Kudryashov",
                    "email": "ever.zet@gmail.com",
                    "homepage": "http://everzet.com"
                },
                {
                    "name": "Marcello Duarte",
                    "email": "marcello.duarte@gmail.com"
                }
            ],
            "description": "Highly opinionated mocking framework for PHP 5.3+",
            "homepage": "https://github.com/phpspec/prophecy",
            "keywords": [
                "Double",
                "Dummy",
                "fake",
                "mock",
                "spy",
                "stub"
            ],
            "support": {
                "issues": "https://github.com/phpspec/prophecy/issues",
                "source": "https://github.com/phpspec/prophecy/tree/v1.15.0"
            },
            "install-path": "../phpspec/prophecy"
        },
        {
            "name": "phpstan/phpstan",
            "version": "1.4.3",
            "version_normalized": "1.4.3.0",
            "source": {
                "type": "git",
                "url": "https://github.com/phpstan/phpstan.git",
                "reference": "89d10839dbfc95eeb7da656578b4a899ad2b59b1"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/phpstan/phpstan/zipball/89d10839dbfc95eeb7da656578b4a899ad2b59b1",
                "reference": "89d10839dbfc95eeb7da656578b4a899ad2b59b1",
                "shasum": ""
            },
            "require": {
                "php": "^7.1|^8.0"
            },
            "conflict": {
                "phpstan/phpstan-shim": "*"
            },
            "time": "2022-01-28T16:27:17+00:00",
            "bin": [
                "phpstan",
                "phpstan.phar"
            ],
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.4-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "bootstrap.php"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "description": "PHPStan - PHP Static Analysis Tool",
            "support": {
                "issues": "https://github.com/phpstan/phpstan/issues",
                "source": "https://github.com/phpstan/phpstan/tree/1.4.3"
            },
            "funding": [
                {
                    "url": "https://github.com/ondrejmirtes",
                    "type": "github"
                },
                {
                    "url": "https://github.com/phpstan",
                    "type": "github"
                },
                {
                    "url": "https://www.patreon.com/phpstan",
                    "type": "patreon"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/phpstan/phpstan",
                    "type": "tidelift"
                }
            ],
            "install-path": "../phpstan/phpstan"
        },
        {
            "name": "phpunit/php-code-coverage",
            "version": "9.2.15",
            "version_normalized": "9.2.15.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/php-code-coverage.git",
                "reference": "2e9da11878c4202f97915c1cb4bb1ca318a63f5f"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/php-code-coverage/zipball/2e9da11878c4202f97915c1cb4bb1ca318a63f5f",
                "reference": "2e9da11878c4202f97915c1cb4bb1ca318a63f5f",
                "shasum": ""
            },
            "require": {
                "ext-dom": "*",
                "ext-libxml": "*",
                "ext-xmlwriter": "*",
                "nikic/php-parser": "^4.13.0",
                "php": ">=7.3",
                "phpunit/php-file-iterator": "^3.0.3",
                "phpunit/php-text-template": "^2.0.2",
                "sebastian/code-unit-reverse-lookup": "^2.0.2",
                "sebastian/complexity": "^2.0",
                "sebastian/environment": "^5.1.2",
                "sebastian/lines-of-code": "^1.0.3",
                "sebastian/version": "^3.0.1",
                "theseer/tokenizer": "^1.2.0"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "suggest": {
                "ext-pcov": "*",
                "ext-xdebug": "*"
            },
            "time": "2022-03-07T09:28:20+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "9.2-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Library that provides collection, processing, and rendering functionality for PHP code coverage information.",
            "homepage": "https://github.com/sebastianbergmann/php-code-coverage",
            "keywords": [
                "coverage",
                "testing",
                "xunit"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/php-code-coverage/issues",
                "source": "https://github.com/sebastianbergmann/php-code-coverage/tree/9.2.15"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../phpunit/php-code-coverage"
        },
        {
            "name": "phpunit/php-file-iterator",
            "version": "3.0.6",
            "version_normalized": "3.0.6.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/php-file-iterator.git",
                "reference": "cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/php-file-iterator/zipball/cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf",
                "reference": "cf1c2e7c203ac650e352f4cc675a7021e7d1b3cf",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2021-12-02T12:48:52+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "3.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "FilterIterator implementation that filters files based on a list of suffixes.",
            "homepage": "https://github.com/sebastianbergmann/php-file-iterator/",
            "keywords": [
                "filesystem",
                "iterator"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/php-file-iterator/issues",
                "source": "https://github.com/sebastianbergmann/php-file-iterator/tree/3.0.6"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../phpunit/php-file-iterator"
        },
        {
            "name": "phpunit/php-invoker",
            "version": "3.1.1",
            "version_normalized": "3.1.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/php-invoker.git",
                "reference": "5a10147d0aaf65b58940a0b72f71c9ac0423cc67"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/php-invoker/zipball/5a10147d0aaf65b58940a0b72f71c9ac0423cc67",
                "reference": "5a10147d0aaf65b58940a0b72f71c9ac0423cc67",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "ext-pcntl": "*",
                "phpunit/phpunit": "^9.3"
            },
            "suggest": {
                "ext-pcntl": "*"
            },
            "time": "2020-09-28T05:58:55+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "3.1-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Invoke callables with a timeout",
            "homepage": "https://github.com/sebastianbergmann/php-invoker/",
            "keywords": [
                "process"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/php-invoker/issues",
                "source": "https://github.com/sebastianbergmann/php-invoker/tree/3.1.1"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../phpunit/php-invoker"
        },
        {
            "name": "phpunit/php-text-template",
            "version": "2.0.4",
            "version_normalized": "2.0.4.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/php-text-template.git",
                "reference": "5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/php-text-template/zipball/5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28",
                "reference": "5da5f67fc95621df9ff4c4e5a84d6a8a2acf7c28",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2020-10-26T05:33:50+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Simple template engine.",
            "homepage": "https://github.com/sebastianbergmann/php-text-template/",
            "keywords": [
                "template"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/php-text-template/issues",
                "source": "https://github.com/sebastianbergmann/php-text-template/tree/2.0.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../phpunit/php-text-template"
        },
        {
            "name": "phpunit/php-timer",
            "version": "5.0.3",
            "version_normalized": "5.0.3.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/php-timer.git",
                "reference": "5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/php-timer/zipball/5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2",
                "reference": "5a63ce20ed1b5bf577850e2c4e87f4aa902afbd2",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2020-10-26T13:16:10+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "5.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Utility class for timing",
            "homepage": "https://github.com/sebastianbergmann/php-timer/",
            "keywords": [
                "timer"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/php-timer/issues",
                "source": "https://github.com/sebastianbergmann/php-timer/tree/5.0.3"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../phpunit/php-timer"
        },
        {
            "name": "phpunit/phpunit",
            "version": "9.5.20",
            "version_normalized": "9.5.20.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/phpunit.git",
                "reference": "12bc8879fb65aef2138b26fc633cb1e3620cffba"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/phpunit/zipball/12bc8879fb65aef2138b26fc633cb1e3620cffba",
                "reference": "12bc8879fb65aef2138b26fc633cb1e3620cffba",
                "shasum": ""
            },
            "require": {
                "doctrine/instantiator": "^1.3.1",
                "ext-dom": "*",
                "ext-json": "*",
                "ext-libxml": "*",
                "ext-mbstring": "*",
                "ext-xml": "*",
                "ext-xmlwriter": "*",
                "myclabs/deep-copy": "^1.10.1",
                "phar-io/manifest": "^2.0.3",
                "phar-io/version": "^3.0.2",
                "php": ">=7.3",
                "phpspec/prophecy": "^1.12.1",
                "phpunit/php-code-coverage": "^9.2.13",
                "phpunit/php-file-iterator": "^3.0.5",
                "phpunit/php-invoker": "^3.1.1",
                "phpunit/php-text-template": "^2.0.3",
                "phpunit/php-timer": "^5.0.2",
                "sebastian/cli-parser": "^1.0.1",
                "sebastian/code-unit": "^1.0.6",
                "sebastian/comparator": "^4.0.5",
                "sebastian/diff": "^4.0.3",
                "sebastian/environment": "^5.1.3",
                "sebastian/exporter": "^4.0.3",
                "sebastian/global-state": "^5.0.1",
                "sebastian/object-enumerator": "^4.0.3",
                "sebastian/resource-operations": "^3.0.3",
                "sebastian/type": "^3.0",
                "sebastian/version": "^3.0.2"
            },
            "require-dev": {
                "ext-pdo": "*",
                "phpspec/prophecy-phpunit": "^2.0.1"
            },
            "suggest": {
                "ext-soap": "*",
                "ext-xdebug": "*"
            },
            "time": "2022-04-01T12:37:26+00:00",
            "bin": [
                "phpunit"
            ],
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "9.5-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "src/Framework/Assert/Functions.php"
                ],
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "The PHP Unit Testing framework.",
            "homepage": "https://phpunit.de/",
            "keywords": [
                "phpunit",
                "testing",
                "xunit"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/phpunit/issues",
                "source": "https://github.com/sebastianbergmann/phpunit/tree/9.5.20"
            },
            "funding": [
                {
                    "url": "https://phpunit.de/sponsors.html",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../phpunit/phpunit"
        },
        {
            "name": "predis/predis",
            "version": "v1.1.10",
            "version_normalized": "1.1.10.0",
            "source": {
                "type": "git",
                "url": "https://github.com/predis/predis.git",
                "reference": "a2fb02d738bedadcffdbb07efa3a5e7bd57f8d6e"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/predis/predis/zipball/a2fb02d738bedadcffdbb07efa3a5e7bd57f8d6e",
                "reference": "a2fb02d738bedadcffdbb07efa3a5e7bd57f8d6e",
                "shasum": ""
            },
            "require": {
                "php": ">=5.3.9"
            },
            "require-dev": {
                "phpunit/phpunit": "~4.8"
            },
            "suggest": {
                "ext-curl": "Allows access to Webdis when paired with phpiredis",
                "ext-phpiredis": "Allows faster serialization and deserialization of the Redis protocol"
            },
            "time": "2022-01-05T17:46:08+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Predis\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Daniele Alessandri",
                    "email": "suppakilla@gmail.com",
                    "homepage": "http://clorophilla.net",
                    "role": "Creator & Maintainer"
                },
                {
                    "name": "Till Krüss",
                    "homepage": "https://till.im",
                    "role": "Maintainer"
                }
            ],
            "description": "Flexible and feature-complete Redis client for PHP and HHVM",
            "homepage": "http://github.com/predis/predis",
            "keywords": [
                "nosql",
                "predis",
                "redis"
            ],
            "support": {
                "issues": "https://github.com/predis/predis/issues",
                "source": "https://github.com/predis/predis/tree/v1.1.10"
            },
            "funding": [
                {
                    "url": "https://github.com/sponsors/tillkruss",
                    "type": "github"
                }
            ],
            "install-path": "../predis/predis"
        },
        {
            "name": "psr/cache",
            "version": "1.0.1",
            "version_normalized": "1.0.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/php-fig/cache.git",
                "reference": "d11b50ad223250cf17b86e38383413f5a6764bf8"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/php-fig/cache/zipball/d11b50ad223250cf17b86e38383413f5a6764bf8",
                "reference": "d11b50ad223250cf17b86e38383413f5a6764bf8",
                "shasum": ""
            },
            "require": {
                "php": ">=5.3.0"
            },
            "time": "2016-08-06T20:24:11+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.0.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Psr\\Cache\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "PHP-FIG",
                    "homepage": "http://www.php-fig.org/"
                }
            ],
            "description": "Common interface for caching libraries",
            "keywords": [
                "cache",
                "psr",
                "psr-6"
            ],
            "support": {
                "source": "https://github.com/php-fig/cache/tree/master"
            },
            "install-path": "../psr/cache"
        },
        {
            "name": "psr/container",
            "version": "1.1.2",
            "version_normalized": "1.1.2.0",
            "source": {
                "type": "git",
                "url": "https://github.com/php-fig/container.git",
                "reference": "513e0666f7216c7459170d56df27dfcefe1689ea"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/php-fig/container/zipball/513e0666f7216c7459170d56df27dfcefe1689ea",
                "reference": "513e0666f7216c7459170d56df27dfcefe1689ea",
                "shasum": ""
            },
            "require": {
                "php": ">=7.4.0"
            },
            "time": "2021-11-05T16:50:12+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Psr\\Container\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "PHP-FIG",
                    "homepage": "https://www.php-fig.org/"
                }
            ],
            "description": "Common Container Interface (PHP FIG PSR-11)",
            "homepage": "https://github.com/php-fig/container",
            "keywords": [
                "PSR-11",
                "container",
                "container-interface",
                "container-interop",
                "psr"
            ],
            "support": {
                "issues": "https://github.com/php-fig/container/issues",
                "source": "https://github.com/php-fig/container/tree/1.1.2"
            },
            "install-path": "../psr/container"
        },
        {
            "name": "psr/event-dispatcher",
            "version": "1.0.0",
            "version_normalized": "1.0.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/php-fig/event-dispatcher.git",
                "reference": "dbefd12671e8a14ec7f180cab83036ed26714bb0"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/php-fig/event-dispatcher/zipball/dbefd12671e8a14ec7f180cab83036ed26714bb0",
                "reference": "dbefd12671e8a14ec7f180cab83036ed26714bb0",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.0"
            },
            "time": "2019-01-08T18:20:26+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.0.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Psr\\EventDispatcher\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "PHP-FIG",
                    "homepage": "http://www.php-fig.org/"
                }
            ],
            "description": "Standard interfaces for event handling.",
            "keywords": [
                "events",
                "psr",
                "psr-14"
            ],
            "support": {
                "issues": "https://github.com/php-fig/event-dispatcher/issues",
                "source": "https://github.com/php-fig/event-dispatcher/tree/1.0.0"
            },
            "install-path": "../psr/event-dispatcher"
        },
        {
            "name": "psr/log",
            "version": "1.1.4",
            "version_normalized": "1.1.4.0",
            "source": {
                "type": "git",
                "url": "https://github.com/php-fig/log.git",
                "reference": "d49695b909c3b7628b6289db5479a1c204601f11"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/php-fig/log/zipball/d49695b909c3b7628b6289db5479a1c204601f11",
                "reference": "d49695b909c3b7628b6289db5479a1c204601f11",
                "shasum": ""
            },
            "require": {
                "php": ">=5.3.0"
            },
            "time": "2021-05-03T11:20:27+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.1.x-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Psr\\Log\\": "Psr/Log/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "PHP-FIG",
                    "homepage": "https://www.php-fig.org/"
                }
            ],
            "description": "Common interface for logging libraries",
            "homepage": "https://github.com/php-fig/log",
            "keywords": [
                "log",
                "psr",
                "psr-3"
            ],
            "support": {
                "source": "https://github.com/php-fig/log/tree/1.1.4"
            },
            "install-path": "../psr/log"
        },
        {
            "name": "rector/rector",
            "version": "0.12.10",
            "version_normalized": "0.12.10.0",
            "source": {
                "type": "git",
                "url": "https://github.com/rectorphp/rector.git",
                "reference": "8c823197becb3905e42b9d7f7849f1174e8b47cf"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/rectorphp/rector/zipball/8c823197becb3905e42b9d7f7849f1174e8b47cf",
                "reference": "8c823197becb3905e42b9d7f7849f1174e8b47cf",
                "shasum": ""
            },
            "require": {
                "php": "^7.1|^8.0",
                "phpstan/phpstan": "^1.3"
            },
            "conflict": {
                "phpstan/phpdoc-parser": "<1.2",
                "rector/rector-cakephp": "*",
                "rector/rector-doctrine": "*",
                "rector/rector-laravel": "*",
                "rector/rector-nette": "*",
                "rector/rector-phpoffice": "*",
                "rector/rector-phpunit": "*",
                "rector/rector-prefixed": "*",
                "rector/rector-symfony": "*"
            },
            "time": "2021-12-31T12:57:22+00:00",
            "bin": [
                "bin/rector"
            ],
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "0.12-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "bootstrap.php"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "description": "Prefixed and PHP 7.1 downgraded version of rector/rector",
            "support": {
                "issues": "https://github.com/rectorphp/rector/issues",
                "source": "https://github.com/rectorphp/rector/tree/0.12.10"
            },
            "funding": [
                {
                    "url": "https://github.com/tomasvotruba",
                    "type": "github"
                }
            ],
            "install-path": "../rector/rector"
        },
        {
            "name": "sabberworm/php-css-parser",
            "version": "8.4.0",
            "version_normalized": "8.4.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sabberworm/PHP-CSS-Parser.git",
                "reference": "e41d2140031d533348b2192a83f02d8dd8a71d30"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sabberworm/PHP-CSS-Parser/zipball/e41d2140031d533348b2192a83f02d8dd8a71d30",
                "reference": "e41d2140031d533348b2192a83f02d8dd8a71d30",
                "shasum": ""
            },
            "require": {
                "ext-iconv": "*",
                "php": ">=5.6.20"
            },
            "require-dev": {
                "codacy/coverage": "^1.4",
                "phpunit/phpunit": "^4.8.36"
            },
            "suggest": {
                "ext-mbstring": "for parsing UTF-8 CSS"
            },
            "time": "2021-12-11T13:40:54+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Sabberworm\\CSS\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Raphael Schweikert"
                }
            ],
            "description": "Parser for CSS Files written in PHP",
            "homepage": "https://www.sabberworm.com/blog/2010/6/10/php-css-parser",
            "keywords": [
                "css",
                "parser",
                "stylesheet"
            ],
            "support": {
                "issues": "https://github.com/sabberworm/PHP-CSS-Parser/issues",
                "source": "https://github.com/sabberworm/PHP-CSS-Parser/tree/8.4.0"
            },
            "install-path": "../sabberworm/php-css-parser"
        },
        {
            "name": "sebastian/cli-parser",
            "version": "1.0.1",
            "version_normalized": "1.0.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/cli-parser.git",
                "reference": "442e7c7e687e42adc03470c7b668bc4b2402c0b2"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/cli-parser/zipball/442e7c7e687e42adc03470c7b668bc4b2402c0b2",
                "reference": "442e7c7e687e42adc03470c7b668bc4b2402c0b2",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2020-09-28T06:08:49+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Library for parsing CLI options",
            "homepage": "https://github.com/sebastianbergmann/cli-parser",
            "support": {
                "issues": "https://github.com/sebastianbergmann/cli-parser/issues",
                "source": "https://github.com/sebastianbergmann/cli-parser/tree/1.0.1"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/cli-parser"
        },
        {
            "name": "sebastian/code-unit",
            "version": "1.0.8",
            "version_normalized": "1.0.8.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/code-unit.git",
                "reference": "1fc9f64c0927627ef78ba436c9b17d967e68e120"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/code-unit/zipball/1fc9f64c0927627ef78ba436c9b17d967e68e120",
                "reference": "1fc9f64c0927627ef78ba436c9b17d967e68e120",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2020-10-26T13:08:54+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Collection of value objects that represent the PHP code units",
            "homepage": "https://github.com/sebastianbergmann/code-unit",
            "support": {
                "issues": "https://github.com/sebastianbergmann/code-unit/issues",
                "source": "https://github.com/sebastianbergmann/code-unit/tree/1.0.8"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/code-unit"
        },
        {
            "name": "sebastian/code-unit-reverse-lookup",
            "version": "2.0.3",
            "version_normalized": "2.0.3.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/code-unit-reverse-lookup.git",
                "reference": "ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/code-unit-reverse-lookup/zipball/ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5",
                "reference": "ac91f01ccec49fb77bdc6fd1e548bc70f7faa3e5",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2020-09-28T05:30:19+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Looks up which function or method a line of code belongs to",
            "homepage": "https://github.com/sebastianbergmann/code-unit-reverse-lookup/",
            "support": {
                "issues": "https://github.com/sebastianbergmann/code-unit-reverse-lookup/issues",
                "source": "https://github.com/sebastianbergmann/code-unit-reverse-lookup/tree/2.0.3"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/code-unit-reverse-lookup"
        },
        {
            "name": "sebastian/comparator",
            "version": "4.0.6",
            "version_normalized": "4.0.6.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/comparator.git",
                "reference": "55f4261989e546dc112258c7a75935a81a7ce382"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/comparator/zipball/55f4261989e546dc112258c7a75935a81a7ce382",
                "reference": "55f4261989e546dc112258c7a75935a81a7ce382",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3",
                "sebastian/diff": "^4.0",
                "sebastian/exporter": "^4.0"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2020-10-26T15:49:45+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                },
                {
                    "name": "Jeff Welch",
                    "email": "whatthejeff@gmail.com"
                },
                {
                    "name": "Volker Dusch",
                    "email": "github@wallbash.com"
                },
                {
                    "name": "Bernhard Schussek",
                    "email": "bschussek@2bepublished.at"
                }
            ],
            "description": "Provides the functionality to compare PHP values for equality",
            "homepage": "https://github.com/sebastianbergmann/comparator",
            "keywords": [
                "comparator",
                "compare",
                "equality"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/comparator/issues",
                "source": "https://github.com/sebastianbergmann/comparator/tree/4.0.6"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/comparator"
        },
        {
            "name": "sebastian/complexity",
            "version": "2.0.2",
            "version_normalized": "2.0.2.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/complexity.git",
                "reference": "739b35e53379900cc9ac327b2147867b8b6efd88"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/complexity/zipball/739b35e53379900cc9ac327b2147867b8b6efd88",
                "reference": "739b35e53379900cc9ac327b2147867b8b6efd88",
                "shasum": ""
            },
            "require": {
                "nikic/php-parser": "^4.7",
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2020-10-26T15:52:27+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Library for calculating the complexity of PHP code units",
            "homepage": "https://github.com/sebastianbergmann/complexity",
            "support": {
                "issues": "https://github.com/sebastianbergmann/complexity/issues",
                "source": "https://github.com/sebastianbergmann/complexity/tree/2.0.2"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/complexity"
        },
        {
            "name": "sebastian/diff",
            "version": "4.0.4",
            "version_normalized": "4.0.4.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/diff.git",
                "reference": "3461e3fccc7cfdfc2720be910d3bd73c69be590d"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/diff/zipball/3461e3fccc7cfdfc2720be910d3bd73c69be590d",
                "reference": "3461e3fccc7cfdfc2720be910d3bd73c69be590d",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3",
                "symfony/process": "^4.2 || ^5"
            },
            "time": "2020-10-26T13:10:38+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                },
                {
                    "name": "Kore Nordmann",
                    "email": "mail@kore-nordmann.de"
                }
            ],
            "description": "Diff implementation",
            "homepage": "https://github.com/sebastianbergmann/diff",
            "keywords": [
                "diff",
                "udiff",
                "unidiff",
                "unified diff"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/diff/issues",
                "source": "https://github.com/sebastianbergmann/diff/tree/4.0.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/diff"
        },
        {
            "name": "sebastian/environment",
            "version": "5.1.4",
            "version_normalized": "5.1.4.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/environment.git",
                "reference": "1b5dff7bb151a4db11d49d90e5408e4e938270f7"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/environment/zipball/1b5dff7bb151a4db11d49d90e5408e4e938270f7",
                "reference": "1b5dff7bb151a4db11d49d90e5408e4e938270f7",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "suggest": {
                "ext-posix": "*"
            },
            "time": "2022-04-03T09:37:03+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "5.1-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Provides functionality to handle HHVM/PHP environments",
            "homepage": "http://www.github.com/sebastianbergmann/environment",
            "keywords": [
                "Xdebug",
                "environment",
                "hhvm"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/environment/issues",
                "source": "https://github.com/sebastianbergmann/environment/tree/5.1.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/environment"
        },
        {
            "name": "sebastian/exporter",
            "version": "4.0.4",
            "version_normalized": "4.0.4.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/exporter.git",
                "reference": "65e8b7db476c5dd267e65eea9cab77584d3cfff9"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/exporter/zipball/65e8b7db476c5dd267e65eea9cab77584d3cfff9",
                "reference": "65e8b7db476c5dd267e65eea9cab77584d3cfff9",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3",
                "sebastian/recursion-context": "^4.0"
            },
            "require-dev": {
                "ext-mbstring": "*",
                "phpunit/phpunit": "^9.3"
            },
            "time": "2021-11-11T14:18:36+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                },
                {
                    "name": "Jeff Welch",
                    "email": "whatthejeff@gmail.com"
                },
                {
                    "name": "Volker Dusch",
                    "email": "github@wallbash.com"
                },
                {
                    "name": "Adam Harvey",
                    "email": "aharvey@php.net"
                },
                {
                    "name": "Bernhard Schussek",
                    "email": "bschussek@gmail.com"
                }
            ],
            "description": "Provides the functionality to export PHP variables for visualization",
            "homepage": "https://www.github.com/sebastianbergmann/exporter",
            "keywords": [
                "export",
                "exporter"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/exporter/issues",
                "source": "https://github.com/sebastianbergmann/exporter/tree/4.0.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/exporter"
        },
        {
            "name": "sebastian/global-state",
            "version": "5.0.5",
            "version_normalized": "5.0.5.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/global-state.git",
                "reference": "0ca8db5a5fc9c8646244e629625ac486fa286bf2"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/global-state/zipball/0ca8db5a5fc9c8646244e629625ac486fa286bf2",
                "reference": "0ca8db5a5fc9c8646244e629625ac486fa286bf2",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3",
                "sebastian/object-reflector": "^2.0",
                "sebastian/recursion-context": "^4.0"
            },
            "require-dev": {
                "ext-dom": "*",
                "phpunit/phpunit": "^9.3"
            },
            "suggest": {
                "ext-uopz": "*"
            },
            "time": "2022-02-14T08:28:10+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "5.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Snapshotting of global state",
            "homepage": "http://www.github.com/sebastianbergmann/global-state",
            "keywords": [
                "global state"
            ],
            "support": {
                "issues": "https://github.com/sebastianbergmann/global-state/issues",
                "source": "https://github.com/sebastianbergmann/global-state/tree/5.0.5"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/global-state"
        },
        {
            "name": "sebastian/lines-of-code",
            "version": "1.0.3",
            "version_normalized": "1.0.3.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/lines-of-code.git",
                "reference": "c1c2e997aa3146983ed888ad08b15470a2e22ecc"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/lines-of-code/zipball/c1c2e997aa3146983ed888ad08b15470a2e22ecc",
                "reference": "c1c2e997aa3146983ed888ad08b15470a2e22ecc",
                "shasum": ""
            },
            "require": {
                "nikic/php-parser": "^4.6",
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2020-11-28T06:42:11+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Library for counting the lines of code in PHP source code",
            "homepage": "https://github.com/sebastianbergmann/lines-of-code",
            "support": {
                "issues": "https://github.com/sebastianbergmann/lines-of-code/issues",
                "source": "https://github.com/sebastianbergmann/lines-of-code/tree/1.0.3"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/lines-of-code"
        },
        {
            "name": "sebastian/object-enumerator",
            "version": "4.0.4",
            "version_normalized": "4.0.4.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/object-enumerator.git",
                "reference": "5c9eeac41b290a3712d88851518825ad78f45c71"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/object-enumerator/zipball/5c9eeac41b290a3712d88851518825ad78f45c71",
                "reference": "5c9eeac41b290a3712d88851518825ad78f45c71",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3",
                "sebastian/object-reflector": "^2.0",
                "sebastian/recursion-context": "^4.0"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2020-10-26T13:12:34+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Traverses array structures and object graphs to enumerate all referenced objects",
            "homepage": "https://github.com/sebastianbergmann/object-enumerator/",
            "support": {
                "issues": "https://github.com/sebastianbergmann/object-enumerator/issues",
                "source": "https://github.com/sebastianbergmann/object-enumerator/tree/4.0.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/object-enumerator"
        },
        {
            "name": "sebastian/object-reflector",
            "version": "2.0.4",
            "version_normalized": "2.0.4.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/object-reflector.git",
                "reference": "b4f479ebdbf63ac605d183ece17d8d7fe49c15c7"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/object-reflector/zipball/b4f479ebdbf63ac605d183ece17d8d7fe49c15c7",
                "reference": "b4f479ebdbf63ac605d183ece17d8d7fe49c15c7",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2020-10-26T13:14:26+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "2.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Allows reflection of object attributes, including inherited and non-public ones",
            "homepage": "https://github.com/sebastianbergmann/object-reflector/",
            "support": {
                "issues": "https://github.com/sebastianbergmann/object-reflector/issues",
                "source": "https://github.com/sebastianbergmann/object-reflector/tree/2.0.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/object-reflector"
        },
        {
            "name": "sebastian/recursion-context",
            "version": "4.0.4",
            "version_normalized": "4.0.4.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/recursion-context.git",
                "reference": "cd9d8cf3c5804de4341c283ed787f099f5506172"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/recursion-context/zipball/cd9d8cf3c5804de4341c283ed787f099f5506172",
                "reference": "cd9d8cf3c5804de4341c283ed787f099f5506172",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.3"
            },
            "time": "2020-10-26T13:17:30+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "4.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                },
                {
                    "name": "Jeff Welch",
                    "email": "whatthejeff@gmail.com"
                },
                {
                    "name": "Adam Harvey",
                    "email": "aharvey@php.net"
                }
            ],
            "description": "Provides functionality to recursively process PHP variables",
            "homepage": "http://www.github.com/sebastianbergmann/recursion-context",
            "support": {
                "issues": "https://github.com/sebastianbergmann/recursion-context/issues",
                "source": "https://github.com/sebastianbergmann/recursion-context/tree/4.0.4"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/recursion-context"
        },
        {
            "name": "sebastian/resource-operations",
            "version": "3.0.3",
            "version_normalized": "3.0.3.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/resource-operations.git",
                "reference": "0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/resource-operations/zipball/0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8",
                "reference": "0f4443cb3a1d92ce809899753bc0d5d5a8dd19a8",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.0"
            },
            "time": "2020-09-28T06:45:17+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "3.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de"
                }
            ],
            "description": "Provides a list of PHP built-in functions that operate on resources",
            "homepage": "https://www.github.com/sebastianbergmann/resource-operations",
            "support": {
                "issues": "https://github.com/sebastianbergmann/resource-operations/issues",
                "source": "https://github.com/sebastianbergmann/resource-operations/tree/3.0.3"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/resource-operations"
        },
        {
            "name": "sebastian/type",
            "version": "3.0.0",
            "version_normalized": "3.0.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/type.git",
                "reference": "b233b84bc4465aff7b57cf1c4bc75c86d00d6dad"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/type/zipball/b233b84bc4465aff7b57cf1c4bc75c86d00d6dad",
                "reference": "b233b84bc4465aff7b57cf1c4bc75c86d00d6dad",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "require-dev": {
                "phpunit/phpunit": "^9.5"
            },
            "time": "2022-03-15T09:54:48+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "3.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Collection of value objects that represent the types of the PHP type system",
            "homepage": "https://github.com/sebastianbergmann/type",
            "support": {
                "issues": "https://github.com/sebastianbergmann/type/issues",
                "source": "https://github.com/sebastianbergmann/type/tree/3.0.0"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/type"
        },
        {
            "name": "sebastian/version",
            "version": "3.0.2",
            "version_normalized": "3.0.2.0",
            "source": {
                "type": "git",
                "url": "https://github.com/sebastianbergmann/version.git",
                "reference": "c6c1022351a901512170118436c764e473f6de8c"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/sebastianbergmann/version/zipball/c6c1022351a901512170118436c764e473f6de8c",
                "reference": "c6c1022351a901512170118436c764e473f6de8c",
                "shasum": ""
            },
            "require": {
                "php": ">=7.3"
            },
            "time": "2020-09-28T06:39:44+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "3.0-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Sebastian Bergmann",
                    "email": "sebastian@phpunit.de",
                    "role": "lead"
                }
            ],
            "description": "Library that helps with managing the version number of Git-hosted PHP projects",
            "homepage": "https://github.com/sebastianbergmann/version",
            "support": {
                "issues": "https://github.com/sebastianbergmann/version/issues",
                "source": "https://github.com/sebastianbergmann/version/tree/3.0.2"
            },
            "funding": [
                {
                    "url": "https://github.com/sebastianbergmann",
                    "type": "github"
                }
            ],
            "install-path": "../sebastian/version"
        },
        {
            "name": "symfony/console",
            "version": "v5.4.9",
            "version_normalized": "5.4.9.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/console.git",
                "reference": "829d5d1bf60b2efeb0887b7436873becc71a45eb"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/console/zipball/829d5d1bf60b2efeb0887b7436873becc71a45eb",
                "reference": "829d5d1bf60b2efeb0887b7436873becc71a45eb",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.5",
                "symfony/deprecation-contracts": "^2.1|^3",
                "symfony/polyfill-mbstring": "~1.0",
                "symfony/polyfill-php73": "^1.9",
                "symfony/polyfill-php80": "^1.16",
                "symfony/service-contracts": "^1.1|^2|^3",
                "symfony/string": "^5.1|^6.0"
            },
            "conflict": {
                "psr/log": ">=3",
                "symfony/dependency-injection": "<4.4",
                "symfony/dotenv": "<5.1",
                "symfony/event-dispatcher": "<4.4",
                "symfony/lock": "<4.4",
                "symfony/process": "<4.4"
            },
            "provide": {
                "psr/log-implementation": "1.0|2.0"
            },
            "require-dev": {
                "psr/log": "^1|^2",
                "symfony/config": "^4.4|^5.0|^6.0",
                "symfony/dependency-injection": "^4.4|^5.0|^6.0",
                "symfony/event-dispatcher": "^4.4|^5.0|^6.0",
                "symfony/lock": "^4.4|^5.0|^6.0",
                "symfony/process": "^4.4|^5.0|^6.0",
                "symfony/var-dumper": "^4.4|^5.0|^6.0"
            },
            "suggest": {
                "psr/log": "For using the console logger",
                "symfony/event-dispatcher": "",
                "symfony/lock": "",
                "symfony/process": ""
            },
            "time": "2022-05-18T06:17:34+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\Console\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Eases the creation of beautiful and testable command line interfaces",
            "homepage": "https://symfony.com",
            "keywords": [
                "cli",
                "command line",
                "console",
                "terminal"
            ],
            "support": {
                "source": "https://github.com/symfony/console/tree/v5.4.9"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/console"
        },
        {
            "name": "symfony/deprecation-contracts",
            "version": "v2.5.1",
            "version_normalized": "2.5.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/deprecation-contracts.git",
                "reference": "e8b495ea28c1d97b5e0c121748d6f9b53d075c66"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/deprecation-contracts/zipball/e8b495ea28c1d97b5e0c121748d6f9b53d075c66",
                "reference": "e8b495ea28c1d97b5e0c121748d6f9b53d075c66",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "time": "2022-01-02T09:53:40+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "2.5-dev"
                },
                "thanks": {
                    "name": "symfony/contracts",
                    "url": "https://github.com/symfony/contracts"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "function.php"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "A generic function and convention to trigger deprecation notices",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/deprecation-contracts/tree/v2.5.1"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/deprecation-contracts"
        },
        {
            "name": "symfony/event-dispatcher",
            "version": "v5.4.9",
            "version_normalized": "5.4.9.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/event-dispatcher.git",
                "reference": "8e6ce1cc0279e3ff3c8ff0f43813bc88d21ca1bc"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/event-dispatcher/zipball/8e6ce1cc0279e3ff3c8ff0f43813bc88d21ca1bc",
                "reference": "8e6ce1cc0279e3ff3c8ff0f43813bc88d21ca1bc",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.5",
                "symfony/deprecation-contracts": "^2.1|^3",
                "symfony/event-dispatcher-contracts": "^2|^3",
                "symfony/polyfill-php80": "^1.16"
            },
            "conflict": {
                "symfony/dependency-injection": "<4.4"
            },
            "provide": {
                "psr/event-dispatcher-implementation": "1.0",
                "symfony/event-dispatcher-implementation": "2.0"
            },
            "require-dev": {
                "psr/log": "^1|^2|^3",
                "symfony/config": "^4.4|^5.0|^6.0",
                "symfony/dependency-injection": "^4.4|^5.0|^6.0",
                "symfony/error-handler": "^4.4|^5.0|^6.0",
                "symfony/expression-language": "^4.4|^5.0|^6.0",
                "symfony/http-foundation": "^4.4|^5.0|^6.0",
                "symfony/service-contracts": "^1.1|^2|^3",
                "symfony/stopwatch": "^4.4|^5.0|^6.0"
            },
            "suggest": {
                "symfony/dependency-injection": "",
                "symfony/http-kernel": ""
            },
            "time": "2022-05-05T16:45:39+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\EventDispatcher\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Provides tools that allow your application components to communicate with each other by dispatching events and listening to them",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/event-dispatcher/tree/v5.4.9"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/event-dispatcher"
        },
        {
            "name": "symfony/event-dispatcher-contracts",
            "version": "v2.5.1",
            "version_normalized": "2.5.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/event-dispatcher-contracts.git",
                "reference": "f98b54df6ad059855739db6fcbc2d36995283fe1"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/event-dispatcher-contracts/zipball/f98b54df6ad059855739db6fcbc2d36995283fe1",
                "reference": "f98b54df6ad059855739db6fcbc2d36995283fe1",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.5",
                "psr/event-dispatcher": "^1"
            },
            "suggest": {
                "symfony/event-dispatcher-implementation": ""
            },
            "time": "2022-01-02T09:53:40+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "2.5-dev"
                },
                "thanks": {
                    "name": "symfony/contracts",
                    "url": "https://github.com/symfony/contracts"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Symfony\\Contracts\\EventDispatcher\\": ""
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Generic abstractions related to dispatching event",
            "homepage": "https://symfony.com",
            "keywords": [
                "abstractions",
                "contracts",
                "decoupling",
                "interfaces",
                "interoperability",
                "standards"
            ],
            "support": {
                "source": "https://github.com/symfony/event-dispatcher-contracts/tree/v2.5.1"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/event-dispatcher-contracts"
        },
        {
            "name": "symfony/filesystem",
            "version": "v5.4.9",
            "version_normalized": "5.4.9.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/filesystem.git",
                "reference": "36a017fa4cce1eff1b8e8129ff53513abcef05ba"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/filesystem/zipball/36a017fa4cce1eff1b8e8129ff53513abcef05ba",
                "reference": "36a017fa4cce1eff1b8e8129ff53513abcef05ba",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.5",
                "symfony/polyfill-ctype": "~1.8",
                "symfony/polyfill-mbstring": "~1.8",
                "symfony/polyfill-php80": "^1.16"
            },
            "time": "2022-05-20T13:55:35+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\Filesystem\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Provides basic utilities for the filesystem",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/filesystem/tree/v5.4.9"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/filesystem"
        },
        {
            "name": "symfony/finder",
            "version": "v5.4.8",
            "version_normalized": "5.4.8.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/finder.git",
                "reference": "9b630f3427f3ebe7cd346c277a1408b00249dad9"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/finder/zipball/9b630f3427f3ebe7cd346c277a1408b00249dad9",
                "reference": "9b630f3427f3ebe7cd346c277a1408b00249dad9",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.5",
                "symfony/deprecation-contracts": "^2.1|^3",
                "symfony/polyfill-php80": "^1.16"
            },
            "time": "2022-04-15T08:07:45+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\Finder\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Finds files and directories via an intuitive fluent interface",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/finder/tree/v5.4.8"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/finder"
        },
        {
            "name": "symfony/options-resolver",
            "version": "v5.4.3",
            "version_normalized": "5.4.3.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/options-resolver.git",
                "reference": "cc1147cb11af1b43f503ac18f31aa3bec213aba8"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/options-resolver/zipball/cc1147cb11af1b43f503ac18f31aa3bec213aba8",
                "reference": "cc1147cb11af1b43f503ac18f31aa3bec213aba8",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.5",
                "symfony/deprecation-contracts": "^2.1|^3",
                "symfony/polyfill-php73": "~1.0",
                "symfony/polyfill-php80": "^1.16"
            },
            "time": "2022-01-02T09:53:40+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\OptionsResolver\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Provides an improved replacement for the array_replace PHP function",
            "homepage": "https://symfony.com",
            "keywords": [
                "config",
                "configuration",
                "options"
            ],
            "support": {
                "source": "https://github.com/symfony/options-resolver/tree/v5.4.3"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/options-resolver"
        },
        {
            "name": "symfony/polyfill-ctype",
            "version": "v1.25.0",
            "version_normalized": "1.25.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-ctype.git",
                "reference": "30885182c981ab175d4d034db0f6f469898070ab"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-ctype/zipball/30885182c981ab175d4d034db0f6f469898070ab",
                "reference": "30885182c981ab175d4d034db0f6f469898070ab",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "provide": {
                "ext-ctype": "*"
            },
            "suggest": {
                "ext-ctype": "For best performance"
            },
            "time": "2021-10-20T20:35:02+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.23-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Ctype\\": ""
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Gert de Pagter",
                    "email": "BackEndTea@gmail.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill for ctype functions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "ctype",
                "polyfill",
                "portable"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-ctype/tree/v1.25.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/polyfill-ctype"
        },
        {
            "name": "symfony/polyfill-intl-grapheme",
            "version": "v1.25.0",
            "version_normalized": "1.25.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-intl-grapheme.git",
                "reference": "81b86b50cf841a64252b439e738e97f4a34e2783"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-intl-grapheme/zipball/81b86b50cf841a64252b439e738e97f4a34e2783",
                "reference": "81b86b50cf841a64252b439e738e97f4a34e2783",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "suggest": {
                "ext-intl": "For best performance"
            },
            "time": "2021-11-23T21:10:46+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.23-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Intl\\Grapheme\\": ""
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill for intl's grapheme_* functions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "grapheme",
                "intl",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-intl-grapheme/tree/v1.25.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/polyfill-intl-grapheme"
        },
        {
            "name": "symfony/polyfill-intl-normalizer",
            "version": "v1.25.0",
            "version_normalized": "1.25.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-intl-normalizer.git",
                "reference": "8590a5f561694770bdcd3f9b5c69dde6945028e8"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-intl-normalizer/zipball/8590a5f561694770bdcd3f9b5c69dde6945028e8",
                "reference": "8590a5f561694770bdcd3f9b5c69dde6945028e8",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "suggest": {
                "ext-intl": "For best performance"
            },
            "time": "2021-02-19T12:13:01+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.23-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Intl\\Normalizer\\": ""
                },
                "classmap": [
                    "Resources/stubs"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill for intl's Normalizer class and related functions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "intl",
                "normalizer",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-intl-normalizer/tree/v1.25.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/polyfill-intl-normalizer"
        },
        {
            "name": "symfony/polyfill-mbstring",
            "version": "v1.25.0",
            "version_normalized": "1.25.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-mbstring.git",
                "reference": "0abb51d2f102e00a4eefcf46ba7fec406d245825"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-mbstring/zipball/0abb51d2f102e00a4eefcf46ba7fec406d245825",
                "reference": "0abb51d2f102e00a4eefcf46ba7fec406d245825",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "provide": {
                "ext-mbstring": "*"
            },
            "suggest": {
                "ext-mbstring": "For best performance"
            },
            "time": "2021-11-30T18:21:41+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.23-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Mbstring\\": ""
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill for the Mbstring extension",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "mbstring",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-mbstring/tree/v1.25.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/polyfill-mbstring"
        },
        {
            "name": "symfony/polyfill-php72",
            "version": "v1.25.0",
            "version_normalized": "1.25.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-php72.git",
                "reference": "9a142215a36a3888e30d0a9eeea9766764e96976"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-php72/zipball/9a142215a36a3888e30d0a9eeea9766764e96976",
                "reference": "9a142215a36a3888e30d0a9eeea9766764e96976",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "time": "2021-05-27T09:17:38+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.23-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Php72\\": ""
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill backporting some PHP 7.2+ features to lower PHP versions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-php72/tree/v1.25.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/polyfill-php72"
        },
        {
            "name": "symfony/polyfill-php73",
            "version": "v1.25.0",
            "version_normalized": "1.25.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-php73.git",
                "reference": "cc5db0e22b3cb4111010e48785a97f670b350ca5"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-php73/zipball/cc5db0e22b3cb4111010e48785a97f670b350ca5",
                "reference": "cc5db0e22b3cb4111010e48785a97f670b350ca5",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "time": "2021-06-05T21:20:04+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.23-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Php73\\": ""
                },
                "classmap": [
                    "Resources/stubs"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill backporting some PHP 7.3+ features to lower PHP versions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-php73/tree/v1.25.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/polyfill-php73"
        },
        {
            "name": "symfony/polyfill-php80",
            "version": "v1.25.0",
            "version_normalized": "1.25.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-php80.git",
                "reference": "4407588e0d3f1f52efb65fbe92babe41f37fe50c"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-php80/zipball/4407588e0d3f1f52efb65fbe92babe41f37fe50c",
                "reference": "4407588e0d3f1f52efb65fbe92babe41f37fe50c",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "time": "2022-03-04T08:16:47+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.23-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Php80\\": ""
                },
                "classmap": [
                    "Resources/stubs"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Ion Bazan",
                    "email": "ion.bazan@gmail.com"
                },
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill backporting some PHP 8.0+ features to lower PHP versions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-php80/tree/v1.25.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/polyfill-php80"
        },
        {
            "name": "symfony/polyfill-php81",
            "version": "v1.25.0",
            "version_normalized": "1.25.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/polyfill-php81.git",
                "reference": "5de4ba2d41b15f9bd0e19b2ab9674135813ec98f"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/polyfill-php81/zipball/5de4ba2d41b15f9bd0e19b2ab9674135813ec98f",
                "reference": "5de4ba2d41b15f9bd0e19b2ab9674135813ec98f",
                "shasum": ""
            },
            "require": {
                "php": ">=7.1"
            },
            "time": "2021-09-13T13:58:11+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "1.23-dev"
                },
                "thanks": {
                    "name": "symfony/polyfill",
                    "url": "https://github.com/symfony/polyfill"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "bootstrap.php"
                ],
                "psr-4": {
                    "Symfony\\Polyfill\\Php81\\": ""
                },
                "classmap": [
                    "Resources/stubs"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Symfony polyfill backporting some PHP 8.1+ features to lower PHP versions",
            "homepage": "https://symfony.com",
            "keywords": [
                "compatibility",
                "polyfill",
                "portable",
                "shim"
            ],
            "support": {
                "source": "https://github.com/symfony/polyfill-php81/tree/v1.25.0"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/polyfill-php81"
        },
        {
            "name": "symfony/process",
            "version": "v5.4.8",
            "version_normalized": "5.4.8.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/process.git",
                "reference": "597f3fff8e3e91836bb0bd38f5718b56ddbde2f3"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/process/zipball/597f3fff8e3e91836bb0bd38f5718b56ddbde2f3",
                "reference": "597f3fff8e3e91836bb0bd38f5718b56ddbde2f3",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.5",
                "symfony/polyfill-php80": "^1.16"
            },
            "time": "2022-04-08T05:07:18+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\Process\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Executes commands in sub-processes",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/process/tree/v5.4.8"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/process"
        },
        {
            "name": "symfony/service-contracts",
            "version": "v2.5.1",
            "version_normalized": "2.5.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/service-contracts.git",
                "reference": "24d9dc654b83e91aa59f9d167b131bc3b5bea24c"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/service-contracts/zipball/24d9dc654b83e91aa59f9d167b131bc3b5bea24c",
                "reference": "24d9dc654b83e91aa59f9d167b131bc3b5bea24c",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.5",
                "psr/container": "^1.1",
                "symfony/deprecation-contracts": "^2.1|^3"
            },
            "conflict": {
                "ext-psr": "<1.1|>=2"
            },
            "suggest": {
                "symfony/service-implementation": ""
            },
            "time": "2022-03-13T20:07:29+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-main": "2.5-dev"
                },
                "thanks": {
                    "name": "symfony/contracts",
                    "url": "https://github.com/symfony/contracts"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Symfony\\Contracts\\Service\\": ""
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Generic abstractions related to writing services",
            "homepage": "https://symfony.com",
            "keywords": [
                "abstractions",
                "contracts",
                "decoupling",
                "interfaces",
                "interoperability",
                "standards"
            ],
            "support": {
                "source": "https://github.com/symfony/service-contracts/tree/v2.5.1"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/service-contracts"
        },
        {
            "name": "symfony/stopwatch",
            "version": "v5.4.5",
            "version_normalized": "5.4.5.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/stopwatch.git",
                "reference": "4d04b5c24f3c9a1a168a131f6cbe297155bc0d30"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/stopwatch/zipball/4d04b5c24f3c9a1a168a131f6cbe297155bc0d30",
                "reference": "4d04b5c24f3c9a1a168a131f6cbe297155bc0d30",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.5",
                "symfony/service-contracts": "^1|^2|^3"
            },
            "time": "2022-02-18T16:06:09+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Symfony\\Component\\Stopwatch\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Fabien Potencier",
                    "email": "fabien@symfony.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Provides a way to profile code",
            "homepage": "https://symfony.com",
            "support": {
                "source": "https://github.com/symfony/stopwatch/tree/v5.4.5"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/stopwatch"
        },
        {
            "name": "symfony/string",
            "version": "v5.4.9",
            "version_normalized": "5.4.9.0",
            "source": {
                "type": "git",
                "url": "https://github.com/symfony/string.git",
                "reference": "985e6a9703ef5ce32ba617c9c7d97873bb7b2a99"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/symfony/string/zipball/985e6a9703ef5ce32ba617c9c7d97873bb7b2a99",
                "reference": "985e6a9703ef5ce32ba617c9c7d97873bb7b2a99",
                "shasum": ""
            },
            "require": {
                "php": ">=7.2.5",
                "symfony/polyfill-ctype": "~1.8",
                "symfony/polyfill-intl-grapheme": "~1.0",
                "symfony/polyfill-intl-normalizer": "~1.0",
                "symfony/polyfill-mbstring": "~1.0",
                "symfony/polyfill-php80": "~1.15"
            },
            "conflict": {
                "symfony/translation-contracts": ">=3.0"
            },
            "require-dev": {
                "symfony/error-handler": "^4.4|^5.0|^6.0",
                "symfony/http-client": "^4.4|^5.0|^6.0",
                "symfony/translation-contracts": "^1.1|^2",
                "symfony/var-exporter": "^4.4|^5.0|^6.0"
            },
            "time": "2022-04-19T10:40:37+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "files": [
                    "Resources/functions.php"
                ],
                "psr-4": {
                    "Symfony\\Component\\String\\": ""
                },
                "exclude-from-classmap": [
                    "/Tests/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Nicolas Grekas",
                    "email": "p@tchwork.com"
                },
                {
                    "name": "Symfony Community",
                    "homepage": "https://symfony.com/contributors"
                }
            ],
            "description": "Provides an object-oriented API to strings and deals with bytes, UTF-8 code points and grapheme clusters in a unified way",
            "homepage": "https://symfony.com",
            "keywords": [
                "grapheme",
                "i18n",
                "string",
                "unicode",
                "utf-8",
                "utf8"
            ],
            "support": {
                "source": "https://github.com/symfony/string/tree/v5.4.9"
            },
            "funding": [
                {
                    "url": "https://symfony.com/sponsor",
                    "type": "custom"
                },
                {
                    "url": "https://github.com/fabpot",
                    "type": "github"
                },
                {
                    "url": "https://tidelift.com/funding/github/packagist/symfony/symfony",
                    "type": "tidelift"
                }
            ],
            "install-path": "../symfony/string"
        },
        {
            "name": "tecnickcom/tcpdf",
            "version": "6.4.4",
            "version_normalized": "6.4.4.0",
            "source": {
                "type": "git",
                "url": "https://github.com/tecnickcom/TCPDF.git",
                "reference": "42cd0f9786af7e5db4fcedaa66f717b0d0032320"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/tecnickcom/TCPDF/zipball/42cd0f9786af7e5db4fcedaa66f717b0d0032320",
                "reference": "42cd0f9786af7e5db4fcedaa66f717b0d0032320",
                "shasum": ""
            },
            "require": {
                "php": ">=5.3.0"
            },
            "time": "2021-12-31T08:39:24+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "config",
                    "include",
                    "tcpdf.php",
                    "tcpdf_parser.php",
                    "tcpdf_import.php",
                    "tcpdf_barcodes_1d.php",
                    "tcpdf_barcodes_2d.php",
                    "include/tcpdf_colors.php",
                    "include/tcpdf_filters.php",
                    "include/tcpdf_font_data.php",
                    "include/tcpdf_fonts.php",
                    "include/tcpdf_images.php",
                    "include/tcpdf_static.php",
                    "include/barcodes/datamatrix.php",
                    "include/barcodes/pdf417.php",
                    "include/barcodes/qrcode.php"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "LGPL-3.0-only"
            ],
            "authors": [
                {
                    "name": "Nicola Asuni",
                    "email": "info@tecnick.com",
                    "role": "lead"
                }
            ],
            "description": "TCPDF is a PHP class for generating PDF documents and barcodes.",
            "homepage": "http://www.tcpdf.org/",
            "keywords": [
                "PDFD32000-2008",
                "TCPDF",
                "barcodes",
                "datamatrix",
                "pdf",
                "pdf417",
                "qrcode"
            ],
            "support": {
                "issues": "https://github.com/tecnickcom/TCPDF/issues",
                "source": "https://github.com/tecnickcom/TCPDF/tree/6.4.4"
            },
            "funding": [
                {
                    "url": "https://www.paypal.com/cgi-bin/webscr?cmd=_donations&currency_code=GBP&business=paypal@tecnick.com&item_name=donation%20for%20tcpdf%20project",
                    "type": "custom"
                }
            ],
            "install-path": "../tecnickcom/tcpdf"
        },
        {
            "name": "theseer/tokenizer",
            "version": "1.2.1",
            "version_normalized": "1.2.1.0",
            "source": {
                "type": "git",
                "url": "https://github.com/theseer/tokenizer.git",
                "reference": "34a41e998c2183e22995f158c581e7b5e755ab9e"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/theseer/tokenizer/zipball/34a41e998c2183e22995f158c581e7b5e755ab9e",
                "reference": "34a41e998c2183e22995f158c581e7b5e755ab9e",
                "shasum": ""
            },
            "require": {
                "ext-dom": "*",
                "ext-tokenizer": "*",
                "ext-xmlwriter": "*",
                "php": "^7.2 || ^8.0"
            },
            "time": "2021-07-28T10:34:58+00:00",
            "type": "library",
            "installation-source": "dist",
            "autoload": {
                "classmap": [
                    "src/"
                ]
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "BSD-3-Clause"
            ],
            "authors": [
                {
                    "name": "Arne Blankerts",
                    "email": "arne@blankerts.de",
                    "role": "Developer"
                }
            ],
            "description": "A small library for converting tokenized PHP source code into XML and potentially other formats",
            "support": {
                "issues": "https://github.com/theseer/tokenizer/issues",
                "source": "https://github.com/theseer/tokenizer/tree/1.2.1"
            },
            "funding": [
                {
                    "url": "https://github.com/theseer",
                    "type": "github"
                }
            ],
            "install-path": "../theseer/tokenizer"
        },
        {
            "name": "webmozart/assert",
            "version": "1.10.0",
            "version_normalized": "1.10.0.0",
            "source": {
                "type": "git",
                "url": "https://github.com/webmozarts/assert.git",
                "reference": "6964c76c7804814a842473e0c8fd15bab0f18e25"
            },
            "dist": {
                "type": "zip",
                "url": "https://api.github.com/repos/webmozarts/assert/zipball/6964c76c7804814a842473e0c8fd15bab0f18e25",
                "reference": "6964c76c7804814a842473e0c8fd15bab0f18e25",
                "shasum": ""
            },
            "require": {
                "php": "^7.2 || ^8.0",
                "symfony/polyfill-ctype": "^1.8"
            },
            "conflict": {
                "phpstan/phpstan": "<0.12.20",
                "vimeo/psalm": "<4.6.1 || 4.6.2"
            },
            "require-dev": {
                "phpunit/phpunit": "^8.5.13"
            },
            "time": "2021-03-09T10:59:23+00:00",
            "type": "library",
            "extra": {
                "branch-alias": {
                    "dev-master": "1.10-dev"
                }
            },
            "installation-source": "dist",
            "autoload": {
                "psr-4": {
                    "Webmozart\\Assert\\": "src/"
                }
            },
            "notification-url": "https://packagist.org/downloads/",
            "license": [
                "MIT"
            ],
            "authors": [
                {
                    "name": "Bernhard Schussek",
                    "email": "bschussek@gmail.com"
                }
            ],
            "description": "Assertions to validate method input/output with nice error messages.",
            "keywords": [
                "assert",
                "check",
                "validate"
            ],
            "support": {
                "issues": "https://github.com/webmozarts/assert/issues",
                "source": "https://github.com/webmozarts/assert/tree/1.10.0"
            },
            "install-path": "../webmozart/assert"
        }
    ],
    "dev": true,
    "dev-package-names": [
        "codeigniter/coding-standard",
        "composer/pcre",
        "composer/semver",
        "composer/xdebug-handler",
        "doctrine/annotations",
        "doctrine/instantiator",
        "doctrine/lexer",
        "fakerphp/faker",
        "friendsofphp/php-cs-fixer",
        "mikey179/vfsstream",
        "myclabs/deep-copy",
        "nexusphp/cs-config",
        "nexusphp/tachycardia",
        "nikic/php-parser",
        "phar-io/manifest",
        "phar-io/version",
        "php-cs-fixer/diff",
        "phpdocumentor/reflection-common",
        "phpdocumentor/reflection-docblock",
        "phpdocumentor/type-resolver",
        "phpspec/prophecy",
        "phpstan/phpstan",
        "phpunit/php-code-coverage",
        "phpunit/php-file-iterator",
        "phpunit/php-invoker",
        "phpunit/php-text-template",
        "phpunit/php-timer",
        "phpunit/phpunit",
        "predis/predis",
        "psr/cache",
        "psr/container",
        "psr/event-dispatcher",
        "rector/rector",
        "sebastian/cli-parser",
        "sebastian/code-unit",
        "sebastian/code-unit-reverse-lookup",
        "sebastian/comparator",
        "sebastian/complexity",
        "sebastian/diff",
        "sebastian/environment",
        "sebastian/exporter",
        "sebastian/global-state",
        "sebastian/lines-of-code",
        "sebastian/object-enumerator",
        "sebastian/object-reflector",
        "sebastian/recursion-context",
        "sebastian/resource-operations",
        "sebastian/type",
        "sebastian/version",
        "symfony/console",
        "symfony/deprecation-contracts",
        "symfony/event-dispatcher",
        "symfony/event-dispatcher-contracts",
        "symfony/filesystem",
        "symfony/finder",
        "symfony/options-resolver",
        "symfony/polyfill-ctype",
        "symfony/polyfill-intl-grapheme",
        "symfony/polyfill-intl-normalizer",
        "symfony/polyfill-mbstring",
        "symfony/polyfill-php72",
        "symfony/polyfill-php73",
        "symfony/polyfill-php80",
        "symfony/polyfill-php81",
        "symfony/process",
        "symfony/service-contracts",
        "symfony/stopwatch",
        "symfony/string",
        "theseer/tokenizer",
        "webmozart/assert"
    ]
}