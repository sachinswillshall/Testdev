<?php
/***********************************************************************************/
/* WARNING:                                                                        */
/* The wp-config.php file is automatically generated by Flywheel. You will not be  */
/* able to edit this file yourself. Defines needed for plugins can be added to a   */
/* php file in your wp-content/mu-plugins directory. If you need to add defines    */
/* for core WordPress functionality, please contact Flywheel support at            */
/* app.getflywheel.com/help.                                                       */
/***********************************************************************************/

defined('WP_CONTENT_DIR') or define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );

define('FLYWHEEL_CONFIG_DIR', dirname(__FILE__) . '/flywheel-config');
define('FLYWHEEL_PLUGIN_DIR', FLYWHEEL_CONFIG_DIR . '/plugins');
define('FLYWHEEL_DEFAULT_PROTOCOL', 'https://');
define('WPMU_PLUGIN_DIR', dirname(__FILE__) . '/wp-content/mu-plugins');
define('WPMU_PLUGIN_URL', '/wp-content/mu-plugins');
define('FS_METHOD', 'direct');
define('WP_POST_REVISIONS',  10);
define('WP_MEMORY_LIMIT', '300M');

define('FW_EVENT_ENABLED', false);
define('FW_HOME_PURGE', false);



/****************************************************************************/
/*                           Domain Configuration                           */
/****************************************************************************/

if ( !(defined('WP_CLI') && WP_CLI) ) {
    define('WP_SITEURL', FLYWHEEL_DEFAULT_PROTOCOL . 'www.visitarundel.co.uk');
    define('WP_HOME', FLYWHEEL_DEFAULT_PROTOCOL . 'www.visitarundel.co.uk');
}




/****************************************************************************/
/*                         Database Configuration                           */
/****************************************************************************/
define('DB_NAME', 'db3455249675');
define('DB_USER', 'fw1055482857');
define('DB_PASSWORD', 'iy22zrLxDoY15efCNvv1ZEP6o6YsU5');
define('DB_HOST', '192.168.2.21');

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');

$table_prefix  = 'wp_wav1xbixd3_';









/****************************************************************************/
/*                             WordPress Salts                              */
/****************************************************************************/
define('AUTH_KEY',          ';HjTOz_Y?#NR2FXn%J5K|!a9&`CWWw+JJ1n9k;Wmkv=In*U-sRN!P^HyZN:{eQ.K');
define('SECURE_AUTH_KEY',   '{?O*MV$B3w+{YR%Fx0`36q(UUgB_>O..A:V7mNJ2T.0},8jjVeiB1v18G=:e<T2d');
define('LOGGED_IN_KEY',     'w7f!6Sv^O:1qh?[>E)mtj#>@c]y$B3{ey&S/*dhSP,XF4p!H57qZZON:/,_@{hAC');
define('NONCE_KEY',         'D9&lP8]RyGd#;(UKBt@LP]`:Nvyc3^v*xX.]%!|7)&E3NyKGKx)>Z&ANeBGxhpWE');
define('AUTH_SALT',         '8BN3Sv[q6:0>lZ5]4iqJX+G<zs3Y1:*3H.13lp}U,bZ;2;,<X|E5m|NWF5<QXW}2');
define('SECURE_AUTH_SALT',  '8zA#{X-XY.+0cK#F4v5A$7l$Coultq,&TL%v%!xF)|ok:YuL>[flm|Gd|L%hQLw]');
define('LOGGED_IN_SALT',    '3BiaR@J^awsmL3|Qk29D188-iFCZJ_r<{;*Wg:/v_G-*RulK~y2%eTbTw`7o5.(]');
define('NONCE_SALT',        'De&SpwP4q:m=-%E%6uwn<-[0ZA.=y@<X&h?#/LAI,ljye>viR@TDyUkVH0Q@Ax8G');


/****************************************************************************/
/*                        General WordPress Settings                        */
/****************************************************************************/

define('WPLANG', '');


define('WP_DEBUG', false);

define('WP_CACHE', false);







/****************************************************************************/
/*                     Disable WordPress Auto-updates                       */
/*           http://getflywheel.com/flywheel-wordpress-3-7/                 */
/****************************************************************************/
define('WP_AUTO_UPDATE_CORE', false);

/****************************************************************************/
/*                    Flywheel NextGen Gallery Support                      */
/****************************************************************************/
define('NGG_GALLERY_ROOT_TYPE', 'content');


if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/.wordpress/');

if ( !empty( $_SERVER['HTTP_FASTLY_SSL'] ) || ( !empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && ( $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ) ) )
	$_SERVER['HTTPS']='on';



require_once(ABSPATH . 'wp-settings.php');
