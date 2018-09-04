<?php
include '../core/Chad/src/Validation/Validate.php';
include '../vendor/autoload.php';
include '../../config/keys.php';
use Mailgun\Mailgun;
use Chad\Validation;

$valid = new Chad\Validation\Validate();

$filters = [
    'name'=>FILTER_SANITIZE_STRING,
    'email'=>FILTER_SANITIZE_EMAIL,
    'message'=>FILTER_SANITIZE_STRING,
];
$input = filter_input_array(INPUT_POST, $filters);

if(!empty($input)){
    $valid->validation = [
        'email'=>[[
                'rule'=>'email',
                'message'=>'Please enter a valid email'
            ],[
                'rule'=>'notEmpty',
                'message'=>'Please enter an email'
        ]],
        'name'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please enter your first name'
        ]],
        'message'=>[[
            'rule'=>'notEmpty',
            'message'=>'Please add a message'
        ]],
    ];

    $valid->check($input);

/* Use To Show Arrays When Needed
    var_dump($valid->errors);
*/
    if(empty($valid->errors)){

# Instantiate the client.
$mgClient = new Mailgun(MG_KEY);

# Make the call to the client.
$result = $mgClient->sendMessage(MG_DOMAIN,
    [//('from'    => 'Mailgun Sandbox <postmaster@'. MG_DOMAIN. '>',
          'from'    => "{$input['name']} <{$input['email']}>",      
          'to'      => 'Chad Svastisalee <chad@killer-sites.com>',
          'subject' => 'Hello Chad Svastisalee',
          'text'    => $input['message']
          ]);

/* Use To Show Input When Needed
var_dump($result);
*/
        $message = "<div class=\"message-success\">Your form has been submitted!</div>";
//        header('Location: thanks.php');
    }else{
        $message = "<div class=\"message-error\">Your form has errors!</div>";
    }
}