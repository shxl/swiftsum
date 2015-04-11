<?php namespace SwiftSum\Services;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Stream\Stream;
use SwiftSum\Exceptions\InvalidBae;
use GuzzleHttp\Client;
use SwiftSum\Setting;

class BaelorAPI
{

    protected $base_url = 'http://baelor.io/api/v0/';
    protected $api_key;
    private $api_username;
    private $api_email;
    private $api_password;
    protected $guzzle;

    public function __construct()
    {
        $this->flash = app('flash');
        $this->guzzle = new Client();

        $this->api_key = env('BAE_API', Setting::getByName('BAE_API'));
        $this->api_username = env('BAE_USERNAME');
        $this->api_email = env('BAE_EMAIL');
        $this->api_password = env('BAE_PASSWORD');
    }

    public function setupKey()
    {
        if (empty($this->api_key)) {
            $this->attemptLogin($this->api_username, $this->api_email);
        }

        $this->validateKey();
    }

    private function validateKey()
    {
        $api = $this->api_key;
    }

    private function attemptLogin($identity, $password)
    {
        $request = $this->prepareRequest('post', 'sessions', [
            'identity' => $identity,
            'password' => $password,
        ]);
        $body = $this->process($request);
    }

    private function prepareRequest($request, $endpoint, $vars)
    {
        $request = $this->guzzle->createRequest($request, $this->base_url . $endpoint);
        $stream = Stream::factory(json_encode($vars));
        $request->setBody($stream);
        $request->setHeader('Content-Type', 'application/json');
        $request->setHeader('Accept', 'application/json');
        return $request;
    }

    private function process($request)
    {
        try {
            $response = $this->guzzle->send($request);

            $code = $response->getStatusCode();
            $body = $response->getBody();
            $returner = json_decode($body->getContents());
            $returner['code'] = $code;

            return $returner;
        } catch(ClientException $ex) {
            $body = $ex->getResponse()->getBody()->getContents();
            $code = $ex->getResponse()->getStatusCode();
            $body = json_decode($body);
            $body->code = $code;
            return $body;
        } catch(\Exception $ex) {
            dd($ex);
        }
    }
}