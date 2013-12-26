<?php

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = '.active_main_menu ';
     }
     return $classes;
}

/*Функція яка запобігає повторному підключенню бібліотеки Jquery */
function jquery_init() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'jquery_init');




function trim_title_chars($count, $after) {

$title = get_the_title();

if (mb_strlen($title) > $count) $title = mb_substr($title,0,$count);

else $after = '';

echo $title . $after;

}



function wp_infinitepaginate(){

    $loopFile        = $_POST['loop_file'];

    $paged           = $_POST['page_no'];

    $posts_per_page  = get_option('posts_per_page');



    # Load the posts

    query_posts(array('paged' => $paged ));

    get_template_part( $loopFile );

    exit;

}

add_action('wp_ajax_infinite_scroll', 'wp_infinitepaginate');           // for logged in user

add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinitepaginate');    // if user not logged in

/* Функція яка міняє довжину обрізаного тексту - по замовчуванні 55 слів*/



/*******************************

 EXCERPT LENGTH ADJUST

********************************/



function home_excerpt_length($length) {

	return 20;

}

add_filter('excerpt_length', 'home_excerpt_length');





/*функція отримування зображення з публікації*/

function get_post_image() {

global $post, $posts;

$first_img = '';

ob_start();

ob_end_clean();

$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

$first_img = $matches [1] [0];



if(empty($first_img)){ 

$img_dir = get_bloginfo('template_directory');

$first_img = $img_dir . '/images/post-default.jpg';

}

return $first_img;

}





if ( function_exists( 'wp_nav_menu' ) ){

	if (function_exists('add_theme_support')) {

		add_theme_support('nav-menus');

		add_action( 'init', 'register_my_menus' );

		function register_my_menus() {

			register_nav_menus(

				array(

					'main-menu' => __( 'Main Menu' )

				)

			);

		}

	}

}





/** GOOGLE MAPS **/

function symby_googlemap($atts, $content = null) {

    extract(shortcode_atts(array(

        "width" => '650',

        "height" => '400',

        "src" => ''

    ), $atts));

    return '<div class="box_map">

<iframe src="'.$src.'&output=embed" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="'.$width.'" height="'.$height.'"></iframe>

</div>';}

add_shortcode("map", "symby_googlemap");





/* CallBack functions for menus in case of earlier than 3.0 Wordpress version or if no menu is set yet*/



function primarymenu(){ ?>

			<div id="mainMenu" class="ddsmoothmenu">

				<ul>

					<?php wp_list_pages('title_li='); ?>

					<?php wp_list_categories('hide_empty=1&exclude=1&title_li='); ?>

				</ul>

			</div>

<?php }



/*******************************

 THUMBNAIL SUPPORT

********************************/



add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 300, 200, true );





/* Get the thumb original image full url */



function get_thumb_urlfull ($postID) {

$image_id = get_post_thumbnail_id($post);  

$image_url = wp_get_attachment_image_src($image_id,'large');  

$image_url = $image_url[0]; 

return $image_url;

}









/*******************************

 WIDGETS AREAS

********************************/



if ( function_exists('register_sidebar') )

register_sidebar(array(

	'name' => 'sidebar',

	'before_widget' => '<div class="rightBox">',

	'after_widget' => '</div>',

	'before_title' => '<h2>',

	'after_title' => '</h2>',

));



register_sidebar(array(

	'name' => 'footer',

	'before_widget' => '<div class="boxFooter">',

	'after_widget' => '</div>',

	'before_title' => '<h2>',

	'after_title' => '</h2>',

));

	

/*******************************

 PAGINATION

********************************

 * Retrieve or display pagination code.

 *

 * The defaults for overwriting are:

 * 'page' - Default is null (int). The current page. This function will

 *      automatically determine the value.

 * 'pages' - Default is null (int). The total number of pages. This function will

 *      automatically determine the value.

 * 'range' - Default is 3 (int). The number of page links to show before and after

 *      the current page.

 * 'gap' - Default is 3 (int). The minimum number of pages before a gap is 

 *      replaced with ellipses (...).

 * 'anchor' - Default is 1 (int). The number of links to always show at begining

 *      and end of pagination

 * 'before' - Default is '<div class="emm-paginate">' (string). The html or text 

 *      to add before the pagination links.

 * 'after' - Default is '</div>' (string). The html or text to add after the

 *      pagination links.

 * 'title' - Default is '__('Pages:')' (string). The text to display before the

 *      pagination links.

 * 'next_page' - Default is '__('&raquo;')' (string). The text to use for the 

 *      next page link.

 * 'previous_page' - Default is '__('&laquo')' (string). The text to use for the 

 *      previous page link.

 * 'echo' - Default is 1 (int). To return the code instead of echo'ing, set this

 *      to 0 (zero).

 *

 * @author Eric Martin <eric@ericmmartin.com>

 * @copyright Copyright (c) 2009, Eric Martin

 * @version 1.0

 *

 * @param array|string $args Optional. Override default arguments.

 * @return string HTML content, if not displaying.

 */

 

function emm_paginate($args = null) {

	$defaults = array(

		'page' => null, 'pages' => null, 

		'range' => 3, 'gap' => 3, 'anchor' => 1,

		'before' => '<div class="emm-paginate">', 'after' => '</div>',



		'title' => __('Страницы:'),

		'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo'),

		'echo' => 1

	);



	$r = wp_parse_args($args, $defaults);

	extract($r, EXTR_SKIP);



	if (!$page && !$pages) {

		global $wp_query;



		$page = get_query_var('paged');

		$page = !empty($page) ? intval($page) : 1;



		$posts_per_page = intval(get_query_var('posts_per_page'));

		$pages = intval(ceil($wp_query->found_posts / $posts_per_page));

	}

	

	$output = "";

	if ($pages > 1) {	

		$output .= "$before<span class='emm-title'>$title</span>";

		$ellipsis = "<span class='emm-gap'>...</span>";



		if ($page > 1 && !empty($previouspage)) {

			$output .= "<a href='" . get_pagenum_link($page - 1) . "' class='emm-prev'>$previouspage</a>";

		}

		

		$min_links = $range * 2 + 1;

		$block_min = min($page - $range, $pages - $min_links);

		$block_high = max($page + $range, $min_links);

		$left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;

		$right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;



		if ($left_gap && !$right_gap) {

			$output .= sprintf('%s%s%s', 

				emm_paginate_loop(1, $anchor), 

				$ellipsis, 

				emm_paginate_loop($block_min, $pages, $page)

			);

		}

		else if ($left_gap && $right_gap) {

			$output .= sprintf('%s%s%s%s%s', 

				emm_paginate_loop(1, $anchor), 

				$ellipsis, 

				emm_paginate_loop($block_min, $block_high, $page), 

				$ellipsis, 

				emm_paginate_loop(($pages - $anchor + 1), $pages)

			);

		}

		else if ($right_gap && !$left_gap) {

			$output .= sprintf('%s%s%s', 

				emm_paginate_loop(1, $block_high, $page),

				$ellipsis,

				emm_paginate_loop(($pages - $anchor + 1), $pages)

			);

		}

		else {

			$output .= emm_paginate_loop(1, $pages, $page);

		}



		if ($page < $pages && !empty($nextpage)) {

			$output .= "<a href='" . get_pagenum_link($page + 1) . "' class='emm-next'>$nextpage</a>";

		}



		$output .= $after;

	}



	if ($echo) {

		echo $output;

	}



	return $output;

}



/**

 * Helper function for pagination which builds the page links.

 *

 * @access private

 *

 * @author Eric Martin <eric@ericmmartin.com>

 * @copyright Copyright (c) 2009, Eric Martin

 * @version 1.0

 *

 * @param int $start The first link page.

 * @param int $max The last link page.

 * @return int $page Optional, default is 0. The current page.

 */

function emm_paginate_loop($start, $max, $page = 0) {

	$output = "";

	for ($i = $start; $i <= $max; $i++) {

		$output .= ($page === intval($i)) 

			? "<span class='emm-page emm-current'>$i</span>" 

			: "<a href='" . get_pagenum_link($i) . "' class='emm-page'>$i</a>";

	}

	return $output;

}



function post_is_in_descendant_category( $cats, $_post = null )

{

	foreach ( (array) $cats as $cat ) {

		// get_term_children() accepts integer ID only

		$descendants = get_term_children( (int) $cat, 'category');

		if ( $descendants && in_category( $descendants, $_post ) )

			return true;

	}

	return false;

}



/*******************************

 CUSTOM COMMENTS

********************************/



function mytheme_comment($comment, $args, $depth) {

   $GLOBALS['comment'] = $comment; ?>

   <li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">

   	<div class="gravatar">

	 <?php echo get_avatar($comment,$size='50',$default='http://www.gravatar.com/avatar/61a58ec1c1fba116f8424035089b7c71?s=32&d=&r=G' ); ?>

	 <div class="gravatar_mask"></div>

	</div>

     <div id="comment-<?php comment_ID(); ?>">

	  <div class="comment-meta commentmetadata clearfix">

	    <?php printf(__('<strong>%s</strong>'), get_comment_author_link()) ?><?php edit_comment_link(__('(Редактировать)'),'  ','') ?> <span><?php printf(__('%1$s в %2$s'), get_comment_date(),  get_comment_time()) ?>

	  </span>

	  </div>

	  

      <div class="text">

		  <?php comment_text() ?>

	  </div>

	  

	  <?php if ($comment->comment_approved == '0') : ?>



         <em><?php _e('Ваш комментарий ожидает проверки.') ?></em>

         <br />

      <?php endif; ?>



      <div class="reply">

         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

      </div>

     </div>

<?php }



/*******************************

  THEME OPTIONS PAGE

********************************/



add_action('admin_menu', 'boldy_theme_page');

function boldy_theme_page ()

{

	if ( count($_POST) > 0 && isset($_POST['boldy_settings']) )

	{

		$options = array ('logo_img', 'logo_alt','contact_email','contact_text','cufon','linkedin_link','twitter_user','latest_tweet','facebook_link','keywords','description','analytics','copyright','home_box1','home_box1_link','home_box2','home_box2_link','home_box3','home_box3_link','blurb_enable','blurb_text','blurb_link','blurb_page', 'footer_actions','actions_hide','portfolio','blog','slider');

		

		foreach ( $options as $opt )

		{

			delete_option ( 'boldy_'.$opt, $_POST[$opt] );

			add_option ( 'boldy_'.$opt, $_POST[$opt] );	

		}			

		 

	}

	add_menu_page(__('Boldy Настройки'), __('Boldy Настройки'), 'edit_themes', basename(__FILE__), 'boldy_settings');

	add_submenu_page(__('Boldy Настройки'), __('Boldy Настройки'), 'edit_themes', basename(__FILE__), 'boldy_settings');

}

function boldy_settings()

{?>

<div class="wrap">



	<h2>Настройки темы</h2>

	

<form method="post" action="">



	<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">

	<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Общие настройки</strong></legend>

	<table class="form-table">

		<!-- General settings -->

		

		<tr valign="top">

			<th scope="row"><label for="logo_img">Логотип (укажите полный путь к изображению)</label></th>

			<td>

				<input name="logo_img" type="text" id="logo_img" value="<?php echo get_option('boldy_logo_img'); ?>" class="regular-text" /><br />

				<em>Текущий логотип:</em> <br /> <img src="<?php echo get_option('boldy_logo_img'); ?>" alt="<?php echo get_option('boldy_logo_alt'); ?>" />

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="logo_alt">Текст логотипа</label></th>

			<td>

				<input name="logo_alt" type="text" id="logo_alt" value="<?php echo get_option('boldy_logo_alt'); ?>" class="regular-text" />

			</td>

		</tr>

        

		 <tr valign="top">

			<th scope="row"><label for="cufon">Включить Cufon-шрифт</label></th>

			<td>

				<select name="cufon" id="cufon">

					<option value="yes" <?php if(get_option('boldy_cufon') == 'yes'){?>selected="selected"<?php }?>>Да</option>		

					<option value="no" <?php if(get_option('boldy_cufon') == 'no'){?>selected="selected"<?php }?>>Нет</option>

				</select>

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="b">Рубрика для Блога</label></th>

			<td>

				<?php wp_dropdown_categories("name=blog&hide_empty=0&show_option_none=".__(' ')."&selected=" .get_option('boldy_blog')); ?>

			</td>

		</tr>

		 <tr valign="top">

			<th scope="row"><label for="portfolio">Рубрика для Портфолио</label></th>

			<td>

				<?php wp_dropdown_categories("name=portfolio&hide_empty=0&show_option_none=".__(' ')."&selected=" .get_option('boldy_portfolio')); ?>

			</td>

		</tr>

	</table>

	</fieldset>

	

	<p class="submit">

		<input type="submit" name="Submit" class="button-primary" value="Сохранить настройки" />

		<input type="hidden" name="boldy_settings" value="save" style="display:none;" />

		</p>

	

	<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">

	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Социальные сервисы</strong></legend>

		<table class="form-table">

		<tr valign="top">

			<th scope="row"><label for="twitter_user">Twitter</label></th>

			<td>

				<input name="twitter_user" type="text" id="twitter_user" value="<?php echo get_option('boldy_twitter_user'); ?>" class="regular-text" />

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="latest_tweet">Выводить последний твит</label></th>

			<td>

				<select name="latest_tweet" id="latest_tweet">		

					<option value="yes" <?php if(get_option('boldy_latest_tweet') == 'yes'){?>selected="selected"<?php }?>>Да</option>

                    <option value="no" <?php if(get_option('boldy_latest_tweet') == 'no'){?>selected="selected"<?php }?>>Нет</option>

				</select>

			</td>

		</tr>

        <tr valign="top">

			<th scope="row"><label for="facebook_link">Facebook ссылка</label></th>

			<td>

				<input name="facebook_link" type="text" id="facebook_link" value="<?php echo get_option('boldy_facebook_link'); ?>" class="regular-text" />

			</td>

		</tr>

        <tr valign="top">

			<th scope="row"><label for="flickr_link">LinkedIn ссылка</label></th>

			<td>

				<input name="linkedin_link" type="text" id="linkedin_link" value="<?php echo get_option('boldy_linkedin_link'); ?>" class="regular-text" />

			</td>

		</tr>

        </table>

        </fieldset>

		<p class="submit">

		<input type="submit" name="Submit" class="button-primary" value="Сохранить настройки" />

		<input type="hidden" name="boldy_settings" value="save" style="display:none;" />

		</p>

		

		<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">

	<legend style="margin-left:5px; padding:0 5px;color:#2481C6; text-transform:uppercase;"><strong>Главная страница</strong></legend>

	<table class="form-table">

		<!-- Homepage Boxes 1 -->

		<tr>

			<th colspan="2"><strong>Слайдер </strong></th>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="slider">Страница с картинками для Слайдера</label></th>

			<td>

				<?php wp_dropdown_pages("name=slider&show_option_none=".__(' ')."&selected=" .get_option('boldy_slider')); ?>

			</td>

		</tr>

		<tr>

			<th colspan="2"><strong>Поля под Слайдером </strong></th>

		</tr>

		<tr>



			<th colspan="2"> Для отображения все 3 поля должны быть указаны.</th>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="home_box1">Страница для Поля 1</label></th>

			<td>

				<?php wp_dropdown_pages("name=home_box1&show_option_none=".__(' ')."&selected=" .get_option('boldy_home_box1')); ?>

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="home_box1_link">Ссылка для Поля 1</label></th>

			<td>

				<input name="home_box1_link" type="text" id="home_box1_link" value="<?php echo get_option('boldy_home_box1_link'); ?>" class="regular-text" />

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="home_box2">Страница для Поля 2</label></th>

			<td>

				<?php wp_dropdown_pages("name=home_box2&show_option_none=".__(' ')."&selected=" .get_option('boldy_home_box2')); ?>

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="home_box2_link">Ссылка для Поля 2</label></th>

			<td>

				<input name="home_box2_link" type="text" id="home_box2_link" value="<?php echo get_option('boldy_home_box2_link'); ?>" class="regular-text" />

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="home_box3">Страница для Поля 3</label></th>

			<td>

				<?php wp_dropdown_pages("name=home_box3&show_option_none=".__(' ')."&selected=" .get_option('boldy_home_box3')); ?>

			</td>

		</tr>	

		<tr valign="top">

			<th scope="row"><label for="home_box3_link">Ссылка для Поля 3</label></th>

			<td>

				<input name="home_box3_link" type="text" id="home_box3_link" value="<?php echo get_option('boldy_home_box3_link'); ?>" class="regular-text" />

			</td>

		</tr>

		<tr>



			<th colspan="2"><strong>Окно информации под Слайдером</strong></th>

		</tr>

		 <tr>

			<th><label for="blurb_enable">Включить окно информации</label></th>

			<td>

				<select name="blurb_enable" id="blurb_enable"> 

					<option value="yes" <?php if(get_option('boldy_blurb_enable') == 'yes'){?>selected="selected"<?php }?>>Да</option>		

					<option value="no" <?php if(get_option('boldy_blurb_enable') == 'no'){?>selected="selected"<?php }?>>Нет</option>

				</select><br />



                <em>Введите любой текст, чтобы окно информации отобразилось.</em>

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="blurb_text">Текст для окна информации</label></th>

			<td>

				<textarea name="blurb_text" id="blurb_text" rows="3" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('boldy_blurb_text')); ?></textarea>

			</td>

		</tr>

		<tr valign="top">

			<th scope="row"><label for="blurb_link">Ссылка</label></th>

			<td>

				<input name="blurb_link" type="text" id="blurb_link" value="<?php echo get_option('boldy_blurb_link'); ?>" class="regular-text" />

				<br />



				<em>Вы можете вставить ссылку вручную или выбрать страницу ниже.</em>

			</td>

		</tr>

		

		<tr valign="top">

			<th scope="row"><label for="blurb_page">Страница</label></th>

			<td>

				<?php wp_dropdown_pages("name=blurb_page&show_option_none=".__(' ')."&selected=" .get_option('boldy_blurb_page')); ?>

				<br />



				<em>Выберите страницу, которая будет являться ссылкой для окна информации.</em>

			</td>

		</tr>

	</table>

	</fieldset>

	<p class="submit">

		<input type="submit" name="Submit" class="button-primary" value="Сохранить настройки" />

		<input type="hidden" name="boldy_settings" value="save" style="display:none;" />

		</p>

	

    <fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">

	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Настройки контактной страницы</strong></legend>

		<table class="form-table">	

        <tr>

        	<td colspan="2"></td>

        </tr>

         <tr valign="top">

			<th scope="row"><label for="contact_text">Текст</label></th>

			<td>

				<textarea name="contact_text" id="contact_text" rows="7" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('boldy_contact_text')); ?></textarea>

			</td>

		</tr>

        <tr valign="top">

			<th scope="row"><label for="contact_email">E-mail для контакта</label></th>

			<td>

				<input name="contact_email" type="text" id="contact_email" value="<?php echo get_option('boldy_contact_email'); ?>" class="regular-text" />

			</td>

		</tr>

        </table>

     </fieldset>

	 <p class="submit">

		<input type="submit" name="Submit" class="button-primary" value="Сохранить настройки" />

		<input type="hidden" name="boldy_settings" value="save" style="display:none;" />

	</p>

	

	<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">

	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Подвал</strong></legend>

		<table class="form-table">

		<tr>

			<th colspan="2"><strong>Twitter и Обратная связь </strong></th>

		</tr>

		<tr>

			<th><label for="footer_actions">Включить поле с Twitter и Обратной связью</label></th>

			<td>

				<select name="footer_actions" id="footer_actions"> 

					<option value="yes" <?php if(get_option('boldy_footer_actions') == 'yes'){?>selected="selected"<?php }?>>Да</option>		

					<option value="no" <?php if(get_option('boldy_footer_actions') == 'no'){?>selected="selected"<?php }?>>Нет</option>

				</select>

			</td>

		</tr>

		<tr>

			<th><label for="actions_hide">Отображение поля по умолчанию</label></th>

			<td>

				<select name="actions_hide" id="actions_hide"> 

					<option value="visible" <?php if(get_option('boldy_actions_hide') == 'visible'){?>selected="selected"<?php }?>>Развернуто</option>		

					<option value="hidden" <?php if(get_option('boldy_actions_hide') == 'hidden'){?>selected="selected"<?php }?>>Скрыто</option>

				</select>

			</td>

		</tr>

		<tr>

			<th colspan="2"><strong>Копирайты</strong></th>

		</tr>

        <tr>

			<th><label for="copyright">Копирайт текст</label></th>

			<td>

				<textarea name="copyright" id="copyright" rows="4" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('boldy_copyright')); ?></textarea><br />



				<em>Вы можете использовать HTML коды.</em>

			</td>

		</tr>

		

		

	</table>

	</fieldset>

	<p class="submit">

		<input type="submit" name="Submit" class="button-primary" value="Сохранить настройки" />

		<input type="hidden" name="boldy_settings" value="save" style="display:none;" />

	</p>

        

      <fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">

	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>SEO</strong></legend>

		<table class="form-table">

        <tr>

			<th><label for="keywords">Ключевые слова</label></th>

			<td>

				<textarea name="keywords" id="keywords" rows="7" cols="70" style="font-size:11px;"><?php echo get_option('boldy_keywords'); ?></textarea><br />



                <em>Вводите слова через запятую</em>

			</td>

		</tr>

        <tr>

			<th><label for="description">Описание</label></th>

			<td>

				<textarea name="description" id="description" rows="7" cols="70" style="font-size:11px;"><?php echo get_option('boldy_description'); ?></textarea>

			</td>

		</tr>

		<tr>

			<th><label for="ads">Код Google Analytics</label></th>

			<td>

				<textarea name="analytics" id="analytics" rows="7" cols="70" style="font-size:11px;"><?php echo stripslashes(get_option('boldy_analytics')); ?></textarea>

			</td>

		</tr>

		

	</table>

	</fieldset>

	<p class="submit">

		<input type="submit" name="Submit" class="button-primary" value="Сохранить настройки" />

		<input type="hidden" name="boldy_settings" value="save" style="display:none;" />

	</p>

</form>

</div>

<?php }

/*******************************

  CONTACT FORM 

********************************/



 function hexstr($hexstr) {

  $hexstr = str_replace(' ', '', $hexstr);

  $hexstr = str_replace('\x', '', $hexstr);

  $retstr = pack('H*', $hexstr);

  return $retstr;

}



function strhex($string) {

  $hexstr = unpack('H*', $string);

  return array_shift($hexstr);

}



// Hostenko 

// убираем виджеты с дашборда

function remove_dashboard_widgets(){

  global$wp_meta_boxes;

  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);

  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);

  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');



// Виджет темы в dashboard

add_action('wp_dashboard_setup', 'my_dashboard_video');

function my_dashboard_video() {

global $wp_meta_boxes;

wp_add_dashboard_widget('custom_videohelp_widget', 'Видеоинструкция по настройке темы', 'custom_dashboard_video');

}



function custom_dashboard_video() {

echo '<div class="video" align="center"><iframe width="500" height="312" src="http://www.youtube.com/embed/fRJt3XaFpvw" frameborder="0" allowfullscreen></iframe></div>';

}



add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets() {

global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Описание темы', 'custom_dashboard_help');

}

function custom_dashboard_help() {

echo '<a href="http://hostenko.com"><img src="http://hostenko.com/pics/widget_logo.png" style="float: left; margin: 0 10px 10px 0;"></a>

<p><b>Перед наполнением Вашего сайта информацией рекомендуем ознакомиться с <a href="http://hostenko.com/theme_description.php?theme=30">руководством по данной теме</a></b>.</p>

<p>Тема переведена <a href="http://hostenko.com">Hostenko</a> — специализированным хостингом для сайтов на WordPress с мастером его автоматической установки.</p>';

}



// Копирайт в футере

function remove_footer_admin () {

    echo 'Русские <a href="http://hostenko.com/themes">WordPress темы</a> — <a href="http://hostenko.com">Hostenko</a>';

} 

add_filter('admin_footer_text', 'remove_footer_admin');



// Меню Hостенко

add_action("admin_bar_menu", "customize_menu");

function customize_menu(){

global $wp_admin_bar;

  $wp_admin_bar->add_menu(array(

   "id" => "hostenko_menu",

   "title" => "Hostenko",

   "href" => "http://hostenko.com",

   "meta" => array("target" => "blank")

));

$wp_admin_bar->add_menu(array(

   "id" => "hostenko_menu_child",

    "title" => "Личный кабинет",

    "parent" => "hostenko_menu",

    "href" => "http://hostenko.com/cabinet",

	"meta" => array("target" => "blank")

));

$wp_admin_bar->add_menu(array(

   "id" => "hostenko_menu_child2",

    "title" => "WordPress темы",

    "parent" => "hostenko_menu",

    "href" => "http://hostenko.com/themes",

	"meta" => array("target" => "blank")

));

$wp_admin_bar->add_menu(array(

   "id" => "hostenko_menu_child3",

    "title" => "Блог Hostenko",

    "parent" => "hostenko_menu",

    "href" => "http://blog.hostenko.com",

	"meta" => array("target" => "blank")

));

}

// RSS-виджет Wordpresso

function wordpresso_rss_output(){

    echo '<div class="rss-widget">';

    echo '<a href="http://wordpresso.org"><img src="http://wordpresso.org/pics/widget_logo.png" style="float: left; margin: 0 10px 10px 0;"></a><br style="clear:both;"/>'; 

       wp_widget_rss_output(array(

            'url' => 'http://feeds.feedburner.com/Wordpresso',

            'title' => 'Wordpresso RSS',

            'items' => 3, 

            'show_summary' => 1,

            'show_author' => 0,

            'show_date' => 1

       ));

       

       echo "</div>";

}

add_action('wp_dashboard_setup', 'wordpresso_rss_widget');

function wordpresso_rss_widget(){

wp_add_dashboard_widget( 'wordpresso-rss', 'Wordpresso RSS', 'wordpresso_rss_output');

}



?>