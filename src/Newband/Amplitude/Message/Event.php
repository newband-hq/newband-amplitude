<?php

namespace Newband\Amplitude\Message;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Event
 * @package Newband\Amplitude\Message
 * @author Zafar <zafar@newband.com>
 */
class Event extends Message
{
    /**
     * @Serializer\Type("Newband\Amplitude\Message\Identity")
     *
     * @var Identity
     */
    protected $identity;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $eventType;

    /**
     * @Serializer\Type("integer")
     *
     * @var long
     */
    protected $time;

    /**
     * @Serializer\Type("double")
     *
     * @var float
     */
    protected $price;

    /**
     * @Serializer\Type("integer")
     *
     * @var int
     */
    protected $quantity;

    /**
     * @Serializer\Type("double")
     *
     * @var float
     */
    protected $revenue;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $productId;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $revenueType;

    /**
     * @Serializer\Type("double")
     *
     * @var float
     */
    protected $locationLat;

    /**
     * @Serializer\Type("double")
     *
     * @var float
     */
    protected $locationLng;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $ip;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $idfa;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $adid;

    /**
     * @Serializer\Type("integer")
     *
     * @var int
     */
    protected $sessionId;

    /**
     * @Serializer\Type("array")
     *
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