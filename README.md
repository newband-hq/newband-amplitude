# Newband Amplitude Bundle

### Version
1.0.0

### Installation

First add the dependencie to your `composer.json` file:

    "require": {
        ...
        "newband/amplitude": "~1.0"
    },

Then install the bundle with the command:

    php composer update

Enable the bundle in your application kernel:

    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Newband\Amplitude\NewbandAmplitudeBundle(),
        );
    }