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
        'title'   => 'Zabudnuté heslo',
        'message' => [
            'action'       => 'Zmena hesla',
            'introduction' => 'Dostali ste tento e-mail, pretože evidujeme žiadosť o resetovanie hesla pre váš účet.',
            'thanks'       => 'Ak ste si nevyžiadali resetovanie hesla, nie je nutná žiadna ďalšia akcia.'
        ]
    ],

    'welcome_email' => [
        'title'   => 'Registrácia prebehla úspešne',
        'message' => [
            'greetings'    => 'Dobrý deň :name',
            'action'       => 'Prihláste sa',
            'introduction' => 'Registrácia Vašeho nového účtu v systéme Klikom.sk prebehla úspešne.',
            'thanks'       => 'Ďakujeme za Vašu registráciu.',
        ]
    ],

    'valid_email' => [
        'title'   => 'Registrácia prebehla úspešne',
        'message' => [
            '1' => 'Dobrý deň :name,<br><br>Registrácia v systéme',
            '2' => 'prebehla úspešne. Kliknutím na nasledujúci odkaz aktivujete vaše konto:<br><br>',
            '3' => 'Aktivovať moje konto'
        ]
    ],

    'greetings' => 'Dobrý deň',
    'regards'   => "S pozdravom",
];
