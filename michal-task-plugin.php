<?php
/**
* Plugin Name: Michal Task Plugin
* Description: Form what allows you to add posts with unpublished status
* Version: 1.0
* Author: Michał Grzegorczyk
* Author URI: https://michalgrzegorczyk.pl/
**/

// Script and styles
function mtp_enqueue_scripts()
{
    wp_enqueue_style( 'mtp-style', plugin_dir_url( __FILE__ ) . 'css/styles.css', array(), '', 'all' );
    wp_enqueue_script( 'mtp-script', plugin_dir_url( __FILE__ ) . 'js/script.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'mtp_enqueue_scripts' );

// Shortcode
function mtp_shortcode( $attr )
{
    $msg = '';
    $title = shortcode_atts( array(
		'form-title' => 'Form title:',
		'post-title' => 'Post title:',
		'content-title' => 'Content title:'
	), $attr );
    ?>

        <!-- mtp form -->
        <form id="mtp-form" class="mtp__form" action="<?php plugin_dir_url( __FILE__ ) . 'process.php'; ?>" method="post">

            <h3><?php echo $title['form-title']; ?></h3>

            <div class="mtp__form--wrapper">
                <div>
                    <label for="mtp-title"><?php echo $title['post-title']; ?></label><br>
                    <input type="text" id="mtp-title" name="mtp-title" required>
                </div>

                <div>
                    <label for="mtp-content"><?php echo $title['content-title']; ?></label><br>
                    <textarea id="mtp-content" name="mtp-content" cols="30" rows="10" required></textarea>
                </div> 
            </div>

            <input type="submit" value="Wyślij">

            <?php
                require_once('process.php');
                
                if($msg)
                    echo '<p class="mtp__msg">' . $msg . '</p>';
            ?>
        </form>

    <?php
}
add_shortcode( 'mtp_shortcode', 'mtp_shortcode' );