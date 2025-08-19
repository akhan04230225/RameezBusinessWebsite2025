<?php
/**
 * Plugin Name: RJB Chatbot
 * Description: Basic chatbot using OpenAI API for R & J Brothers Services FAQs.
 * Version: 1.0
 * Author: R & J Brothers Services LLC
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function rjb_chatbot_enqueue() {
    wp_enqueue_script( 'rjb-chatbot-js', plugin_dir_url( __FILE__ ) . 'js/chatbot.js', [], '1.0', true );
    wp_enqueue_style( 'rjb-chatbot-css', plugin_dir_url( __FILE__ ) . 'css/chatbot.css', [], '1.0' );
    wp_localize_script( 'rjb-chatbot-js', 'rjbChatbot', [
        'apiKey' => defined('OPENAI_API_KEY') ? OPENAI_API_KEY : '',
    ] );
}
add_action( 'wp_enqueue_scripts', 'rjb_chatbot_enqueue' );

function rjb_chatbot_shortcode() {
    return '<div id="rjb-chatbot"></div>';
}
add_shortcode( 'rjb_chatbot', 'rjb_chatbot_shortcode' );
