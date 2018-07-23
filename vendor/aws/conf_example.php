<?php

return array(
    'includes' => array('_aws'),
    'services' => array(
        'default_settings' => array(
            'params' => array(
                'credentials' => array(
                    'key'    => 'YOUR_AWS_ACCESS_KEY_ID',
                    'secret' => 'YOUR_AWS_SECRET_ACCESS_KEY',
                ),
                'region' => 'ap-northeast-1'  // 東京リージョン
            )
        )
    )
);