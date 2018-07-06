<?php

return [
    '' => 'site/index',
    'about-avensia' => '/site/about',
    'gallery' => '/site/gallery',
    'contact' => '/site/contact',
    'blog' => '/site/blog',
    'site-map' => '/site/site-map',
    'our-clients' => '/site/our-clients',
    'general-trading/<trade:\w+(-\w+)*>' => 'site/general-trading',
    'it-service/<page:\w+(-\w+)*>' => 'site/it-service',
    'technical-service/<page:\w+(-\w+)*>' => 'site/technical-service',
    'facility-management/<page:\w+(-\w+)*>' => 'site/facility-management',
    'blog-details/<id:\d+>' => 'site/blog-details',
];
