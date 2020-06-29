<!doctype html>
<html class="no-js" <?php language_attributes( ); ?>>

<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="<?Php echo get_template_directory_uri() . '/css/normalize.css'; ?>">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <script src="<?php echo get_template_directory_uri(). '/js/vendor/modernizr-3.8.0.min.js'?>"></script>
  <meta name="theme-color" content="#fafafa">
  <?php wp_head(); ?>
</head>
<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->