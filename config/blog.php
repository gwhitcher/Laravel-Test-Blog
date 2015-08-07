<?php
return [
    'title' => 'LBLOG', //config('blog.title') will return title.
    'base_url' => 'http://localhost:8000',
    'description' => 'LBLOG an open source blog software.',
    'page_image' => 'headers/default.jpg',
    'featured_images' => 3,
    'posts_per_page' => 10,
    'rss_size' => 25,
    'contact_email' => env('MAIL_FROM'),
    'uploads' => [
        'storage' => 'local',
        'webpath' => '/uploads',
    ],
];