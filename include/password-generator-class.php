<?php 
/**
 * Adds Password Generator  widget.
 */
class Password_generator_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'Password_generator_Widget', // Base ID
			esc_html__( 'Password Generator', 'PGW_domain' ), // Name
			array( 'description' => esc_html__( 'Widget for generating random password', 'PGW_domain' ), ) // Args
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
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		?>

<script type="text/javascript" src="<?php echo plugins_url('',__FILE__).'/PGW_Script.js';?>"></script>
		
		<style type="text/css">
		#generated_password{
  		background-color: lightgrey;
  		max-height: 70px;
  		height: 70px;
  		width: auto;
  		padding: 5px;
  		font-size: 22px;
  		text-align: center;
  		color: black;
  		border-radius: 15px;
  		margin-bottom: 5px;
  	}

  	#password_gen_div{
  		background-color: rgba(0,0,0,0.6);
  		margin-top: 5px;
  		color: white;
  		border-radius: 15px;
  		padding: 10px;
  	}
  	input{
  		margin-left: 3px;
  	}

  	img{
  		margin-left: auto;
  		margin-right: auto;
  		display: block;
  		height: 80px;
  		width: auto;
  	}

</style>
<!--form for password generator-->
<div id="password_gen_div">

		<h4 style="color:#fff;"> Password Generator Widget</h4>
		<img src="<?php echo plugins_url('',__FILE__).'/pg.png'?>" height="100" width="auto">
		<div id="generated_password"></div>
		  <form  method="POST" action="" > 
				<div class="form-group">
					<input type="checkbox" name="all" value="all" onchange = "return generate_pw();"> All
				</div>
				<div class="form-group">
					<input type="checkbox" name="only_alphabet" value="only_alphabet" onchange="return generate_pw();"> Alphabet Only
				</div>
				<div class="form-group">
					<input type="checkbox" name="only_numbers" value="only_numbers" onchange="return generate_pw();"> Numbers Only
				</div>
				<div class="form-group">
					<input type="checkbox" name="only_specialcharacters" value="only_specialcharacters" onchange="return generate_pw();"> Special Characters Only
				</div>
				<div class="form-group">
					<label style="color:#fff;">Length:</label>
					<input type="text" name="length" id="length" class="form-control" onkeyup="return generate_pw(this.value);" placeholder="Default value is 30">
				</div>
				
				  </form> 
			
	</div>

	<script type="text/javascript">
		
		function generate_pw($len){

		//alert($len);

			var all = jQuery('input[name="all"]:checked').val();
			var only_alphabet = jQuery('input[name="only_alphabet"]:checked').val();
			var only_numbers = jQuery('input[name="only_numbers"]:checked').val();
			var only_specialcharacters = jQuery('input[name="only_specialcharacters"]:checked').val();
			
			var length = $len;
			//alert(length);
			var plugin_path = '<?php echo plugins_url('',__FILE__).'/generate_random_password.php'; ?>';
			
			//alert(plugin_path);
			var data = {

				"all":all,
				"only_alphabet":only_alphabet,
				"only_numbers":only_numbers,
				
				"only_specialcharacters":only_specialcharacters,
				"length":length

			}

			
		$.ajax({
				type:'POST',
				url:plugin_path,
				data:data,
				success:function(res){
					//alert(res);
					jQuery("#generated_password").html(res);

				}
			});


	}

	</script>

		
		<?php
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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Password Generator', 'PGW_domain' );
		?>
		
		 <p>
			
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
			<?php esc_attr_e( 'Title:', 'PGW_domain' ); ?>
				
			</label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}

} // class Foo_Widget

?>