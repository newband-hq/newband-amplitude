<?php

namespace Newband\Amplitude\Message;

/**
 * Class Event
 * @package Newband\Amplitude\Message
 * @author Zafar <zafar@newband.com>
 */
class Event extends Message
{
    /**
     * @var Identity
     */
    protected $identity;

    /**
     * @var string
     */
    protected $eventType;

    /**
     * @var long
     */
    protected $time;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var float
     */
    protected $revenue;

    /**
     * @var string
     */
    protected $productId;

    /**
     * @var string
     */
    protected $revenueType;

    /**
     * @var float
     */
    protected $locationLat;

    /**
     * @var float
     */
    protected $locationLng;

    /**
     * @var string
     */
    protected $ip;

    /**
     * @var string
     */
    protected $idfa;

    /**
     * @var string
     */
    protected $adid;

    /**
     * @var int
     */
    protected $sessionId;

    /**
     * @var array
     */
    protected $eventProperties = array();

    /**
     * @param Identity $identity
     */
    public function setIdentity(Identity $identity)
    {
        $this->identity = $identity;
    }

    /**
     * @return Identity
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function addToEventProperties($name, $value)
    {
        $this->eventProperties[$name] = $value;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function format()
    {
        return json_encode(
            array(
                'event_type' => $this->getEventType(),
                'time' => $this->getTime(),
                'event_properties' => $this->getEventProperties(),
                'user_id' => $this->getIdentity()->getUserId(),
                'device_id' => $this->getIdentity()->getDeviceId(),
                'user_properties' => $this->getIdentity()->getUserProperties(),
                'app_version' => $this->getIdentity()->getAppVersion(),
                'platform' => $this->getIdentity()->getPlatform(),
                'os_name' => $this->getIdentity()->getOsName(),
                'os_version' => $this->getIdentity()->getOsVersion(),
                'device_brand' => $this->getIdentity()->getDeviceBrand(),
                'device_manufacturer' => $this->getIdentity()->getDeviceManufacturer(),
                'device_model' => $this->getIdentity()->getDeviceModel(),
                'device_type' => $this->getIdentity()->getDeviceType(),
                'carrier' => $this->getIdentity()->getCarrier(),
                'country' => $this->getIdentity()->getCountry(),
                'region' => $this->getIdentity()->getRegion(),
                'city' => $this->getIdentity()->getCity(),
                'dma' => $this->getIdentity()->getDma(),
                'language' => $this->getIdentity()->getLanguage(),
                'revenue' => $this->getRevenue(),
                'location_lat' => $this->getLocationLat(),
                'location_lng' => $this->getLocationLng(),
                'ip' => $this->getIp(),
                'idfa' => $this->getIdfa(),
                'adid' => $this->getAdid(),
                'session_id' => $this->getSessionId(),
            )
        );
    }
}