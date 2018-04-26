<?php

namespace App\Facades;

class ApiClient extends FacadeBase
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'App\Endpoints\EndpointClient';
    }
}