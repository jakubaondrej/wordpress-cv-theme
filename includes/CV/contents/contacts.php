<?php
/**
 * Renders the content of the submenu page for the CV - Contacts.
 */
?>

<div class="wrap">

	<h1><?php _e('CV contacts',TEXT_DOMAIN); ?></h1>
	<p class="description">
		<?php _e('You can share your contacts. Empty fileds do not will be displayed.',TEXT_DOMAIN); ?>
	</p>
    <form action="" method="post">
	  
		<!-- The set of option elements, such as checkboxes, would go here -->
        <div>
            <label for="contacts_title"><?php _e( 'Contacts` title (If you prefer another title)', TEXT_DOMAIN ); ?></label>
            <input type="text" id="contacts_title" name="contacts_title" value="<?php echo get_option( 'contacts_title' )??'Contacts'; ?>">
        </div>
        <div>
            <label for="cv_address"><?php _e( 'Address', TEXT_DOMAIN ); ?></label>
            <textarea type="text" id="cv_address" name="cv_address" rows="4" cols="50"><?php echo get_option( 'cv_address' )??''; ?></textarea>
        </div>
        <div>
            <label for="cv_phone"><?php _e( 'Phone number', TEXT_DOMAIN ); ?></label>
            <input type="tel" id="cv_phone" name="cv_phone" value="<?php echo get_option( 'cv_phone' )??''; ?>">
        </div>
        <div>
            <label for="cv_phone2"><?php _e( 'Phone number 2', TEXT_DOMAIN ); ?></label>
            <input type="tel" id="cv_phone2" name="cv_phone2" value="<?php echo get_option( 'cv_phone2' )??''; ?>">
        </div>
        <div>
            <label for="cv_email"><?php _e( 'Email', TEXT_DOMAIN ); ?></label>
            <input type="email" id="cv_email" name="cv_email" value="<?php echo get_option( 'cv_email' )??''; ?>">
        </div>
        <div>
            <label for="cv_linkedin_url"><?php _e( 'LinkedIN url', TEXT_DOMAIN ); ?></label>
            <input type="url" id="cv_linkedin_url" name="cv_linkedin_url" value="<?php echo get_option( 'cv_linkedin_url' )??''; ?>">
        </div>
        <div>
            <label for="cv_linkedin_text"><?php _e( 'LinkedIN link text', TEXT_DOMAIN ); ?></label>
            <input type="text" id="cv_linkedin_text" name="cv_linkedin_text" value="<?php echo get_option( 'cv_linkedin_text' )??''; ?>">
        </div>
        <div>
            <label for="cv_another_contact"><?php _e( 'Another contact or details', TEXT_DOMAIN ); ?></label>
            <textarea type="text" id="cv_another_contact" name="cv_another_contact" rows="4" cols="50"><?php echo get_option( 'cv_another_contact' )??''; ?></textarea>
        </div>
		<?php submit_button( __('Save', TEXT_DOMAIN) ); ?>
		<?php wp_nonce_field( 'jakuba-contacts-save', 'jakuba-contacts-save-nonce' ); ?>
    </form>
</div>