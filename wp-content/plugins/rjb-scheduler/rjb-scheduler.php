<?php
/**
 * Plugin Name: RJB Scheduler
 * Description: Simple service scheduling form for R & J Brothers Services.
 * Version: 1.0
 * Author: R & J Brothers Services LLC
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function rjb_register_appointment_cpt() {
    $args = [
        'public' => false,
        'show_ui' => true,
        'label' => 'Appointments',
        'supports' => [ 'title', 'custom-fields' ],
    ];
    register_post_type( 'rjb_appointment', $args );
}
add_action( 'init', 'rjb_register_appointment_cpt' );

function rjb_schedule_form_shortcode() {
    if ( isset( $_POST['rjb_schedule_nonce'] ) && wp_verify_nonce( $_POST['rjb_schedule_nonce'], 'rjb_schedule' ) ) {
        $name    = sanitize_text_field( $_POST['rjb_name'] );
        $service = sanitize_text_field( $_POST['rjb_service'] );
        $date    = sanitize_text_field( $_POST['rjb_date'] );

        $post_id = wp_insert_post( [
            'post_type'   => 'rjb_appointment',
            'post_title'  => $name . ' - ' . $service,
            'post_status' => 'publish',
        ] );

        if ( $post_id ) {
            update_post_meta( $post_id, 'service', $service );
            update_post_meta( $post_id, 'date', $date );
            echo '<p>Thank you! We will contact you shortly to confirm your appointment.</p>';
        }
    }

    ob_start();
    ?>
    <form method="post">
      <?php wp_nonce_field( 'rjb_schedule', 'rjb_schedule_nonce' ); ?>
      <p><label>Name<br><input type="text" name="rjb_name" required></label></p>
      <p><label>Service<br><input type="text" name="rjb_service" required></label></p>
      <p><label>Date<br><input type="date" name="rjb_date" required></label></p>
      <p><button type="submit">Schedule</button></p>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode( 'rjb_schedule_form', 'rjb_schedule_form_shortcode' );
