<?php

$messages = array(
    '404' => array('We need a map.', 'I think we\'re lost.', 'We took a wrong turn.'),
    '500' => array('Ouch.', 'Oh no!', 'Whoops!', 'Doh!'),
);

return array(

    '403' => array(
        'title'       => 'Error 403 - Forbidden',
        'description' => 'Access Forbidden',
        'error'       => 'Server Error: 403 (Forbidden)',
        'meaning'     => 'What does this mean?',
        'reason'      => 'You don\'t have the necessary permissions to access to this page.',
        'redirect'    => 'Perhaps you would like to go to our <a href="'.URL::route('home').'"> home page </a> ?'
    ),

    '404' => array(
        'title'       => 'Error 404 - Not Found',
        'description' => $messages[404][mt_rand(0, 2)],
        'error'       => 'Server Error: 404 (Not Found)',
        'meaning'     => 'What does this mean?',
        'reason'      => 'We couldn\'t find the page you requested on our servers. We\'re really sorry about that. It\'s our fault, not yours.<br>'.
                         'We\'ll work hard to get this page back online as soon as possible.',
        'redirect'    => 'Perhaps you would like to go to our <a href="'.URL::route('home').'"> home page </a> ?'
    ),

    '500' => array(
        'title'       => 'Error 500 - Server Error',
        'description' => $messages[500][mt_rand(0, 2)],
        'error'       => 'Server Error: 500 (Internal Server Error)',
        'meaning'     => 'What does this mean?',
        'reason'      => 'Something went wrong on our servers while we were processing your request.<br>'.
                         'We\'re really sorry about this, and will work hard to get this resolved as soon as possible.',
        'redirect'    => 'Perhaps you would like to go to our <a href="'.URL::route('home').'"> home page </a> ?'
    ),

    '503' => array(
        'title'       => 'Error 503 - Scheduled Maintenance',
        'description' => 'Scheduled Maintenance',
        'error'       => 'Server Error: 503 (Scheduled Maintenance) ',
        'meaning'     => 'What does this mean?',
        'reason'      => 'We are under a scheduled maintenance and we\'ll be back shortly!'
    )

);