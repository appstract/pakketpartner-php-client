<?php

namespace Appstract\Pakketpartner;

use Jenssegers\Model\Model;

class Entity extends Model
{
    protected $connection;

    public function __construct(Connection $connection, $attributes = [])
    {
        $this->connection = $connection;

        $this->fill($attributes);
    }

    public function connection()
    {
        return $this->connection;
    }

    public function endpoint()
    {
        return $this->endpoint;
    }

    public function attributes()
    {
        return $this->attributes;
    }

    public function find($id)
    {
        return $this->makeFromResponse(
            $this->connection()->get($this->endpoint().'/'.urlencode($id))
        );
    }

    public function all($requestParams = [])
    {
        return $this->collectionFromResponse(
            $this->connection()->get($this->endpoint(), $requestParams, true)
        );
    }

    public function save()
    {
        return $this->selfFromResponse(
            $this->connection()->post($this->endpoint(), $this->attributes)
        );
    }

    public function makeFromResponse($response)
    {
        $entity = new static($this->connection);

        $entity->selfFromResponse($response);

        return $entity;
    }

    public function selfFromResponse($response)
    {
        $this->fill($response);

        return $this;
    }

    public function collectionFromResponse(array $response)
    {
        if ((bool) count(array_filter(array_keys($response), 'is_string'))) {
            $response = [$response];
        }

        $collection = [];

        foreach ($response as $item) {
            $collection[] = $this->makeFromResponse($item);
        }

        return $collection;
    }
}
