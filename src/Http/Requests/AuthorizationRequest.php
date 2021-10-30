<?php

namespace Mediumart\Orange\SMS\Http\Requests;

use Mediumart\Orange\SMS\Http\SMSClientRequest;

class AuthorizationRequest extends SMSClientRequest
{
    private $auth_header;

    /**
     * AuthorizeClientRequest constructor.
     * @param $clientID
     * @param $clientSecret
     */
    public function __construct($authHeader)
    {
        $this->auth_header = $authHeader;
    }

    /**
     * Http request method.
     *
     * @return string
     */
    public function method()
    {
        return 'POST';
    }

    /**
     * The uri for the current request.
     *
     * @return string
     */
    public function uri()
    {
        return static::BASE_URI.'/oauth/v3/token';
    }

    /**
     * Http request options.
     *
     * @return array
     */
    public function options()
    {
        return [
            'headers' => [
                'Authorization' => "Basic ".$this->auth_header,
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json'
            ],
            'form_params' => [
                'grant_type' => 'client_credentials'
            ]
        ];
    }
}
