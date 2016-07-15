<?php

namespace Newband\Amplitude\Message;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Identity
 * @package Newband\Amplitude\Message
 * @author Zafar <zafar@newband.com>
 */
class Identity extends Message
{
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $userId;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $deviceId;

    /**
     * @Serializer\Type("array")
     *
     * @var array
     */
    protected $userProperties = array();

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $appVersion;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $platform;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $osName;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $osVersion;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $deviceBrand;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $deviceManufacture;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $deviceModel;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $deviceType;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $carrier;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $country;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $region;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $city;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $dma;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $language;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $paying;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    protected $startVersion;

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function addToUserProperties($name, $value)
    {
        $this->userProperties[$name] = $value;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function format()
    {
        return json_encode(
            array(
                'user_id' => $this->getUserId(),
                'device_id' => $this->getDeviceId(),
                'user_properties' => $this->getUserProperties(),
                'app_version' => $this->getAppVersion(),
                'platform' => $this->getPlatform(),
                'os_name' => $this->getOsName(),
                'os_version' => $this->getOsVersion(),
                'device_brand' => $this->getDeviceBrand(),
                'device_manufacturer' => $this->getDeviceManufacturer(),
                'device_model' => $this->getDeviceModel(),
                'device_type' => $this->getDeviceType(),
                'carrier' => $this->getCarrier(),
                'country' => $this->getCountry(),
                'region' => $this->getRegion(),
                'city' => $this->getCity(),
                'dma' => $this->getDma(),
                'language' => $this->getLanguage(),
                'startVersion' => $this->getStartVersion()
            )
        );
    }
}