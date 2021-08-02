<?php /* Template Name: CV */
get_header(); 
?>
<?php get_template_part('sections/cv-intro'); ?>
<div class="row justify-content-between g-0">
    <div class="col-xl-9 bg-light">
        <?php get_template_part('sections/cv-body'); ?>
    </div>
    <div class="col bg-black text-white">
        <?php get_template_part('sections/cv-sidebar'); ?>
    </div>
</div>

<?php get_footer(); ?>