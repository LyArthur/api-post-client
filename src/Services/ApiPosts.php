<?php

namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiPosts
{
    private HttpClientInterface $client;

    /**
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client) {
        $this->client = $client;
    }

    public function getPosts(): array {
        $rep = $this->client->request(
            'GET',
            "http://172.16.216.1:8000/api/posts",

        );
        return $rep->toArray();
    }

    public function sign_in(array $credentials) {
        $rep = $this->client->request(
            'POST',
            "http://172.16.216.1:8000/api/login_check", [
                'json' => $credentials,
            ]
            );
        return $rep->toArray();
    }
}