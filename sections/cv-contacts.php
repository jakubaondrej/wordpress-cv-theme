<h2 class="mb-1"><?php echo get_option('contacts_title'); ?></h2>
<div class="px-2">
    <?php 
    $cv_address = get_option( 'cv_address' ); 
    $cv_phone = get_option( 'cv_phone' ); 
    $cv_phone2 = get_option( 'cv_phone2' ); 
    $cv_email = get_option( 'cv_email' ); 
    $cv_linkedin_url = get_option( 'cv_linkedin_url' ); 
    $cv_linkedin_text = get_option( 'cv_linkedin_text' )??__('My linkedIn', TEXT_DOMAIN); 
    $cv_another_contact = get_option( 'cv_another_contact' ); 

    if($cv_address) : ?>
        <div class="cv_address">
        <span class="material-icons me-2">home</span><?php echo esc_html($cv_address); ?>
        </div>
    <?php 
    endif; 
    if($cv_phone) : ?>
        <div class="cv_phone">
            <span class="material-icons me-2">call</span>
            <a href="tel:<?php echo $cv_phone; ?>" class="link-info"><?php echo $cv_phone; ?></a>
        </div>
    <?php 
    endif; 
    if($cv_phone2) : ?>
        <div class="cv_phone2">
            <span class="material-icons me-2">call</span>
            <a href="tel:<?php echo $cv_phone2; ?>" class="link-info"><?php echo $cv_phone2; ?></a>
        </div>
    <?php 
    endif; 
    if($cv_email) : ?>
        <div class="cv_email">
            <span class="material-icons me-2">email</span>
            <a href="mailto:<?php echo $cv_email; ?>" class="link-info"><?php echo $cv_email; ?></a>
        </div>
    <?php 
    endif; 
    if($cv_linkedin_url) : ?>
        <div class="cv_linkedin">
            <span class="badge bg-white text-black me-2">in</span>
            <a href="<?php echo $cv_linkedin_url; ?>" class="link-info"><?php echo $cv_linkedin_text; ?></a>
        </div>
    <?php 
    endif; 
    if($cv_another_contact) : ?>
        <div class="cv_another_contact mt-1">
            <?php echo esc_html($cv_another_contact); ?>
        </div>
    <?php 
    endif; ?>
</div>