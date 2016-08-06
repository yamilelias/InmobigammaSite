<?php

add_action( 'widgets_init', function(){
     register_widget( 'Mortgage_Calculator_Widget' );
});	

/**
 * Adds Mortgage Calculator Widget. Note that when the Calculate button is pressed the function 'validate_mortgage_calculator_form' is called this is located in the js/realestatepro.js file.
 */
class Mortgage_Calculator_widget extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Mortgage_Calculator_widget', // Base ID
			__('Inmobigama - Calculadora de Hipoteca', 'text_domain'), // Name
			array( 'description' => __( 'Agregar una calculadora de hipoteca a la barra lateral.', 'text_domain' ), ) // Args
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

			if($instance['title'])
				$title = $instance['title'];
			else
				$title = "Calculadora de Hipoteca";

	     	echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}

			echo '<div class="realestatepro-widget-body">';

				echo '<h2 class="text-center">' . $title . '</h2>';

				echo '<form id="mortgage-calculator-form" action="" method="post" target="_self" class="widget-mortgage-calculator-width">';

				echo '<label class="mortgage-calculator-label">Precio de la propiedad ('.$GLOBALS['theme_settings']['currency'].')</label><input type="text" id="Property_Price" name="Property_Price" value="" class="mortgage-calculator-inputs"><div class="clearfix"></div>';

				echo '<label class="mortgage-calculator-label">Tu Depósito ('.$GLOBALS['theme_settings']['currency'].')</label><input type="text" id="Deposit" name="Deposit" value="" class="mortgage-calculator-inputs"><div class="clearfix"></div>';

				echo '<label class="mortgage-calculator-label">Duración (Años)</label><input type="text" id="Duration" name="Duration" value="" class="mortgage-calculator-inputs"><div class="clearfix"></div>';

				echo '<label class="mortgage-calculator-label">Tasa de Interés (%)</label><input type="text" id="InterestRate" name="InterestRate" value="" class="mortgage-calculator-inputs"><div lasss="clearfix"></div>';

				echo '<hr>';

				echo '<div class="mortgage-results">';

					echo '<h3> Resultados </h3>';

					echo '<label class="mortgage-results-label">Cantidad de la Hipoteca ('.$GLOBALS['theme_settings']['currency'].')</label>';
					echo '<input type="text" id="Mortgage" name="Mortgage" readonly disabled value="" class="mortgage-calculator-results disabled">';

					echo '<label class="mortgage-results-label">Por mes, sólo el interés ('.$GLOBALS['theme_settings']['currency'].')</label>';
					echo '<input type="text" id="Repayment" name="Repayment" readonly disabled value="" class="mortgage-calculator-results disabled">';

					echo '<label class="mortgage-results-label">Por mes, pago por hipoteca ('.$GLOBALS['theme_settings']['currency'].')</label>';
					echo '<input type="text" id="Interest" name="Interest" readonly disabled value="" class="mortgage-calculator-results disabled">';

				echo '</div>';
				
				echo '<button id="mortgage-calculator-button" class="mortgage-calculator-button" onclick="validate_mortgage_calculator_form( form )" type="button">Calcular</button>';

				echo '</form>';

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
			$title = __( 'Calcular el Costo de la Hipoteca', 'text_domain' );
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
} // class Mortgage_Calculator_Widget