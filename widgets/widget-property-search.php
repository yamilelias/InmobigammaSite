<?php

include_once('property-search-form.php');

add_action( 'widgets_init', function(){
     register_widget( 'Property_Search_Widget' );
});	


/**
 * Adds Property_Search_Widget widget.
 */
class Property_Search_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Property_Search_Widget', // Base ID
			__('Inmobigama - Formulario de Búsqueda de Propiedades', 'text_domain'), // Name
			array( 'description' => __( 'Agregar un formulario de búsqueda de propiedades a la barra lateral', 'text_domain' ), ) // Args
		);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	
		echo '<div class="realestatepro-widget-header">';

	     	echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}

			echo '<div class="realestatepro-widget-body">';

				$formwidth 			= "widget-form-width";
				$inputclass			= "widget-format";
				$fullwidth 			= "col-xs-12 col-sm-12 col-md-12";
				$halfwidth 			= "col-xs-12 col-sm-12 col-md-6";
				$halfwidthmargin 	= "col-xs-12 col-sm-12 col-md-6 half-width-margin";    
				$buttonwidth 		= "col-xs-12 col-sm-12 col-md-12";		

				property_search_form ( $formwidth, $inputclass, $fullwidth, $halfwidth, $halfwidthmargin, $buttonwidth ); 

			echo '</div>';

		echo '</div>';

		echo $args['after_widget'];
	}


	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Buscar Propiedades', 'text_domain' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Título:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}


	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // class Property_Search_Widget