<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>
 <script type="text/javascript">
		 $(document).ready(function(){
			  $('#contact').ajaxForm(function(data) {
				 if (data==1){
					 $('#success').fadeIn("slow");
					 $('#bademail').fadeOut("slow");
					 $('#badserver').fadeOut("slow");
					 $('#contact').resetForm();
					 }
				 else if (data==2){
						 $('#badserver').fadeIn("slow");
					  }
				 else if (data==3)
					{
					 $('#bademail').fadeIn("slow");
					}
					});
				 });
		</script>

<!-- begin colLeft -->
	<div id="colLeft">
			<h1>Контакти</h1>
			<p><?php echo stripslashes(stripslashes(get_option('boldy_contact_text')))?></p>
			
			<p id="success" class="successmsg" style="display:none;">Ваш лист успішно відправлено!</p>

			<p id="bademail" class="errormsg" style="display:none;">Будь ласка, введіть ваше ім'я, e-mail і повідомлення.</p>
			<p id="badserver" class="errormsg" style="display:none;">Не вдалося відправити повідомлення, спробуйте знову.</p>

			<form id="contact" action="<?php bloginfo('template_url'); ?>/sendmail.php" method="post">
			    <div class="left_part_form">
				<input type="text" id="nameinput" name="name" value="" placeholder="Микола Воронін"/>
					<label for="name">Ваше ім'я</label>

				<input type="text" id="emailinput" name="email" value="" placeholder="nick@voroninstudio.eu"/>
					<label for="email">Ваша ел. почта</label>
				
				<input type="text" id="tellinput" name="tell" value="" placeholder="+380504170728"/>
					<label for="email">Ваш телефон</label>
			    </div>
			    <div class="right_part_form">
				<textarea cols="20" rows="7" id="commentinput" name="comment" placeholder="Текст Вашого повідомлення з запитом до наших менеджерів, або текст вашого повідомлення зі скаргами чи пропозиціями. Будемо вдячні за усі відгуки! Гарного дня!"></textarea><br />
					<label for="comment">Повідомлення</label>
			        <input type="submit" id="submitinput" name="submit" class="submit" value="Надіслати"/>
			        <input type="hidden" id="receiver" name="receiver" value="<?php echo strhex(get_option('boldy_contact_email')); ?>"/>
			    </div>
			</form>
<div class="clear"></div>
			
	</div>
	<!-- end colleft -->


<?php get_footer(); ?>