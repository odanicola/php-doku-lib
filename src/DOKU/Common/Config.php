<?php

namespace DOKU\Common;

class Config
{

    const SANDBOX_BASE_URL    = 'https://api-sandbox.doku.com';
    const PRODUCTION_BASE_URL = 'https://api.doku.com';

    /**
     * @return string DOKU API URL, depends on $state
     */
    public static function getBaseURL($state)
    {
        return $state ? Config::PRODUCTION_BASE_URL : Config::SANDBOX_BASE_URL;
    }
}
