<?php
    require_once dirname(__FILE__).'/vendor/twig/twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();
    
    $loader = new Twig_Loader_Filesystem(dirname(__FILE__).'/templates');
    $twig = new Twig_Environment($loader, array(
        'cache' => false,
    ));
?>
<html>
    <head>
        <title>PiFeud</title>
    </head>
    <body>
        <h1>Welcome to the Feud!</h1>
        <?php
         $template = $twig->load('testTemplate.html');
         $templateVars = array(
            'templateVar' => 'Hello World!!',
            'templateArray' => array(
            'temp1' => 1,
            'temp2' => 2,
            'temp3' => 3,),
         );
         echo $template->render($templateVars);
        ?>
    </body>
</html>