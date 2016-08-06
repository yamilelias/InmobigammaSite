<?php

add_action( 'widgets_init', function(){
     register_widget( 'Featured_Property_Widget' );
});	




/**
 * Adds Featured Property Widget.
 */
class Featured_Property_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Featured_Property_Widget', // Base ID
			__('Inmobigama - Propiedades Destacadas', 'text_domain'), // Name
			array( 'description' => __( 'Widget para incluir una propiedad destacada.', 'text_domain' ), ) // Args
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






							$sale_properties = get_posts(array(
										    'post_type' => 'properties',
										    'meta_query' => array(
										        array(
										            'value' => '"' . get_the_ID() . '"',
										            'compare' => 'LIKE'
										        )
										    )
										));

			print_r( get_field('featured_property')  );
			var_dump ($sale_properties);


										$featured_buys = new WP_Query( $sale_properties );
										while ( $featured_buys->have_posts() ) : $featured_buys->the_post(); ?>
							



										<h4>Propiedades Destacadas</h4>

										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><img src="<?php the_field('property_image_1');?>"></a>
										<h5><span><?php the_title(); ?></span></h5>				
									
										<?php if (get_field('sale_or_rent')=='sale' ) { ?>

											<h4><?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0); ?></h4>
										
										<?php } else { ?>

											<h4><?php echo $GLOBALS['theme_settings']['currency'].number_format(get_field('property_price'), 0).$GLOBALS['theme_settings']['rental_period']; ?></h4>

										<?php } ?>

										<h4><?php the_field('sub_title'); ?></h4>
										<p><?php echo substr(get_field('property_details_excerpt'),0,90); ?>...<?php echo sprintf('<a href="%s">Más detalles', esc_url( get_permalink() )),'</a>';?></p>


					

						    <?php 
						endwhile; 

						wp_reset_query(); 









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
			$title = __( 'Propiedad Destacada', 'text_domain' );
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
} // class Featured_Property_Widget