<?php get_header(); ?>

<body <?php body_class(); ?> >
<?php get_template_part("/template-parts/common/hero"); ?>

<div class="container errorview">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                <?php
                _e("Sorry! We couldn't find what you are looking for.", "sakib")
                ?>
            </h1>
        </div>
    </div>
</div>
</body>

<?php
get_footer();
?>
