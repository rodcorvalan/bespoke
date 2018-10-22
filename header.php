<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo('charset'); ?>">
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' -'; } ?> <?php bloginfo('name'); ?></title>
<link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php wp_head(); ?>

<body <?php body_class(); ?>>

<?php include TD . '/parts/organisms/header.php'; ?>