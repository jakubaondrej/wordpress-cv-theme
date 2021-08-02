<?php
$intro_img_id = get_option('introduction_image_id');
$intro_img_alt = get_post_meta($intro_img_id, '_wp_attachment_image_alt', true);
$intro_img_src = wp_get_attachment_image_src($intro_img_id)[0];
?>
<div id="introduction" class="bg-black py-4">
    <div class="row justify-content-between g-0">
        <div id="intro-image" class="col">
            <img id="introduction_image_view" class="w-75 center_image" src="<?php echo esc_url($intro_img_src); ?>" alt="<?php echo esc_html($intro_img_alt); ?>">
        </div>
        <div id="intro-content" class="col align-self-center">
            <div id="intro-name" class="text-info">
                <h1>
                    <?php echo get_option('introduction_title') ?? 'Introduction'; ?>
                </h1>
            </div>
            <div id="intro-about" class="text-white">
                <?php echo get_option('introduction_text') ?? ''; ?>
            </div>
        </div>
    </div>
</div>