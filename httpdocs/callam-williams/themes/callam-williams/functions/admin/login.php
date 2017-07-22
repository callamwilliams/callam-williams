<?php

// Adds login.css stylesheet to wp for login page styling customisation.
function my_login_stylesheet() {

  //  Register log in page styles file  //
  wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/assets/src/css/login.css','', null,'' );

  //  Enqueue Global Styles  //
  wp_enqueue_style( 'custom-login' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );


// Adds styling for the theme customiser

function my_customizer_styles() { ?>

  <style>
    h2.customize-control-category {

        display: block;
        margin-bottom: 0;

        color: #454545;

        font-size: 15px;
        line-height: 24px;
		font-weight: bold;
		text-transform: uppercase;
        letter-spacing: 2px;

    }
	p.customize-control-category-description {

		display: block;
		margin: 0 0 6px 0;

		color: #5E5E5E;

		font-size: 12px;
	}
  </style>

<? }
add_action( 'customize_controls_print_styles', 'my_customizer_styles', 999 );
