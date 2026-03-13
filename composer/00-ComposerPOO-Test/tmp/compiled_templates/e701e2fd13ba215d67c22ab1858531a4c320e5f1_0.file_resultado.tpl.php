<?php
/* Smarty version 5.8.0, created on 2026-03-13 22:18:07
  from 'file:resultado.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_69b48d1fe5fcd5_75102572',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e701e2fd13ba215d67c22ab1858531a4c320e5f1' => 
    array (
      0 => 'resultado.tpl',
      1 => 1773439958,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69b48d1fe5fcd5_75102572 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/var/www/html/SandBox/templates';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>hola <?php echo $_smarty_tpl->getValue('texto');?>
</h1>

    <ul>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('movies'), 'movie');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('movie')->value) {
$foreach0DoElse = false;
?>
        <li><?php echo $_smarty_tpl->getValue('movie')['titulo'];?>
</li>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
</body>
</html><?php }
}
