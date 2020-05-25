<!DOCTYPE html>
<head>
    <title><?= $title ?></title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/js/jquery.auto-complete.css">

    <script type="text/javascript" charset="UTF-8" src="/js/javascript.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="menu">
    <a class="btn btn-default" href="<?= base_url() ?>/Dashboard" role="button"> Dashboard </a>
    <a class="btn btn-default" href="<?= base_url() ?>/Product" role="button">Add a purchase</a>
    <a class="btn btn-default" href="<?= base_url() ?>/Shop/List" role="button">Shop list</a>
    <a class="btn btn-default" href="<?= base_url() ?>/Category/List" role="button">Category list</a>
    <a class="btn btn-default" href="<?= base_url() ?>/Product/List" role="button">Product list</a>
    <?php
        if( !$isLoggedIn ){
          echo  '<a class="btn btn-default" href="' . base_url() . '/Auth" role="button">Log in</a>';
        }else{
          echo  '<a class="btn btn-default" href="' . base_url() . '/Auth/LogOut" role="button">Log out</a>';
        }
    ?>
</div>
<div class="container-fluid">
