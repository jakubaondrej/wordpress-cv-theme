<?php $primary_menu = jakuba_get_menu_buttons('primary-menu'); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body class="m-0">
    <header>
        <nav class="navbar navbar-dark bg-black navbar-expand-md">
            <a class="navbar-brand ps-1" href="<?php echo esc_url(home_url('/')); ?>">
                <?php
                if (has_custom_logo()) {
                    $custom_logo_id = get_theme_mod('custom_logo');
                    echo wp_get_attachment_image($custom_logo_id, 'small', false, array('class' => 'w-100 h-auto web-logo align-self-center', 'alt' => get_bloginfo('name')));
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                }
                ?>
            </a>

            <button class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex flex-row flex-wrap" id="navbarToggler">
                <?php echo $primary_menu; ?>
            </div>
        </nav>
    </header>
    <main role="main">