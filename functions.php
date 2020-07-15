<?php
function sakib_bootstrapping(){
    load_theme_textdomain("sakib");
     add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
}
add_action("after_setup_theme","sakib_bootstrapping");

function sakib_assets(){
    wp_enqueue_style("sakib", get_stylesheet_uri());
    wp_enqueue_style("bootstrap", "//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
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

