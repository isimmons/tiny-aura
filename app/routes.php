<?php
// an array of routes for simple routing
//example 1 'routename' => 'url'
//example 2 'routename' => 'url/{:param}'

// will incorporate complex routes later

//ok one slightly more complex because I must be able to specify the controller
// I miss Laravel already ;-(

return [
    'home' => '/',
    'foo.show' => '/foo{:controller}/{:action}/{:id:(\d+)}'
];