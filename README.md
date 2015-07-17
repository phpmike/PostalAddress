Postal Address Library PHP
==========================

This library provide objects address, particulary for french address to have it in AFNOR XPZ 10-011 format output.

Install with composer
---------------------

```bash
php composer.phar require mv/postal-address
```

Example
-------

```php
use Mv\PostalAddress\Address\French\Address as FrenchAddress;

$address = new FrenchAddress();

$address->setSociety('Ma Société');
$address->setService('Service compta');
$address->setStreetNumber('1 bis');
$address->setStreetType('Avenue');
$address->setStreetName('de la République');
$address->setBat('ZI des industries');
$address->setZipCode('75011');
$address->setCity('Paris');

echo $address;
```

This returns:

```
Ma Société
Service compta
ZI des industries
1 bis Avenue de la République
75011 Paris
```

Warning
-------

This will throw Mv\PostalAddress\Exception\WrongAddressException when you try to set a property that is incompatible this another already set.

To be improved...