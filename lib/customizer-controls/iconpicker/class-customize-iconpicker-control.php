<?php

if ( class_exists( 'WP_Customize_Control' ) && !class_exists('Hoo_Customize_Iconpicker_Control') ) {
add_action( 'customize_register', function( $wp_customize ) {
	class Hoo_Customize_Iconpicker_Control extends WP_Customize_Control {

		/**
		 * Render the control's content.
		 */
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
				<div class="input-group icp-container">
					<input data-placement="bottomRight" class="icp icp-auto" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" type="text">
					<span class="input-group-addon"></span>
				</div>
			</label>
			<?php
		}

		/**
		 * Enqueue required scripts and styles.
		 */
		public function enqueue() {
			wp_enqueue_script( 'avata-fontawesome-iconpicker', get_template_directory_uri() . '/lib/customizer-controls/iconpicker/assets/js/fontawesome-iconpicker.min.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'avata-iconpicker-control', get_template_directory_uri() . '/lib/customizer-controls/iconpicker/assets/js/iconpicker-control.js', array( 'jquery' ), '1.0.0', true );
			wp_enqueue_style( 'avata-fontawesome-iconpicker', get_template_directory_uri() . '/lib/customizer-controls/iconpicker/assets/css/fontawesome-iconpicker.min.css' );
			wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/customizer-controls/iconpicker/assets/css/font-awesome.min.css' );
		}

	}

	// Register our custom control with Kirki
	add_filter( 'kirki_control_types', function( $controls ) {
		$controls['iconpicker'] = 'Hoo_Customize_Iconpicker_Control';
		return $controls;
	} );

} );

}