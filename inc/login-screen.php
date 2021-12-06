<?php
/**
 * Login Logo
 *
 * @package      RiftValley
 * @author       Bill Erickson
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Login Logo URL
 *
 */
function ea_login_header_url( $url ) {
    return esc_url( 'https://rift-valley.com/' );
}
add_filter( 'login_headerurl', 'ea_login_header_url' );
add_filter( 'login_headertext', '__return_empty_string' );

/**
 * Login Logo 
 *
 */
function ea_login_logo() {

	$logo_path = '/assets/images/logo.png';
    $bg_path = '/assets/images/bg.jpg';

	$logo = get_stylesheet_directory_uri() . $logo_path;
	$bg = get_stylesheet_directory_uri() . $bg_path;
    ?>
    <style type="text/css">

        body.login {
            font-family: 'Mulish', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
            color: #acacac;
            background: #272626 url(<?php echo $bg;?>);
        }
        
        .login > div:first-of-type {
            width: 340px;
        }

        .login form {
            border: 2px solid #d89100;
            border-radius: 10px;
            background: #272626;
        }

        .login form .input, 
        .login form input[type="checkbox"], 
        .login input[type="text"] {
            background: #272626;
            color: white;
        }

        .login .message, .login .success, .login form {
            box-shadow: 0px 1px 8px rgba(0,0,0,.15);
        }

        .login h1 a {
            background-image: url(<?php echo $logo;?>);
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;
            display: block;
            overflow: hidden;
            text-indent: -9999em;
            width: 312px;
            height: 100px;
            margin-bottom: 0;
        }

        .login h1::after {
            content: 'Intranet';
            color: white;
            margin-bottom: 15px;
        }

        .login .wp-hide-pw > .dashicons {
            color: #d89100;
        }

        .login input[type="checkbox"]:focus,
        .login input[type="password"]:focus,
        .login input[type="text"]:focus {
            border-color: #d89100;
            box-shadow: 0 0 0 1px #d89100;
        }

        .wp-core-ui .button-primary {
            background: #d89100;
            border-color: #d89100;
            color: #272626;
            border-radius: 6px;
        }

        .wp-core-ui .button-primary:hover {
            background: #c28300;
            border-color: #c28300;
            color: #272626;
        }

        .login #nav a {
            color: #d89100;
        }
        #backtoblog {
            display: none;
        }

        .login #login_error, 
        .login .message, 
        .login .success {
            border-left: 4px solid #d89100;
            padding: 12px;
            margin-left: 0;
            margin-bottom: 20px;
            margin-top: 10px;
            background-color: #141212;
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.61);
            color: #cacaca;
        }
    
    </style>
    <?php
}
add_action( 'login_head', 'ea_login_logo' );