<div class="container">
    <div id="cv-body" class="row g-0 justify-content-evenly">
        <div id="cv-work-history" class="col-md-5">
            <?php
            echo get_template_part('sections/cv-work-history');
            ?>
        </div>
        <div id="cv-education" class="col-md-5">
            <?php
            echo get_template_part('sections/cv-education');
            ?>
        </div>
        
        <div id="cv-certifications" class="col-md-5">
            <?php
            echo get_template_part('sections/cv-certifications');
            ?>
        </div>
    </div>
</div>