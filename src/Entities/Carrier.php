<?php

namespace Appstract\Pakketpartner\Entities;

use Appstract\Pakketpartner\Connection;
use Appstract\Pakketpartner\Entity;

class Carrier extends Entity
{
    protected $connection;

    protected $endpoint = 'carriers';
}
