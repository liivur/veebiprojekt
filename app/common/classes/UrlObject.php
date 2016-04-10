<?php

namespace app\common\classes;

class UrlObject
{
	public $url;
	public $queryArgs;

	public function __construct($url = null, $queryArgs = array())
	{
		$this->url = $url;
		$this->queryArgs = $queryArgs;
	}

	public function getUrl()
	{
		if (!empty($this->queryArgs))
		{
            return $this->url.'?' . http_build_query($this->queryArgs);
        }
        return $this->url;
	}
}