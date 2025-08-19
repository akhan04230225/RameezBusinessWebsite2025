<?php get_header(); ?>

<div class="hero">
  <h1>R & J Brothers Services LLC</h1>
  <p>Your one-stop shop for home services.</p>
</div>

<section class="services">
  <?php
    $services = [
      'Pressure Washing',
      'Lawn Care',
      'Painting',
      'Home Repairs',
      'Furniture Assembly'
    ];
    foreach ( $services as $service ) {
      echo '<div class="service-card"><h3>' . esc_html( $service ) . '</h3></div>';
    }
  ?>
</section>

<section class="schedule-section">
  <h2>Schedule a Service</h2>
  <?php echo do_shortcode('[rjb_schedule_form]'); ?>
</section>

<div class="chatbot-section">
  <?php echo do_shortcode('[rjb_chatbot]'); ?>
</div>

<?php get_footer(); ?>
