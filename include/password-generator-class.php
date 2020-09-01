<?php 
if(!defined('ABSPATH')){
	 exit;
}
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
<script src="<?php //echo site_url( 'wp-includes/js/jquery/jquery.js' , __FILE__ ); ?>"></script>
<!--form for password generator-->
<div id="password_gen_div">

		<h4 style="color:#fff;"> Password Generator Widget</h4>
		<img src="<?php echo plugins_url('',__FILE__).'/pg.png'?>" height="100" width="auto">
		<div id="generated_password"></div>
		<form>
		 <!--  <form  method="POST"> 
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
				
				  </form>  --><br>
				  <div class="form-group">
					<input type="number" name="length" id="length" class="form-control" onchange=" return generate_pw(length);" placeholder="Default value is 30" minlength="1">
				</div>
				<br>
				<div class="form-group">


					<select class="form-control" name="select_para"  id="select_para" onchange = "return generate_pw(this.value,length);">
						<option value="" id="" >----SELECT PARAMETER---</option>
						<option value="all" id="all" >All</option>
						<option value="only_alphabet" id="only_alphabet">Only Alphabet</option>
						<option value="only_numbers" id="only_numbers">Only Numbers</option>
						<option value="only_specialcharacters" id="only_specialcharacters">only Special charaters</option>
						<option value="alphabet_and_specialcharacters" id="alphabet_and_specialcharacters">Alphabet & Special charaters</option>
						<option value="alphabet_and_numbers" id="alphabet_and_numbers">Alphabet & Numbers</option>
						<option value="specialchar_and_numbers" id="specialchar_and_numbers">Specialchar & Numbers</option>


					</select>
				</div>
			</form>
			
	</div>


	<script type="text/javascript">
		
		function generate_pw($valueByUser){
		//alert($valueByUser);
		var valueByUser = $valueByUser;
			
		
			var length = jQuery("#length").val();

			if(length == ""){
			var	length = 30;

			}
			
			if(valueByUser == "all" ){
				
			
			
				
				var chars ='0987654321ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%%^&*()';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);
				
				return true;
					

			}
			
			 if(valueByUser == "only_alphabet"){
				var chars ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);




			}
			 if(valueByUser =="only_numbers"){
				var chars ='1234567890';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 

				return jQuery("#generated_password").html(random_password);



			} 
			 if(valueByUser=="only_specialcharacters"){
				var chars ='~`!@#$%^&*()_+=-';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);

			}
			 if( valueByUser == "specialchar_and_numbers"){
				var chars ='1234567890~`!@#$%^&*()_+=-';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);

			}
			 if(valueByUser =="alphabet_and_numbers"){
				var chars ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);

			}

			if(valueByUser =="alphabet_and_specialcharacters"){
				var chars ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz~`!@#$%^&*()_+=-';
				var random_password ='';
				for(var i = 1;i<=length;i++){

					random_password += chars.charAt(Math.floor(Math.random()*chars.length)); 
				} 
				return jQuery("#generated_password").html(random_password);

			}

			 
			
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



} // class for widget

?>
