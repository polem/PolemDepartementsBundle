# PolemDepartementsBundle [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/polem/PolemDepartementsBundle/badges/quality-score.png?s=603c99397ac6adc8465f54dbca67135a1386c3fb)](https://scrutinizer-ci.com/g/polem/PolemDepartementsBundle/) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/590e28d6-504b-413e-95a2-445422ca0e7d/mini.png)](https://insight.sensiolabs.com/projects/590e28d6-504b-413e-95a2-445422ca0e7d) [![Build Status](https://travis-ci.org/polem/PolemDepartementsBundle.svg?branch=master)](https://travis-ci.org/polem/PolemDepartementsBundle)

French departements bundle

## Installation

`php composer.phar require polem/departements-bundle:0.*`

And add bundle to you `AppKernel`

```php
      $bundles = array(
            //...
            new Polem\DepartementsBundle\PolemDepartementsBundle()
            //...
      )
```

### Routing

```
polem_departements:
    resource: "@PolemDepartementsBundle/Resources/config/routing.yml"
    prefix:   /
```


