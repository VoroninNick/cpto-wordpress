<?php get_header(); ?>



	<div class="page_banner_full_width">

		<?php echo do_shortcode('[layerslider id="2"]'); ?>

<script type="text/javascript">
	jQuery.noConflict();
     		jQuery $('document').ready(); 
    		function $('document').ready(function(){
			// Calling LayerSlider on your selected element after the document loaded
       		 	$("#layerslider_2").layerSlider();
    		});
	})(jQuery);
</script>

	</div>	



  <div class="page_content_wraper">

	<div class="page_content_wraper_top">

            <div class="page_content_to_main_menu">

                <div class="page_content_buttons_wraper first_button">

                    <div class="page_content_button_line1 line"></div>

                    <div class="page_content_to_main_menu_button1 content_button">

			<div class="content_button_wraper_1">

                        	<a href="/pro-tsentr/">ПРО ЦЕНТР ПТО</a>

			</div>

                </div>

            </div>

            <div class="page_content_buttons_wraper">

                <div class="page_content_button_line2 line"></div>

                <div class="page_content_to_main_menu_button2 content_button">

			<div class="content_button_wraper_2">

                    		<a href="/sluhacham/">СЛУХАЧАМ</a>

                	</div>

		</div>

            </div>

            <div class="page_content_buttons_wraper">

                <div class="page_content_button_line3 line"></div>

                <div class="page_content_to_main_menu_button3 content_button">

			<div class="content_button_wraper_3">

                    		<a href="/robotodavtsyam/">РОБОТОДАВЦЯМ</a>

			</div>

                </div>

            </div>

        </div>



        <div class="cpto_about_wrap wrapper">

            <div class="cpto_left">

                <div class="cpto_img">

                    <img src="<?php bloginfo('template_directory'); ?>/img/cpto.jpg" alt="cpto"/>

                </div>

            </div>

            <div class="cpto_right">

                <div class="cpto_content">

                    <h3>Вітаємо Вас на сайті Львівського центру професійно - технічної освіти  державної служби зайнятості. </h3>

                    <p>Львівський центр  професійно-технічної освіти  державної служби зайнятості є державним професійно-технічним навчальним закладом третього атестаційного рівня,

                        підпорядкований Державному центру зайнятості Міністерства соціальної політики України через Львівський обласний центр зайнятості,

                        що здійснює професійну підготовку, перепідготовку та підвищення кваліфікації безробітних, а також працюючих осіб і незайнятого населення.</p>

                </div>

                <div class="cpto_navigaations">

                    <nav>

                        

			<a href="/cpto/nash-kolekty-v/">Наш колектив</a> 

			<a href="/cpto/istoriya-tspto/">Історія ЦПТО</a>
			<a href="/pro-tsentr/osvitni-poslugy/">Освітні послуги</a>

                    </nav>

                </div>

            </div>

        </div>

        <div class="clear"></div>

        <div class="page_content_last_news_centr">

            <div class="last_news_centr_button_wraper">

                <div class="last_news_centr_button_line"></div>

                <div class="last_news_centr_button">

                    <h1>Новини центру</h1>

                    <div class="last_news_centr_button_box_shadow"></div>

                </div>

            </div>

            <div class="last_news_centr_items">



		<?php query_posts('cat=3&showposts=4'); ?>

<?php while (have_posts()) : the_post(); ?>

	<li>

<div class="post_img"><div class="img_a_wraper">

<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo get_post_image(); ?>" alt="<?php the_title(); ?>" /></a></div></div>

        <div class="post_content">

	<h4><a href="<?php echo get_permalink(); ?>"><?php trim_title_chars(72, '...'); ?></a></h4>

        <?php the_excerpt(); ?>

        </div>

	</li>

<?php endwhile; ?>

<?php wp_reset_query(); ?>



            </div>



            <div class="page_content_link_to_archive_news">

                <a href="/cpto/arhiv-novy-n/ ">Архів новин</a>

            </div>

        </div>

<div class="clear"></div>

	</div>



	<div class="clear"></div>

        	<div class="image_carousel_wrapper wrapper">



		<?php echo do_shortcode('[as_tejus_mu_carousel id=1]'); ?>



       		</div>

	<div class="clear"></div>

	<div class="page_content_wraper_bottom">



        <div class="news_wrap wrapper">

            <div class="news_button">

                <div class="news_button_line"></div>

                <div class="news_button_title">

                    <h1>Світ, Україна, Львівщина</h1>

                    <div class="last_news_centr_button_box_shadow"></div>

                </div>

            </div>

            <div class="news_items">



               <?php query_posts('cat=10,11,12&showposts=2'); ?>

<?php while (have_posts()) : the_post(); ?>

	<li>

<div class="post_img"><div class="img_a_wraper">

<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo get_post_image(); ?>" alt="<?php the_title(); ?>" /></a></div></div>

        <div class="post_content">

	<h4><a href="<?php echo get_permalink(); ?>"><?php trim_title_chars(72, '...'); ?></a></h4>

        <?php the_excerpt(); ?>

        </div>

	</li>

<?php endwhile; ?>

<?php wp_reset_query(); ?>

               

            </div>

            <div class="page_content_link_to_news">

                <a href="/cpto/novyny-bilshe/">Більше...</a>

            </div>

        </div>

        <div class="clear"></div>



        <div class="our_graduate_wrap wrapper">

            <div class="our_graduate_button">

                <div class="our_graduate_button_line"></div>

                <div class="our_graduate_button_title">

                    <h1>Найкращі випускники</h1>

                    <div class="our_graduate_button_box_shadow"></div>

                </div>

            </div>

            <div class="clear"></div>

            <div class="our_graduate_items">



                <?php query_posts('cat=5&showposts=4'); ?>

		<?php while (have_posts()) : the_post(); ?>

			<li>

				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo 			get_post_image(); ?>" alt="<?php the_title(); ?>" /></a>

				<h2><a href="<?php echo get_permalink(); ?>"><?php trim_title_chars(72, '...'); ?></a></h2>

        			<?php the_excerpt(); ?>

			</li>

		<?php endwhile; ?>

		<?php wp_reset_query(); ?>



            </div>

        </div>

        <div class="clear"></div>



        <div class="our_partners_wrap wrapper">

		<?php query_posts('cat=9&showposts=6'); ?>

		<?php while (have_posts()) : the_post(); ?>

			<li>

				<img src="<?php echo get_post_image(); ?>" alt="<?php the_title(); ?>" />

			</li>

		<?php endwhile; ?>

		<?php wp_reset_query(); ?>

        </div>

        <div class="clear"></div>



        <div class="info_about_work_wrap wrapper">

            <h3>Щоб отримати роботу, Вам потрібно:</h3>

            <ul>

                <li>отримати необхідну для роботи кваліфікацію;</li>

                <li>отримати необхідні навички та елементарні знання про професію;</li>

                <li>пройти курс навчання;</li>

                <li>набути досвід роботи;</li>



                <li>показати свою зацікавленість;</li>

                <li>докласти певних зусиль;</li>

                <li>спланувати свою кар’єру;</li>

                <li>організувати свій час;</li>

            </ul>

            <ul>

                <li>розширити мережу контактів;</li>

                <li>використати свої можливості;</li>

                <li>усвідомити, що вам не байдуже своє майбутнє;</li>

                <li>оцінити свої якості, сильні сторони та чесноти;</li>



                <li>бачити нові можливості роботи;</li>

                <li>дослідити обраний вами сектор;</li>

                <li>навчитися вигідно “продавати” себе роботодавцю;</li>

                <li>бути ентузіастом;</li>

                <li>знати, що ви очікуєте від обраної вами роботи та компанії.</li>

            </ul>

        </div>



        <div class="clear"></div>

        <div class="line_on_friendly_banners"></div>

        <div class="friendly_banners_wrap wrapper">

         

	<li>

		<div class="friendly_banner">

			<div class="friendly_banner_line_1 banner_line"></div>

			<div class="friendly_banner_content">

				<a href="http://loda.gov.ua/">

					<img src="<?php bloginfo('template_directory'); ?>/img/lvivska_derzhavna_administracija.jpg" title="Львівська обласна державна адміністрація" alt="Львівська обласна державна адміністрація"/>

				</a>

			</div>

		</div>

	</li>

            

	<li>

		<div class="friendly_banner">

			<div class="friendly_banner_line_2 banner_line"></div>

			<div class="friendly_banner_content">

				<a href="http://iportal.rada.gov.ua/">

					<img src="<?php bloginfo('template_directory'); ?>/img/vru.jpg" title="Верховна Рала України" alt="Верховна Рала України"/>

				</a>

			</div>

		</div>

	</li>



        <li>

		<div class="friendly_banner">

			<div class="friendly_banner_line_3 banner_line"></div>

			<div class="friendly_banner_content">

				<a href="http://www.dcz.gov.ua/">

					<img src="<?php bloginfo('template_directory'); ?>/img/locz.jpg" title="Львівський обласний центр зайнятості" alt="Львівський обласний центр зайнятості"/>

				</a>

			</div>

		</div>

	</li>

	

        <li>

		<div class="friendly_banner">

			<div class="friendly_banner_line_4 banner_line"></div><div class="friendly_banner_content"><a href="http://www.president.gov.ua/"><img src="<?php bloginfo('template_directory'); ?>/img/kpu.jpg" title="Кабінет президента України" alt="Кабінет президента України"></a></div></div></li>

            <li><div class="friendly_banner"><div class="friendly_banner_line_5 banner_line"></div><div class="friendly_banner_content"><a href="http://www.rec.lviv.ua/"><img src="<?php bloginfo('template_directory'); ?>/img/lmcz.jpg" title="Львівський міський центр зайнятості" alt="Львівський міський центр зайнятості"></a></div></div></li>

            <li><div class="friendly_banner"><div class="friendly_banner_line_6 banner_line"></div><div class="friendly_banner_content"><a href="http://www.kmu.gov.ua/"><img src="<?php bloginfo('template_directory'); ?>/img/kmu.jpg" title="Кабінет Міністрів України" alt="Кабінет Міністрів України"></a></div></div></li>

            <li><div class="friendly_banner"><div class="friendly_banner_line_7 banner_line"></div><div class="friendly_banner_content"><a href="http://www.mon.gov.ua/"><img src="<?php bloginfo('template_directory'); ?>/img/dop.jpg" title="Державний освітній портал" alt="Державний освітній портал"></a></div></div></li>

            <li><div class="friendly_banner"><div class="friendly_banner_line_8 banner_line"></div><div class="friendly_banner_content"><a href="http://loda.gov.ua/"><img src="<?php bloginfo('template_directory'); ?>/img/loda.jpg" title="Львівська обласна державна адміністрація" alt="Львівська обласна державна адміністрація"></a></div></div></li>

        </div>

        <div class="clear"></div>

    </div>

	</div>





<script type="text/javascript">

jQuery.noConflict();

(function($){ 

$(document).ready(function(){

/*Start DocumentReady*/





/*End DocumentReady*/

});

})(jQuery); 

</script>



<?php get_footer(); ?>