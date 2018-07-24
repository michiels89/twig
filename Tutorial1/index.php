<?php
require 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('views');

$twig = new Twig_Environment($loader);

$md5filter = new Twig_SimpleFilter('md5', function($string){

   return md5($string);
});
 $twig -> addFilter($md5filter);

// to change twig syntax, block {} instead of {{}}
//                        variable {{ $ }} instead of {{}}

$lexer = new Twig_Lexer($twig, array(
   'tag_block' => array('{','}'),
   'tag_variable' =>array('{{ ','}}')
));
$twig->setLexer($lexer);



echo $twig->render('hello.html', array(

    'name' => 'Lynn',
    'age' => 29,

    'users' => array(

        array('name' => 'Max', 'age' => 18),
        array('name' => 'James', 'age' => 22),
        array('name' => 'Billy', 'age' => 34),
    )

));