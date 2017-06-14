<?php

namespace ElfSundae\Laravel\Helper;

use Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class HttpClient
{
    /**
     * The Guzzle client.
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * The Guzzle response.
     *
     * @var \GuzzleHttp\Psr7\Response
     */
    protected $response;

    /**
     * Create a http client instance.
     *
     * @param  array  $config
     */
    public function __construct($config = [])
    {
        $config = array_merge([
            'connect_timeout' => 5,
            'timeout' => 25,
        ], $config);

        $this->client = new Client($config);
    }

    /**
     * Get the Guzzle client instance.
     *
     * @return \GuzzleHttp\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Get the Guzzle response instance.
     *
     * @return \GuzzleHttp\Psr7\Response|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Get response body.
     *
     * @return \GuzzleHttp\Psr7\Stream|null
     */
    public function getBody()
    {
        if ($this->response) {
            return $this->response->getBody();
        }
    }

    /**
     * Get response content.
     *
     * @return string|null
     */
    public function getContent()
    {
        if ($body = $this->getBody()) {
            return (string) $body;
        }
    }

    /**
     * Get JSON decoded response content.
     *
     * @param  bool  $assoc
     * @return mixed
     */
    public function getJson($assoc = true)
    {
        if ($content = $this->getContent()) {
            return json_decode($content, $assoc);
        }
    }

    /**
     * Make request to an URL.
     *
     * @param  string  $url
     * @param  string  $method
     * @param  array  $options
     * @return $this
     */
    public function request($url, $method = 'GET', $options = [])
    {
        try {
            $this->response = $this->client->request($method, $url, $options);
        } catch (Exception $e) {
        }

        return $this;
    }

    /**
     * Make request to an URL, expecting JSON content.
     *
     * @param  string  $url
     * @param  string  $method
     * @param  array  $options
     * @return $this
     */
    public function requestJson($url, $method = 'GET', $options = [])
    {
        Arr::set($options, 'headers.Accept', 'application/json');

        return $this->request($url, $method, $options);
    }

    /**
     * Request the URL and return the response content.
     *
     * @param  string  $url
     * @param  string  $method
     * @param  array  $options
     * @return string|null
     */
    public function fetchContent($url, $method = 'GET', $options = [])
    {
        return $this->request($url, $method, $options)->getContent();
    }

    /**
     * Request the URL and return the JSON decoded response content.
     *
     * @param  string  $url
     * @param  string  $method
     * @param  array  $options
     * @param  bool  $assoc
     * @return mixed
     */
    public function fetchJson($url, $method = 'GET', $options = [], $assoc = true)
    {
        return $this->requestJson($url, $method, $options)->getJson($assoc);
    }
}
