<?php

namespace Appstract\Pakketpartner\Entities;

use Appstract\Pakketpartner\Connection;
use Appstract\Pakketpartner\Entity;

class PickupPoint extends Entity
{
    protected $connection;

    protected $endpoint = 'pick_up_points';
}
