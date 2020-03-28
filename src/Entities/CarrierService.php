<?php

namespace Appstract\Pakketpartner\Entities;

use Appstract\Pakketpartner\Connection;
use Appstract\Pakketpartner\Entity;

class CarrierService extends Entity
{
    protected $connection;

    protected $endpoint = 'carrier_services';
}
