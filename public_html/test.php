<?php
require 'vendor/autoload.php';
use \Mailjet\Resources;
$mj = new \Mailjet\Client('f295b8b1f061a57883b2973ffbcf4132','b2157e4a82583775d03a041251b98382',true,['version' => 'v3.1']);
$body = [
    'Messages' => [
        [
            'From' => [
                'Email' => "admin@realhostmyanmar.com",
                'Name' => "San Myo"
            ],
            'To' => [
                [
                    'Email' => "admin@realhostmyanmar.com",
                    'Name' => "San Myo"
                ]
            ],
            'Subject' => "Greetings from Mailjet.",
            'TextPart' => "My first Mailjet email",
            'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
            'CustomID' => "AppGettingStartedTest"
        ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success() && var_dump($response->getData());
?>
