<?php
/**
 * Created by PhpStorm.
 * User: salman
 * Date: 2/22/19
 * Time: 1:29 PM
 */

return [

    'host' => env('mqtt_host','192.168.43.116'),
    'password' => env('mqtt_password',''),
    'username' => env('mqtt_username',''),
    'certfile' => env('mqtt_cert_file',''),
    'port' => env('mqtt_port','1883'),
    'debug' => env('mqtt_debug',True) //Optional Parameter to enable debugging set it to True
];
