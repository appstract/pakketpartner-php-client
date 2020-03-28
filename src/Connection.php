<?php

namespace Appstract\Pakketpartner;

use Appstract\Pakketpartner\Exceptions\ApiException;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class Connection
{
    /**
     * @var string
     */
    private $apiUrl = 'https://dashboard.pakketpartner.nl/api/v1';

    /**
     * @var string
     */
    private $apiToken;

    /**
     * @var Client
     */
    private $client;

    /**
     * @param mixed $apiToken
     */
    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;
    }

    /**
     * [get description].
     * @param  [type]  $url      [description]
     * @param  array   $requestParams   [description]
     * @param  bool $fetchAll [description]
     * @return [type]            [description]
     */
    public function get($url, array $requestParams = [])
    {
        try {
            $request = $this->createRequest(
                'GET', $this->formatUrl($url, 'get'), null, $requestParams
            );

            $response = $this->client()->send($request);

            return $this->parseResponse($response);
        } catch (Exception $e) {
            throw new ApiException($e->getMessage());
        }
    }

    /**
     * @param string $url
     * @param string $body
     *
     * @return mixed
     * @throws ApiException
     */
    public function post($url, $body)
    {
        try {
            $request = $this->createRequest(
                'POST', $this->formatUrl($url, 'post'), $body
            );

            $response = $this->client()->send($request);

            return $this->parseResponse($response);
        } catch (Exception $e) {
            throw new ApiException($e->getMessage());
        }
    }

    /**
     * @param string $url
     * @param string $body
     * @return mixed
     * @throws ApiException
     */
    public function patch($url, $body)
    {
        try {
            $request = $this->createRequest(
                'PATCH', $this->formatUrl($url, 'patch'), $body
            );

            $response = $this->client()->send($request);

            return $this->parseResponse($response);
        } catch (Exception $e) {
            throw new ApiException($e->getMessage());
        }
    }

    /**
     * @return Client
     */
    private function client()
    {
        if ($this->client) {
            return $this->client;
        }

        $this->client = new Client([
            'http_errors' => true,
            'expect' => false,
            'auth' => [$this->apiToken, ''],
        ]);

        return $this->client;
    }

    private function createRequest(
        $method,
        $endpoint,
        $body = null,
        $params = [],
        $headers = []
    ) {
        // Add default json headers to the request
        $headers = array_merge($headers, [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        // Create param string
        if (! empty($params)) {
            $endpoint .= '?'.http_build_query($params);
        }

        // Create the request
        return new Request($method, $endpoint, $headers, json_encode($body));
    }

    /**
     * @param string $url
     * @param string $method
     *
     * @return string
     */
    private function formatUrl($url, $method = 'get')
    {
        return "{$this->apiUrl}/$url";
    }

    /**
     * @param Response $response
     * @return mixed
     * @throws ApiException
     */
    private function parseResponse(Response $response)
    {
        try {
            Psr7\rewind_body($response);

            $json = json_decode($response->getBody()->getContents(), true);

            return data_get($json, 'data');
        } catch (\RuntimeException $e) {
            throw new ApiException($e->getMessage());
        }
    }
}
