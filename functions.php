<?php

add_action( 'wp_enqueue_scripts', 'add_scripts_kingpur' );
// wp_register_script('u_kingpur');
function add_scripts_kingpur(){
    global $post; 
    
    if( $post && $post->ID ){
        $paramsSeo=[
            'title'=>$post->post_title
        ];
    }else{
        $paramsSeo=[];
    }
   

    wp_register_script(
        'u_kingpur',
        get_theme_file_uri ('/app/dist/assets/index.js'),
        [],
        null,
        true
    );
    wp_register_style(
        'u_kingpur_css',
        get_theme_file_uri ('/app/dist/assets/index.css')
    );
    
    wp_localize_script( 'u_kingpur', 'seo', $paramsSeo ); 
    wp_enqueue_style('u_kingpur_css');
    wp_enqueue_script('u_kingpur');
}