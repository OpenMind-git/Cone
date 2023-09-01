<?php

namespace Erjon\Cone;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Cone
{
    private $client;
    private $token;
    private $apiUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->token = config('cone.token');
        $this->apiUrl = config('cone.api_url');
    }

    private function buildCheckUrl($email): string
    {
        return $this->apiUrl . "/check-license?email={$email}&token={$this->token}";
    }

    private function buildActivateUrl($email, $key): string
    {
        return $this->apiUrl . "/activate-license?email={$email}&key={$key}&token={$this->token}";
    }

    public function check($email): bool
    {
        try {
            $response = $this->client->get($this->buildCheckUrl($email));

            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {

                return true;
            }
        } catch (GuzzleException $exception) {}

        return false;
    }

    public function activateLicense($email, $key): bool
    {
        try {
            $response = $this->client->post($this->buildActivateUrl($email, $key));

            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                return true;
            }
        } catch (GuzzleException $exception) {}

        return false;
    }
}
