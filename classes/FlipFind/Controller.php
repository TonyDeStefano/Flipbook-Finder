<?php

namespace FlipFind;

class Controller {
	
	const VERSION = '0.0.1';
	const VERSION_JS = '0.0.1';
	const VERSION_CSS = '0.0.1';

	public function init()
	{
		wp_enqueue_style( 'flipfind-bootstrap-css', plugin_dir_url( dirname( __DIR__ ) ) . 'css/bootstrap.css', array(), ( WP_DEBUG ) ? time() : self::VERSION_CSS );
	}

	public function admin_menus()
	{
		add_menu_page( 'FlipFind', 'FlipFind', 'manage_options', 'flipfind', array( $this, 'print_flipfind_page' ), 'dashicons-search' );
		add_submenu_page( 'flipfind', 'FlipFind', 'FlipFind', 'manage_options', 'flipfind' );
	}

	/**
	 * @param array $links
	 *
	 * @return array
	 */
	public function plugin_link( $links )
	{
		$link = '<a href="admin.php?page=flipfind">Flipbook Finder</a>';
		$links[] = $link;
		return $links;
	}

	public function print_flipfind_page()
	{
		include( dirname( dirname( __DIR__ ) ) . '/includes/flipfind.php' );
	}

    /**
     * @return array
     */
	public function get_flipbooks()
    {
        $flipbooks = array();

        $di = new \RecursiveDirectoryIterator( ABSPATH . 'Caritas/' , \RecursiveDirectoryIterator::SKIP_DOTS );
        $it = new \RecursiveIteratorIterator( $di );

        foreach ( $it as $file )
        {
            if ( pathinfo( $file, PATHINFO_EXTENSION ) == 'html' )
            {
                $contents = file_get_contents( $file );
                if ( strpos( $contents, '<meta name="monitor-signature" content="monitor:player:html5">' ) !== FALSE )
                {
                    $flipbooks[] = str_replace( ABSPATH, get_site_url() . '/', $file );
                }
            }
        }

        return $flipbooks;
    }
}