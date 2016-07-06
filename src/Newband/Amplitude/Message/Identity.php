<?php

namespace Newband\Amplitude\Message;

/**
 * Class Identity
 * @package Newband\Amplitude\Message
 * @author Zafar <zafar@newband.com>
 */
class Identity extends Message
{
    /**
     * @var string
     */
    protected $userId;

    /**
     * @var string
     */
    protected $deviceId;

    /**
     * @var array
     */
    protected $userProperties = array();

    /**
     * @var string
     */
    protected $appVersion;

    /**
     * @var string
     */
    protected $platform;

    /**
     * @var string
     */
    protected $osName;

    /**
     * @var string
     */
    protected $osVersion;

    /**
     * @var string
     */
    protected $deviceBrand;

    /**
     * @var string
     */
    protected $deviceManufacture;

    /**
     * @var string
     */
    protected $deviceModel;

    /**
     * @var string
     */
    protected $deviceType;

    /**
     * @var string
     */
    protected $carrier;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $dma;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $paying;

    /**
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