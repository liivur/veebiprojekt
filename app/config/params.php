<?php

return array_merge([
    'adminEmail' => 'admin@example.com',
    'siteTitle' => 'E-hääletus',
    'languages'=>[
    	'en'=>'English',
    	'et'=>'Eesti',
    ],
], require(__DIR__ . '/secret.php'));
