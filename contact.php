<?php

// Set email variables
$email_to = get_field('contact_email_address');
$email_subject = get_field('contact_email_subject_message');
$emailFrom = '';
$emailFrom = $_REQUEST["email"];
$headers .= "From: <".$emailFrom.">". "\r\n";


// Set required fields
$required_fields = array('fullname','email','comment');

// set error messages
$error_messages = array(
    'fullname' => 'Por favor ingresa tu Nombre.',
    'email' => 'Por favor ingresa un correo electrónico válido.',
    'comment' =>'Por favor ingresa tu mensaje.'
);

// Set form status
$form_complete = FALSE;

// configure validation array
$validation = array();

// check form submittal
if(!empty($_POST)) {
    // Sanitise POST array
    foreach($_POST as $key => $value) $_POST[$key] = remove_email_injection(trim($value));
    
    // Loop into required fields and make sure they match our needs
    foreach($required_fields as $field) {       
        // the field has been submitted?
        if(!array_key_exists($field, $_POST)) array_push($validation, $field);
        
        // check there is information in the field?
        if($_POST[$field] == '') array_push($validation, $field);
        
        // validate the email address supplied
        if($field == 'email') if(!validate_email_address($_POST[$field])) array_push($validation, $field);
    }
    
    // basic validation result
    if(count($validation) == 0) {
        // Prepare our content string
        $email_content = 'Tienes un nuevo mensaje de un visitante en tu Sitio Web: ' . "\n\n";
        
        // simple email content
        foreach($_POST as $key => $value) {
            if($key != 'submit') $email_content .= $key . ': ' . $value . "\n";
        }
        
        // if validation passed ok then send the email
        mail($email_to, $email_subject, $email_content, $headers);
        
        // Update form switch
        $form_complete = TRUE;

            

            header("location: /confirmation"); 
    }
}

function validate_email_address($email = FALSE) {
    return (preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $email))? TRUE : FALSE;
}

function remove_email_injection($field = FALSE) {
   return (str_ireplace(array("\r", "\n", "%0a", "%0d", "Content-Type:", "bcc:","to:","cc:"), '', $field));
}

?>

<?php
/*
Template Name: Contact Page
*/
?>

<?php get_header(); ?>

<div class="row">

	<div class="wrapper">	

		<?php if ( get_theme_mod( 'realestatepro_sidebar_position', esc_attr__( 'right', 'realestatepro' ) ) == "left" )  

			{ echo '<div class="col-xs-12 col-sm-12 col-md-3 sidebar left-sidebar">'; }

		else

			{ echo '<div class="col-xs-12 col-sm-12 col-md-3 sidebar right-sidebar">'; }

		?>

			<?php get_sidebar(); ?>
		
		</div>

		<div class="col-xs-12 col-sm-12 col-md-9 feature">

			<div class="col-xs-12 col-sm-12 col-md-12 page-style">

			<?php 

				if( have_posts() ):

					while( have_posts() ): the_post(); ?>

					<div class="col-xs-12 col-sm-12-col-md-12">

						<h1><?php the_title(); ?></h1>

						<p><?php the_content(); ?></p>

					</div>

					<div class="col-xs-12 col-sm-12-col-md-12">

						<div id="contact_form">
						    <?php if($form_complete === FALSE) { ?>

									<form action="" method="post" id="contact-form">
										
										<div class="col-xs-12 col-sm-4 col-md-4">
											<label for="fullname">Nombre</label>
									     	<input type="text" id="fullname" class="detail" name="fullname" value="<?php echo isset($_POST['fullname'])? $_POST['fullname'] : ''; ?>" />
									    	<?php if(in_array('fullname', $validation)): ?><span class="error"><?php echo $error_messages['fullname']; ?></span><?php endif; ?>
									    </div>
									    
									    <div class="col-xs-12 col-sm-4 col-md-4">
											<label for="email">Correo Electrónico</label>
										    <input type="text" id="email" class="detail" name="email" value="<?php echo isset($_POST['email'])? $_POST['email'] : ''; ?>" />
										    <?php if(in_array('email', $validation)): ?><span class="error"><?php echo $error_messages['email']; ?></span><?php endif; ?>
									    </div>
									       
									    
									    <div class="col-xs-12 col-sm-12 col-md-12 message-label">
											<label for="comment">Mensaje</label>
										    <textarea id="comment" name="comment" class="mess"><?php echo isset($_POST['comment'])? $_POST['comment'] : ''; ?></textarea>
										    <?php if(in_array('comment', $validation)): ?><span class="error"><?php echo $error_messages['comment']; ?></span><?php endif; ?>
									    </div>
									    
									    <div class="col-xs-12 col-sm-4 col-md-4">
									    	<button type="submit" class="contact-form-button" >Enviar</button>
									    </div>

									</form>

						<?php } ?>

						</div>

					</div>	 

					<?php if(get_field('contact_address') ) 

					{?>

						<div class="col-xs-12 col-sm-12-col-md-12">
							<hr>
							<h4>Nuestra Dirección</h4>
							<p><?php the_field('contact_address'); ?></p>
							<?php 

								$location = get_field('map');

								if( !empty($location) ):
								?>
								<div class="google-map">
									<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
								</div>
							<?php endif; ?>
						</div>

					<?php } ?>

					<?php endwhile;

				endif;

			?>

			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>