<?php

/** 
 * Plugin Name: GA Tabbed Mobile Menu
 * Description: custom tabbed mobile menu
 * Version: 1.0
 * Author: Genna Gonzaga
 * Author URI: //gennagonzaga.com
 */
require( 'ga-nav-walker.php' );
class GATab{
    private $navWalker;

    public function __construct(){
        add_shortcode( 'ga_tmm',[$this, 'do_show_tmm'] );
        add_action( 'wp_enqueue_scripts', [$this, 'do_enqueue_these'] );
        $this->navWalker = new GA_Nav_Walker();
    }

    public function do_enqueue_these(){
        if( !wp_script_is( 'jquery','enqueued' ) ){
            wp_enqueue_script( 'jquery' );
        }
        wp_enqueue_script( 'ga-tmm-js', plugins_url( 'js/ga-tmm.js',__FILE__ ), [ 'jquery' ] );
        wp_enqueue_style( 'ga-tmm-css', plugins_url( 'css/ga-tmm.css', __FILE__ ) );
    }

    public function do_show_tmm(){
        ob_start();

        ?>

            <div id="ga-tmm" class="ga-tmm">
                <div id="ga-product-cats" class="ga-tmm-tab open">
                    <?php wp_nav_menu( [ 
                        'menu' => 'Mobile Product Categories',
                        'menu_class' => 'tmm-menu',
                        'walker' => $this->navWalker
                    ] ); ?>
                </div>
                <div id="ga-about-company" class="ga-tmm-tab">
                    <?php wp_nav_menu( [ 
                        'menu' => 'Mobile About',
                        'menu_class' => 'tmm-menu',
                        'walker' => $this->navWalker 
                    ] ); ?>
                </div>
                <div id="ga-more" class="ga-tmm-tab">
                    <?php wp_nav_menu( [ 
                        'menu' => 'Mobile More',
                        'menu_class' => 'tmm-menu',
                        'walker' => $this->navWalker
                    ] ); ?>
                </div>
                <ul id="ga-tmm-nav" class="tmm-controls">
                    <li class="tmm-control open">
                        <a href="#ga-product-cats"><?php _e( 'Shop','et' ); ?></a>
                    </li>
                    <li class="tmm-control">
                        <a href="#ga-about-company"><?php _e( 'About','et' ); ?></a>
                    </li>
                    <li class="tmm-control">
                        <a href="#ga-more"><?php _e( 'More','et' ); ?></a>
                    </li>
                </ul>
            </div>

        <?php

        return ob_get_clean();
    }

}

new GATab();