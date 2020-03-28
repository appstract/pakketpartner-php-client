<?php

namespace Appstract\Pakketpartner;

use Appstract\Pakketpartner\Entities\Carrier;
use Appstract\Pakketpartner\Entities\CarrierService;
use Appstract\Pakketpartner\Entities\Label;
use Appstract\Pakketpartner\Entities\PickupPoint;
use Appstract\Pakketpartner\Entities\Sender;
use Appstract\Pakketpartner\Entities\Shipment;

class Pakketpartner
{
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function carrier($attributes = [])
    {
        return new Carrier($this->connection, $attributes);
    }

    public function carrierService($attributes = [])
    {
        return new CarrierService($this->connection, $attributes);
    }

    public function shipment($attributes = [])
    {
        return new Shipment($this->connection, $attributes);
    }

    public function label($attributes = [])
    {
        return new Label($this->connection, $attributes);
    }

    public function pickupPoint($attributes = [])
    {
        return new PickupPoint($this->connection, $attributes);
    }

    public function sender($attributes = [])
    {
        return new Sender($this->connection, $attributes);
    }
}
