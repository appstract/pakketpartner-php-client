<?php

namespace Appstract\Pakketpartner\Entities;

use Appstract\Pakketpartner\Connection;
use Appstract\Pakketpartner\Entity;

class Sender extends Entity
{
    protected $connection;

    protected $endpoint = 'senders';
}
