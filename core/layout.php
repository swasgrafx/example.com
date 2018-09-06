<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <?php if(!empty($meta['title'])): ?>
    <title><?php echo $meta['title']; ?></title>
  <?php endif; ?>

  <?php if(!empty($meta['description'])): ?>
  <meta name="description" contents="<?php echo $meta['description'] ?>">
  <?php endif; ?>

  <?php if(!empty($meta['keywords'])): ?>
  <meta name="keywords" contents="<?php echo $meta['keywords'] ?>">
  <?php endif; ?>


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/dist/css/main.min.css">
</head>
<body>
<header>
  <span class="logo">Chad Svastisalee</span>
  <a id="toggleMenu">Menu</a>
  <nav>
    <ul>
      <li><a href="/">Home</a></li>
      <li><a href="/resume.php">Resume</a></li>
      <li><a href="/contact.php">Contact</a></li>
      <li><a href="/posts">Blog</a></li>
    </ul>
  </nav>
</header>
<main>
<script>
    var toggleMenu = document.getElementById('toggleMenu');
    var nav = document.querySelector('nav');
    toggleMenu.addEventListener('click', function(){
            if(nav.style.display=='block'){
                nav.style.display='none';
            }else{
                nav.style.display='block';
            }
        }
    );
</script>

<?php
echo $content;
echo (!empty($message)?$message:null); 
?>
</main>
  </body>
</html>