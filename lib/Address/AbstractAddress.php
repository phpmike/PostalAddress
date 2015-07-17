<?php
/**
 * Author: Michaël VEROUX
 * Date: 12/11/14
 * Time: 22:22
 */

namespace Mv\PostalAddress\Address;

use Mv\PostalAddress\Exception\WrongAddressException;

/**
 * Class AbstractAddress
 * @package Mv\PostalAddress\Address
 * @author Michaël VEROUX
 */
abstract class AbstractAddress implements PostalAddressInterface
{
    /**
     * @var string
     */
    protected $civility = '';

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $firstname = '';

    /**
     * @var string
     */
    protected $society = '';

    /**
     * @var string
     */
    protected $service = '';

    /**
     * @var string
     */
    protected $streetNumber = '';

    /**
     * @var string
     */
    protected $streetType = '';

    /**
     * @var string
     */
    protected $streetName = '';

    /**
     * @var string
     */
    protected $zipCode = '';

    /**
     * @var string
     */
    protected $city = '';

    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $civility
     * @return $this
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;

        return $this;
    }

    /**
     * @return string
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $service
     * @return $this
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $society
     * @return $this
     */
    public function setSociety($society)
    {
        $this->society = $society;

        return $this;
    }

    /**
     * @return string
     */
    public function getSociety()
    {
        return $this->society;
    }

    /**
     * @param string $streetName
     * @return $this
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @param string $streetNumber
     * @return $this
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param string $streetType
     * @return $this
     */
    public function setStreetType($streetType)
    {
        $this->streetType = $streetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetType()
    {
        return $this->streetType;
    }

    /**
     * @param string $zipCode
     * @return $this
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
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
        }

        // Line 3
        $address[] = sprintf('%s %s %s', $this->getStreetNumber(), $this->getStreetType(), $this->getStreetName());

        // Line 4
        $address[] = sprintf('%s %s', $this->getZipCode(), $this->getCity());

        $addressfiltered = array_filter($address, function ($value){
            return '' !== $value;
        }
        );

        return implode(PHP_EOL, $addressfiltered);
    }

    /**
     * @return string
     * @author Michaël VEROUX
     */
    public function __toString()
    {
        return $this->getPostalFormatted();
    }

    /**
     * @param $property
     * @throws WrongAddressException
     * @author Michaël VEROUX
     */
    protected function emptyConstraintOn($property)
    {
        if('' !== $this->$property) {
            throw new WrongAddressException('This address can\'t be right!');
        }
    }
} 