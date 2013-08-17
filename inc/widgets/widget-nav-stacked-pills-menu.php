<?php
/**
 * Menu widget with Bootstrap Stacked Pills markup.
 * Credit to Andrey Savchenko for the original version of this widget
 *
 * @package Alien Ship
 * @subpackage Widgets
 * @since .93
 */
class Nav_Stacked_Pills_Menu_Widget extends WP_Nav_Menu_Widget {

	private $instance;

	function __construct() {

		WP_Widget::__construct(
			'nav_stacked_pills_menu',
			__( 'Custom Menu: Stacked Pills', 'alienship' ),
			array(
				'description' => __( 'Custom menu widget using Nav Stacked Pills styling', 'alienship' )
			)
		);
	}

	function widget( $args, $instance ) {

		$this->instance = $instance;
		add_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
		add_filter( 'wp_nav_menu', array( $this, 'wp_nav_menu' ) );
		parent::widget( $args, $instance );
		remove_filter( 'wp_nav_menu_args', array( $this, 'wp_nav_menu_args' ) );
		remove_filter( 'wp_nav_menu', array( $this, 'wp_nav_menu' ) );
	}

	function wp_nav_menu_args( $args ) {

		$args['container_class'] = empty( $this->instance['well'] ) ? '' : 'well';
		$args['menu_class']      = 'menu nav nav-pills nav-stacked';

		return apply_filters( 'nav_stacked_pills_menu_args', $args );
	}

	function wp_nav_menu( $nav_menu ) {

		$nav_menu = str_replace( '"sub-menu"', '"sub-menu nav nav-pills nav-stacked"', $nav_menu );
		$nav_menu = str_replace( 'current-menu-item', 'current-menu-item active', $nav_menu );

		return $nav_menu;
	}

	function update( $new_instance, $old_instance ) {

		$instance         = parent::update( $new_instance, $old_instance );
		$instance['well'] = (boolean) $new_instance['well'];

		return $instance;
	}

	function form( $instance ) {

		parent::form( $instance );
		$well = isset( $instance['well'] ) ? $instance['well'] : false;

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'well' ); ?>"><?php echo __( '"well" Container', 'alienship' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'well' ); ?>" name="<?php echo $this->get_field_name( 'well' ); ?>" <?php checked( $well )  ?> />
		</p>
		<?php
	}
}