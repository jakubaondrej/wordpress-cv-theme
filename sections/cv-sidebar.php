<div id="cv-sidebar" class="ps-2 pb-5">
    <?php
    $birthdate = get_option('birthdate');
    if (isset($birthdate)) :
        $datetime1 = date_create($birthdate);
        $datetime2 = new DateTime('NOW');
       
        $interval = date_diff($datetime1, $datetime2);
       
        $age= $interval->format('%y');
    ?>
        <div class="pt-3">
            <?php echo esc_html_e("My age: $age", TEXT_DOMAIN); ?>
        </div>
    <?php endif; ?>
    <div id="cv-contacts">
        <?php echo get_template_part('sections/cv-contacts'); ?>
    </div>
    <div id="cv-skills">
        <?php echo get_template_part('sections/cv-skills'); ?>
    </div>
</div>