<?php

return [

    'send_type' => [
        'text'  => 'smsEnabled',
        'fax'   => 'faxEnabled',
        'voice' => 'voiceEnabled',
        'video' => 'mmsEnabled',
    ],
    'filter_type' => [
    	'area_code' 	=> 'areaCode',
    	'phone_number'	=> 'contains',
    	'pattern'		=> 'contains',
    ]

];
