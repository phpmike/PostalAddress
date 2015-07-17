<?php
/**
 * Author: Michaël VEROUX
 * Date: 12/11/14
 * Time: 22:26
 */

namespace Mv\PostalAddress\Address\French;

use Mv\PostalAddress\Address\AbstractAddress;

/**
 * Class Address
 *
 * norme Afnor XPZ 10-011
 *
 * @package Mv\PostalAddress\French
 * @author Michaël VEROUX
 */
class Address extends AbstractAddress
{
    /**
     * App ou Bal - étage - couloir - esc
     * @var string
     */
    protected $app = '';

    /**
     * Entrée, immeuble, bâtiment, résidence, ZI
     * @var string
     */
    protected $bat = '';

    /**
     * Lieu-dit, service de distribution, commune géographique, mention spéciale
     * @var string
     */
    protected $cityGeo = '';

    /**
     * @param string $app
     * @return $this
     */
    public function setApp($app)
    {
        $this->emptyConstraintOn('society');
        $this->emptyConstraintOn('service');

        $this->app = $app;

        return $this;
    }

    /**
     * @return string
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @param string $bat
     * @return $this
     */
    public function setBat($bat)
    {
        $this->bat = $bat;

        return $this;
    }

    /**
     * @return string
     */
    public function getBat()
    {
        return $this->bat;
    }

    /**
     * @param string $cityGeo
     * @return $this
     */
    public function setCityGeo($cityGeo)
    {
        $this->cityGeo = $cityGeo;

        return $this;
    }

    /**
     * @return string
     */
    public function getCityGeo()
    {
        return $this->cityGeo;
    }

    /**
     * @param string $society
     * @return $this
     * @author Michaël VEROUX
     */
    public function setSociety($society)
    {
        $this->emptyConstraintOn('name');
        $this->emptyConstraintOn('firstname');
        $this->emptyConstraintOn('civility');

        return parent::setSociety($society);
    }

    /**
     * @param string $service
     * @return $this
     * @author Michaël VEROUX
     */
    public function setService($service)
    {
        $this->emptyConstraintOn('app');
        $this->emptyConstraintOn('name');
        $this->emptyConstraintOn('firstname');
        $this->emptyConstraintOn('civility');

        return parent::setService($service);
    }

    /**
     * @param string $civility
     * @return $this
     * @author Michaël VEROUX
     */
    public function setCivility($civility)
    {
        $this->emptyConstraintOn('society');

        return parent::setCivility($civility);
    }

    /**
     * @param string $firstname
     * @return $this
     * @author Michaël VEROUX
     */
    public function setFirstname($firstname)
    {
        $this->emptyConstraintOn('society');

        return parent::setFirstname($firstname);
    }

    /**
     * @param string $name
     * @return $this
     * @author Michaël VEROUX
     */
    public function setName($name)
    {
        $this->emptyConstraintOn('society');

        return parent::setName($name);
    }

    /**
     * @return string
     * @author Michaël VEROUX
     */
    public function getPostalFormatted()
    {
        $address = array();

        // Line 1
        if('' !== $this->getSociety()) {
            $address[] = $this->getSociety();
        } else {
            $address[] = sprintf('%s %s %s', $this->getCivility(), $this->getFirstname(), $this->getName());
        }

        // Line 2
        if('' !== $this->getService()) {
            $address[] = $this->getService();
        } else {
            $address[] = $this->getApp();
        }

        // Line 3
        $address[] = $this->getBat();

        // Line 4
        $address[] = sprintf('%s %s %s', $this->getStreetNumber(), $this->getStreetType(), $this->getStreetName());

        // Line 5
        $address[] = $this->getCity() !== $this->getCityGeo() ? $this->getCityGeo() : '';

        // Line 6
        $address[] = sprintf('%s %s', $this->getZipCode(), $this->getCity());

        $addressfiltered = array_filter($address, function ($value){
            return '' !== $value;
        }
        );

        return implode(PHP_EOL, $addressfiltered);
    }
} 