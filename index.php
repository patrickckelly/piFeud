<?php
    require_once dirname(__FILE__).'/vendor/twig/twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();
    
    $loader = new Twig_Loader_Filesystem(dirname(__FILE__).'/templates');
    $twig = new Twig_Environment($loader, array(
        'cache' => false,
    ));
    
    require_once dirname(__FILE__).'/db_conn.php';
    $db = new mysqli($servername, $db_username, $db_password, $database, $db_port);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";
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
         echo '<h1>'.$db_username.'</h1>';
        ?>
    </body>
</html>