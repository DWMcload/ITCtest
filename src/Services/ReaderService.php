<?php

namespace ITCtest\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class ReaderService
{
    public $url;
    public $data;
    const METHOD = 'GET';

    public function __construct()
    {
        $this->guzzleClient = new Client();
    }

    /*
     * @return Object
     */
    public function read(string $url, array $query = [])
    {
        $request = new Request(self::METHOD, $url, $query);
        $data = [];
        try {
            do {
                $promise = $this->guzzleClient->sendAsync($request)->then(function ($response) use ($data) {
                    $this->data = $this->sanitize($response->getBody()->getContents());
                });
                $promise->wait();
            } while (!empty($this->data->error));
        } catch (RequestException $e) {
            echo $e->getMessage() . "\n";
            echo $e->getRequest()->getMethod();
        }

        return $this->data;
    }

    public function sanitize(string $data)
    {
        //TODO: add proper sanitation mechanism here
        return json_decode($data);
    }

}