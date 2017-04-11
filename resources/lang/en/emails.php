<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Emails Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'subject_prefix' => 'TellMeBox:',

    'box_invitation' => 'Boli ste pozvaní na ohodnotenie cez TellMeBox. Na stránke ho nájdete po zadaní kódu :box_code',

    'password' => [
        'title'   => 'Forgot password',
        'message' => [
            'action'       => 'Change password',
            'introduction' => 'This email was generated for purpose of reset password.',
            'thanks'       => 'If you did not generate reset password request, please ignore this mail.'
        ]
    ],

    'welcome_email' => [
        'title'   => 'Registration successful',
        'message' => [
            'greetings'    => 'Hello :name',
            'action'       => 'Log in',
            'introduction' => 'Your registration in TellMe system was successful.',
            'password'     => 'Your password is: :password',
            'thanks'       => 'Thank you.',
        ]
    ],

    'valid_email' => [
        'title'   => 'Registration successful',
        'message' => [
            '1' => 'Hello :name,<br><br>Registration',
            '2' => 'was successful. Click here to activate your account:<br><br>',
            '3' => 'Active account'
        ]
    ],

    'greetings' => 'Welcome',
    'regards'   => "With kind regards,",
];
