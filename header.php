<?php
$logo_image_src = get_template_directory_uri() . '/assets/images/logo.svg';

if (function_exists('the_custom_logo')) {
    $custom_logo_id = get_theme_mod('custom_logo');

    if ($custom_logo_id) {
        $logo_image = wp_get_attachment_image_src($custom_logo_id, 'full');
        $logo_image_src = esc_url($logo_image[0]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multimedialni Wordpress Theme">
    <meta name="author" content="https://github.com/W1nt3rR">
    <link rel="shortcut icon" href="<?= $logo_image_src; ?>">

    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <a href="<?= home_url(); ?>">
                    <img class="logo" src="<?= $logo_image_src; ?>" alt="<?= get_bloginfo('name'); ?>">
                </a>
            </div>

            <div id="navigation" class="navigation">
                <?php
                wp_nav_menu(
                    array(
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        'items_wrap' => '<ul class="nav-item">%3$s</ul>'
                    )
                );
                ?>
            </div>

            <div class="filler"></div>

            <?php get_search_form([
                'label' => 'Search',
                'class' => 'search-form',
            ]); ?>
        </nav>
    </header>

    <div class="main-wrapper">
        <header class="page-title">
            <h1 class="heading"><?php the_title(); ?></h1>
        </header>