<?php
/**
 * Renders the content of the submenu page for the CV - Introduction.
 */
?>

<div class="wrap">

	<h1><?php _e('CV introduction',TEXT_DOMAIN); ?></h1>
	<p class="description">
		Select your options from the following set of choices...
	</p>
    <form action="" method="post">
	  
		<!-- The set of option elements, such as checkboxes, would go here -->
        <div>
            <label for="introduction_image_id"><?php _e( 'Introduction image', TEXT_DOMAIN ); ?></label>
            <div>
                <img id="introduction_image_view" src="<?php echo wp_get_attachment_image_src( get_option( 'introduction_image_id' ) )[0]; ?>"  style="width: 20%">
            </div>
            <input type="hidden" name="introduction_image_id" id="introduction_image_id" value="<?php echo get_option( 'introduction_image_id' )??'' ?>">
            <input type="button" id="set_introduction_image_btn" class="button admin_upload_image_btn" value="<?php _e('Set image',TEXT_DOMAIN);?>" />
        </div>
        <div>
            <label for="introduction_title"><?php _e( 'Introduction title (If you prefer another title)', TEXT_DOMAIN ); ?></label>
            <input type="text" id="introduction_title" name="introduction_title" value="<?php echo get_option( 'introduction_title' )??'Introduction'; ?>">
        </div>
        <div>
            <label for="introduction_text"><?php _e( 'Introduction', TEXT_DOMAIN ); ?></label>
            <textarea type="text" id="introduction_text" name="introduction_text" rows="4" cols="50"><?php echo get_option( 'introduction_text' )??''; ?></textarea>
        </div>
        <div>
            <label for="birthdate"><?=__('Your birth date (only your age will be present)',TEXT_DOMAIN)?></label>
            <input type="date" id="birthdate" name="birthdate" value=<?php echo  get_option( 'birthdate' )??'';?>>
        </div>
		<?php submit_button( __('Save', TEXT_DOMAIN) ); ?>
		<?php wp_nonce_field( 'jakuba-introduction-save', 'jakuba-introduction-save-nonce' ); ?>
    </form>
</div>