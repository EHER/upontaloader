<?php

namespace Eher\UpOntaLoader\Model;

use Guzzle\Http\Client;

class Uploader
{
    private $token = "";
    private $baseUrl = "https://api.apontador.com.br/v2";

    public function __construct($token, $baseUrl = null)
    {
        $this->token = $token;
        if ($baseUrl !== null) {
            $this->baseUrl = $baseUrl;
        }
    }

    public function upload($filePath, $placeId)
    {
        $client = new Client($this->baseUrl);
        $client->setDefaultHeaders(array(
            'Authorization' => 'Bearer ' . $this->token,
            'Accept' => 'application/json',
            'Content-Type' =>  'application/json',
        ));

        $request = $client->post("places/${placeId}/photos")
            ->addPostFields(array('featured' => 'true'))
            ->addPostFiles(array('file' => $filePath));

        $response = $request->send();

        return $response->getStatusCode();
    }
}
