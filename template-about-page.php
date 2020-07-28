<?php
/*
 * Template Name: About Page Template
 */
get_header();
?>

<body <?php body_class(); ?>>

<!--Hero Section-->
<?php get_template_part("hero-page"); ?>

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

                        /*if ( has_post_thumbnail() ) {
                            $thumbnail_url = get_the_post_thumbnail_url( null, "large" );
                            printf( '<a class="popup" href="%s" data-featherlight="image">', $thumbnail_url );
                            the_post_thumbnail( "large", array( "class" => "img-fluid" ) );
                            echo '</a>';
                        };*/

                        if ( has_post_thumbnail() ) {
                            //$thumbnail_url = get_the_post_thumbnail_url( null, "large" );
                            echo '<a class="popup" href="#" data-featherlight="image">';
                            the_post_thumbnail( "large", array( "class" => "img-fluid" ) );
                            echo '</a>';
                        };

                        the_content();
                        ?>

                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <?php previous_post_link(); ?>
                </div>
                <div class="col-md-4 offset-md-4 text-right">
                    <?php next_post_link(); ?>
                </div>
            </div>

        </div>

        <?php
        }
        ?>
    </div>


<?php get_footer(); ?>
