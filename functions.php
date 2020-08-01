<?php

if(site_url()=="http://localhost/lwhh-test-01"){
    define("VERSION", time());
}else{
    define("VERSION", wp_get_theme()->get("Version"));
}

function sakib_bootstrapping(){
    load_theme_textdomain("sakib");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    $sakib_custom_header_details = array(
            "header-text"           => true,
            "default-text-color"    => "#222",
    );
    add_theme_support("custom-header", $sakib_custom_header_details);
    $sakib_custom_logo_details = array(
            "width"     => "100",
            "height"    => "100"
    );
    add_theme_support("custom-logo", $sakib_custom_logo_details);
    register_nav_menu("topmenu", __("Top Menu", "sakib"));
    register_nav_menu("footermenu", __("Footer Menu", "sakib"));
}
add_action("after_setup_theme","sakib_bootstrapping");

function sakib_assets(){
    wp_enqueue_style("sakib", get_stylesheet_uri(), null, VERSION);
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style( "featherlight-css", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" );

    wp_enqueue_script( "featherlight-js", "//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js", array( "jquery" ), "0.0.1", true );
    wp_enqueue_script( 'sakib-main', get_template_directory_uri()."/assets/js/main.js", array("jquery", "featherlight-js"), VERSION, true);
}
add_action("wp_enqueue_scripts", "sakib_assets");

function sakib_sidebar(){
    register_sidebar(
        array(
            'name'          => __( 'Right Widgets Area', 'sakib' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Right Sidebar', 'sakib' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'Footer Left Area', 'sakib' ),
            'id'            => 'footer-left',
            'description'   => __( 'Footer Left Widget Area', 'sakib' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'Footer Right Area', 'sakib' ),
            'id'            => 'footer-right',
            'description'   => __( 'Footer Right Widget Area', 'sakib' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action("widgets_init", "sakib_sidebar");

//Filter Hook to Show Password Form for Password Protected Post

/*function alpha_protected_post_excerpt($excerpt){
    if(!post_password_required()){
        return $excerpt;
    }else{
        echo get_the_password_form();
    }
}

add_filter("the_excerpt", "alpha_protected_post_excerpt");*/

function sakib_protected_post_title_change(){
    return "%s";
}
add_filter("protected_title_format", "sakib_protected_post_title_change");

//Adding a class to every nav link to implement horizontal view instead of vertical view
function sakib_nav_menu_class($classes , $item){
    $classes[] = "list-inline-item";
    return $classes;
}
add_filter("nav_menu_css_class", "sakib_nav_menu_class", 10, 2);


function sakib_header_styles(){
    if(is_page()){
        $sakib_feat_image = get_the_post_thumbnail_url(null, "large");

    ?>
    <style>
        .page-header{
            background-image: url(<?php echo $sakib_feat_image; ?>);
        }
    </style>
    <?php
    }

    if(is_front_page()){
        if(current_theme_supports("custom-header")){
        ?>
        <style>
            .header{
                background-image: url(<?php echo header_image(); ?>);
                background-size: cover;
                margin-bottom: 50px;
            }

            .header h3.tagline, h1.heading a{
                color: #<?php echo get_header_textcolor()?>;
                <?php
                if(!display_header_text()){
                    echo "display: none;";
                }
                ?>
            }
        </style>
        <?php

        }
    }
}
add_action("wp_head", "sakib_header_styles");