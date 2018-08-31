<?php
include 'core/Chad/src/Validation/Validate.php';

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
        $message = "<div class=\"message-success\">Your form has been submitted!</div>";
        header('Location: thanks.php');
    }else{
        $message = "<div class=\"message-error\">Your form has errors!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Contact Chad Svastisalee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" type="text/css">
  </head>
  <body>
  
    <header>
      <span class="logo">My Website</span>
      <a id="toggleMenu">Menu</a>
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="resume.php">Resume</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </nav>
    </header>
    
    <main>
      <h1>Contact Chad Svastisalee</h1>

      <?php echo (!empty($message)?$message:null); ?>

      <form action="contact.php" method="POST">
        
        <input type="hidden" name="subject" value="New submission!">
        
        <div>
          <label for="name">Name</label>
          <input id="name" type="text" name="name" value="<?php echo $valid->userInput('name'); ?>">
          <div class="text-error"><?php echo $valid->error('name'); ?></div>
        </div>

        <div>
          <label for="email">Email</label>
          <input id="email" type="text" name="email" value="<?php echo $valid->userInput('email'); ?>">
          <div class="text-error"><?php echo $valid->error('email'); ?></div>
        </div>

        <div>
          <label for="message">Message</label>
          <textarea id="message" name="message"><?php echo $valid->userInput('message'); ?></textarea>
          <div class="text-error"><?php echo $valid->error('message'); ?></div>
        </div>

        <div>
          <input type="submit" value="Send">
        </div>

      </form>
    </main>
    
    <script>
        var toggleMenu = document.getElementById('toggleMenu');
        var nav = document.querySelector('nav');
        toggleMenu.addEventListener(
          'click',
          function(){
            if(nav.style.display=='block'){
              nav.style.display='none';
            }else{
              nav.style.display='block';
            }
          }
        );
      </script>
  </body>
</html>