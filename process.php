<?php 
if( isset( $_POST["mtp-title"] ) && isset( $_POST["mtp-content"] ) ) 
{
    $title = preg_replace('/<[^>]*>/', '', $_POST["mtp-title"]);
    $content = preg_replace('/<[^>]*>/', '', $_POST["mtp-content"]);

    // Create post object
    $my_post = array(
        'post_title'    => $title,
        'post_content'  => $content,
        'post_status'   => 'draft'
    );
    
    // Insert the post into the database
    wp_insert_post( $my_post );

    $msg = 'Post został dodany pomyślnie';
}