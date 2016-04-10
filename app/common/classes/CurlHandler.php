<?php

namespace app\common\classes;

use app\common\classes\UrlObject;
use app\common\exceptions\CurlException;

class CurlHandler
{
	public function sendRequest(UrlObject $urlObj, $parameters = array())
    {
        $handle = curl_init($urlObj->getUrl());
        curl_setopt($handle, CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
            )
        );

        curl_setopt($handle, CURLOPT_HEADER, 0);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); 

        curl_setopt_array($handle, $parameters);

        //run
        $response = curl_exec($handle);
        $error = curl_error($handle);
        $errorNumber = curl_errno($handle);

        $errorCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

        if ($errorCode < 200 || $errorCode >= 300)
        {
            curl_close($handle);
            throw new CurlException($response, $errorCode);
        }

        curl_close($handle);
        if ($error)
        {
            throw new CurlException('CURL error: ' . $response . ':' . $error . ': ' . $errorNumber, self::CURL_ERROR);
        }

        return $response;
    }
}