<?php get_header(); ?>

<body <?php body_class(); ?>>
<?php get_template_part("hero"); ?>

<div class="posts" <?php
while (have_posts()) {
    the_post();
    ?>
    <div class="post" <?php post_class(); ?> >
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h2 class="post-title text-center">
                        <?php the_title(); ?>
                    </h2>
                    <p class="text-center">
                        <strong><?php the_author(); ?></strong><br />
                        <?php echo get_the_date(); ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <p>
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail("large", array("class" => "img-fluid"));
                        }

                        the_content();
                    ?>

                    </p>
                </div>
            </div>

            <?php if(comments_open()): ?>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <?php comments_template(); ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-md-4">
                    <?php previous_post_link(); ?>
                </div>
                <div class="col-md-4 offset-md-4 text-right">
                    <?php next_post_link(); ?>
                </div>
            </div>
        </div>

    </div>

    <?php
}
?>>

</div>

<?php get_footer(); ?>
