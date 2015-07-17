<?php
/**
 * Author: Michaël VEROUX
 * Date: 12/11/14
 * Time: 22:23
 */

namespace Mv\PostalAddress\Address;

/**
 * Interface PostalAddressInterface
 * @package Mv\PostalAddress\Address
 * @author Michaël VEROUX
 */
interface PostalAddressInterface
{
    /**
     * @param string $city
     * @return $this
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $civility
     * @return $this
     */
    public function setCivility($civility);

    /**
     * @return string
     */
    public function getCivility();

    /**
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname);

    /**
     * @return string
     */
    public function getFirstname();

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $service
     * @return $this
     */
    public function setService($service);

    /**
     * @return string
     */
    public function getService();

    /**
     * @param string $society
     * @return $this
     */
    public function setSociety($society);

    /**
     * @return string
     */
    public function getSociety();

    /**
     * @param string $streetName
     * @return $this
     */
    public function setStreetName($streetName);

    /**
     * @return string
     */
    public function getStreetName();

    /**
     * @param string $streetNumber
     * @return $this
     */
    public function setStreetNumber($streetNumber);

    /**
     * @return string
     */
    public function getStreetNumber();

    /**
     * @param string $streetType
     * @return $this
     */
    public function setStreetType($streetType);

    /**
     * @return string
     */
    public function getStreetType();

    /**
     * @param string $zipCode
     * @return $this
     */
    public function setZipCode($zipCode);

    /**
     * @return string
     */
    public function getZipCode();

    /**
     * @return string
     * @author Michaël VEROUX
     */
    public function getPostalFormatted();
} 