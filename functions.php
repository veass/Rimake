<?php
add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_themes');
add_action('wp_ajax_nopriv_my_ajax', 'ajax_form' );
add_action('wp_ajax_my_ajax', 'ajax_form' );
add_action('wp_ajax_nopriv_ajax_email', 'ajax_email' );
add_action('wp_ajax_ajax_email', 'ajax_email' );
add_action('wp_ajax_nopriv_ajax_promo', 'ajax_promo' );
add_action('wp_ajax_ajax_promo', 'ajax_promo' );
add_action( 'init', 'register_post_types' );
add_action( 'admin_menu', 'remove_menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo', [
	'height'      => 190,
	'width'       => 190,
	'flex-width'  => false,
	'flex-height' => false,
	'header-text' => '',
] );

add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);

function style_theme(){
	wp_enqueue_style( 'style', get_stylesheet_uri());
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css' );
	wp_enqueue_style( 'header', get_template_directory_uri() . '/assets/css/header.css' );
	wp_enqueue_style( 'banner', get_template_directory_uri() . '/assets/css/front.css' );
	wp_enqueue_style( 'calculatorCost', get_template_directory_uri() . '/assets/css/calculatorCost.css' );
	wp_enqueue_style( 'costTile', get_template_directory_uri() . '/assets/css/costTile.css' );
	wp_enqueue_style( 'faq', get_template_directory_uri() . '/assets/css/faq.css' );
	wp_enqueue_style( 'portfolio', get_template_directory_uri() . '/assets/css/portfolio.css' );
	wp_enqueue_style( 'master', get_template_directory_uri() . '/assets/css/master.css' );
	wp_enqueue_style( 'footer', get_template_directory_uri() . '/assets/css/footer.css' );
	wp_enqueue_style( 'media-queries', get_template_directory_uri() . '/assets/css/media-queries.css' );
	wp_enqueue_style( 'metaslider-css', plugins_url (). '/ml-slider/assets/sliders/flexslider/flexslider.css');
    wp_enqueue_style( 'slider', get_template_directory_uri() . '/assets/css/slider.css' );
}

function scripts_themes(){
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.js');
	wp_enqueue_script('ajax', get_template_directory_uri() . '/assets/js/ajax.js');
	wp_enqueue_script('metaslider-js',  plugins_url () . '/ml-slider/assets/sliders/flexslider/jquery.flexslider.min.js');
	wp_localize_script( 'ajax', 'myajax', 
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);  
}

function remove_menus(){
 	remove_menu_page( 'edit.php' );                   // Записи
	remove_menu_page( 'upload.php' );                 // Медиафайлы
 	remove_menu_page( 'edit.php?post_type=page' );    // Страницы
	remove_menu_page( 'edit-comments.php' );          // Комментарии
}

function ajax_form(){

if (!$_POST) exit('No direct script access allowed');
if (empty($_POST['name']) && empty($_POST['phone'])){
	exit('пусто');
}
if (empty($_POST['name'])) {
	exit('Введите имя');
}
if (empty($_POST['phone'])){
	exit('Введите номер телефона');
}
if (!empty($_POST['phone']) && !empty($_POST['name']) ){
	$phone = trim(strip_tags($_POST['phone']));
	$name = trim(strip_tags($_POST['name']));
	$s1 = $_POST['s1'];
	$s2 = $_POST['s2'];
	$s3 = $_POST['s3'];
	$s4 = $_POST['s4'];
	$s = $_POST['s'];
  $elem_choise = $_POST['elem_choise'];
  $textarea = $_POST['textarea'];
	$response = '';
	$thm  = 'Заказ мастера';
	$msg .= "Имя: ".$name.  PHP_EOL; 
	$msg .= "Телефон: ".$phone. PHP_EOL; 
	$msg .= "Выбранная схема: ".$elem_choise. PHP_EOL; 
	$msg .= "Метраж плитки: ".$s1. PHP_EOL; 
	$msg .= "Демонтаж: ".$s2. PHP_EOL; 
	$msg .= "Бордюры: ".$s3. PHP_EOL; 
	$msg .= "Водостоки: ".$s4. PHP_EOL; 
	$msg .= "Итоговая стоимость: ".$s. PHP_EOL; 
	$msg .= "Ваши пожелания: ".$textarea. PHP_EOL;	
		     
	$mail_to = 'oletjago@yandex.ru';
	$headers = 'From: Rimake <ukladka@rimake.by>' . "\r\n";
	if(wp_mail($mail_to, $thm, $msg, $headers)){
			$response = 'Ваша заявка принята! Спасибо.';
	}else
			$response = 'Ошибка при отправке';

	exit('успех');
} 	 
} 

function ajax_email(){

$emailpromo = $_POST['email'];
	if (empty($emailpromo)){
		exit('пусто');
	}
	if ((filter_var($emailpromo, FILTER_VALIDATE_EMAIL) == false)) {
		exit('badmail');
	}
	if (filter_var($emailpromo, FILTER_VALIDATE_EMAIL)) {
		echo('success');
	}
	$chars = '12345ABCDEFGHIJKLMNOPQRSTUVWXYZ67890';
			$hashpromo  = '';
	for($ichars = 0; $ichars < 9; ++$ichars) {
			$random = str_shuffle($chars);
			$hashpromo .= $random[0];
	}
		$him_email = $emailpromo;
		$temp = '/assets/img/';
		$promo = get_template_directory_uri().$temp.'promo.png';
		$vk = get_template_directory_uri().$temp.'vk.png';
		$instagramm = get_template_directory_uri().$temp.'instagramm.png';
	
		$to = $him_email;
		$subject  =  "Скидка от Rimake.by" ;
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=utf-8\r\n";
	    $headers .= 'From: Rimake <ukladka@rimake.by>' . "\r\n";
     	global $discount;
	
		$message = '
		<html>
		<body style="margin: 0 auto;">
			<div>
				<table style=" max-width: 600px; width: 100%; margin: 0 auto; background-color: #29ea2f;background:url('.$promo.'); "  border="0" cellpadding="0" cellspacing="0"  >
					<tbody>
						<tr style="height: 900px;">
							<td style="height: 900px;">
							<table style="margin: 0 auto; padding-top: 130px;">
								<tbody>
									<tr style="height:130px" align="center" valign="middle">
										<td>
											<span style="font-size: 60px; color: #ff6600;">'.$discount.'%</span>
											<p style="margin: 0; color: #ff6600; font-size: 40px; line-height: 11px;">СКИДКА</p> 
										</td>
									</tr>
									<tr style="height:60px" align="center" valign="middle">
										<td>
											<p style="color:black;">ПО ПРОМОКОДУ</p>
										</td>
									</tr>
									<tr style="height:40px" align="center" valign="middle">
											<td style="border: 1px #ff6600 solid; border-radius: 10px 10px 10px 10px;">
												<p style="color:white;">'. $hashpromo .'</p>
											</td>
									</tr>
								</tbody>  
							</table>
							</td>
						</tr>
						<tr>
							<td style="padding: 12px 40px 10px 50px">
								<p style=" margin: 0; font-size: 24px; letter-spacing: 4px; font-weight: 600;">Здравствуйте!</p>
							</td>
						</tr>
						<tr>
							<td style="padding: 12px 40px 10px 50px" class="mob">
								<p style="font-size: 19px">
										Для активации промокода, скопируйте его и втавьте в поле на сайте. После активации цены на сайте автомтически изменятся<br/><br/>Мы есть в социальных сетях. Подписывайтесь и следите за 
										нашими новостями. Каждый день, мы публикуем полезные 
										лайфхаки о благоустройстве участка, проводим конкурсы, 
										выкладываем примеры наших работ, рассказываем истории
										с наших обьектов.
								</p>
							</td>
						</tr>
						<tr style="height: 150px;" >
								<td  align="center" valign="middle">
								 <a style="display: inline-block;" href="https://vk.com/rebel2013"><img src="'.$vk.'" alt="Вконтакте" style=" height: 60px; width: 60px;"></a>
								 <a style="display: inline-block;  padding-left: 30px;" href=""><img src="'.$instagramm.'" alt="Инстаграмм" style="height: 60px; width: 60px;"></a>
								</td>
						</tr>
						<tr>
							<td style="padding: 12px 40px 10px 50px; border-top: 1px solid #e91e637d;">
								<p style="font-size: 17px">@ 2020. Rimake.by</p>
								<p style="font-size: 17px">
									Уважаемые пользователи вы получили это письмо, 
									т.к явлzетесь пользователем сайта Rimake.by
								</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
	
		</body>
	</html>';

wp_mail($to, $subject, $message, $headers);

$uid .= time();
$uid .= rand();
$uid = substr($uid, 0, 16);

$tempArr = unserialize(file_get_contents('promocodes/idlist'));
	
if (in_array($him_email, array_keys($tempArr))) {
	unlink('promocodes/'.$tempArr[$him_email]);
}
	
$tempArr[$him_email] = $uid;
file_put_contents('promocodes/idlist', serialize($tempArr));

$promoArr = array('email' => $him_email, 'promo' => $hashpromo, 'timestamp' => time());
$serPromoArr = serialize($promoArr);

file_put_contents('promocodes/'.$uid, $serPromoArr);
	
	wp_die();
}

$ds = getDiscount();
$discount = $ds[0]->post_title;

function ajax_promo(){
	$email = $_POST['email'];
	$idlist = file_get_contents('promocodes/idlist');
	$uid = unserialize($idlist)[$email];
	
	$userInfoSer = file_get_contents('promocodes/'.$uid.'');
	$userInfo = unserialize($userInfoSer);
	$userPromo = $userInfo['promo'];
	
	global $discount;
	$promocode = $_POST['promocode'];
	$dc = 1-($discount/100);
	if ($promocode == $userPromo){
		echo $dc;
	} else {
		echo 1;
	};
	
	wp_die();
}

if( wp_doing_ajax() ){
  add_action('wp_ajax_nopriv_ajax_slider1', 'ajax_slider1' );
  add_action('wp_ajax_ajax_slider1', 'ajax_slider1' );
  add_action('wp_ajax_nopriv_ajax_slider2', 'ajax_slider2' );
  add_action('wp_ajax_ajax_slider2', 'ajax_slider2' );
  add_action('wp_ajax_nopriv_ajax_slider3', 'ajax_slider3' );
  add_action('wp_ajax_ajax_slider3', 'ajax_slider3' );
  add_action('wp_ajax_nopriv_ajax_slider4', 'ajax_slider4' );
  add_action('wp_ajax_ajax_slider4', 'ajax_slider4' );
  add_action('wp_ajax_nopriv_ajax_slider5', 'ajax_slider5' );
  add_action('wp_ajax_ajax_slider5', 'ajax_slider5' );
  add_action('wp_ajax_nopriv_ajax_slider6', 'ajax_slider6' );
  add_action('wp_ajax_ajax_slider6', 'ajax_slider6' );
  add_action('wp_ajax_nopriv_ajax_slider7', 'ajax_slider7' );
  add_action('wp_ajax_ajax_slider7', 'ajax_slider7' );
  function ajax_slider1(){
    echo '<div class="shadow-popup"></div>';
    echo do_shortcode('[metaslider id="166"]');
    wp_die();
  }
  function ajax_slider2(){
    echo '<div class="shadow-popup"></div>';
    echo do_shortcode('[metaslider id="175"]');
    wp_die();
  }
  function ajax_slider3(){
    echo '<div class="shadow-popup"></div>';
    echo do_shortcode('[metaslider id="186"]');
    wp_die();
  }
  function ajax_slider4(){
    echo '<div class="shadow-popup"></div>';
    echo do_shortcode('[metaslider id="192"]');
    wp_die();
  }
  function ajax_slider5(){
    echo '<div class="shadow-popup"></div>';
    echo do_shortcode('[metaslider id="198"]');
    wp_die();
  }
  function ajax_slider6(){
    echo '<div class="shadow-popup"></div>';
    echo do_shortcode('[metaslider id="204"]');
    wp_die();
  }
  function ajax_slider7(){
    echo '<div class="shadow-popup"></div>';
    echo do_shortcode('[metaslider id="210"]');
    wp_die();
  }
}

function register_post_types(){
	register_post_type('banner', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Баннер', 
			'menu_name'          => 'Баннер', 
		),
		'public'              => false,
		'show_ui'             => true, 
		'menu_icon'           => "dashicons-welcome-widgets-menus", 
	) );
	register_post_type('calculator', array(
		'labels' => array(
			'name'               => 'Калькулятор', 
			'singular_name'      => 'Вопрос', 
			'menu_name'          => 'Калькулятор', 
		),
		'public'              => false,
		'show_ui'             => true, 
		'menu_icon'           => "dashicons-building", 
		'supports'            => ['thumbnail'],
	) );
	register_post_type('faq', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'faq', 
			'singular_name'      => 'Вопрос', 
			'menu_name'          => 'FAQ', 
		),
		'public'              => false,
		'show_ui'             => true, 
		'menu_icon'           => "dashicons-format-chat", 
	) );
  register_post_type('portfolio', array(
		'labels' => array(
			'name'               => 'Портфолио', 
			'menu_name'          => 'Портфолио', 
		),
		'description'         => '',
		'public'              => false,
		'show_ui'             => true, 
		'menu_icon'           => "dashicons-book", 
		'supports'            => [ 'title' ],
	) );
	register_post_type('hover', array(
		'labels' => array(
			'name'               => 'Город', 
			'menu_name'          => 'Обьекты', 
		),
		'public'              => false,
		'show_ui'             => true, 
		'menu_icon'           => "dashicons-images-alt", 
		'supports'            => [ 'title' ],

	) );
	register_post_type('features', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Приемущества', 
			'menu_name'          => 'Наши приемущества', 
		),
		'public'              => false,
		'show_ui'             => true, 
		'menu_icon'           => "dashicons-welcome-learn-more", 
		'supports'            => [ 'title', 'editor','thumbnail' ],
	) );
	register_post_type('promo', array(
		'labels' => array(
			'name'               => 'Акции', 
			'menu_name'          => 'Акции', 
		),
		'public'              => false,
		'show_ui'             => true, 
		'menu_icon'           => "dashicons-buddicons-groups", 
		'supports'            => [ 'title', 'editor' ],
	) );	
	register_post_type('discount', array(
		'labels' => array(
			'name'               => 'Скидка', 
			'menu_name'          => 'Скидка', 
		),
		'public'              => false,
		'show_ui'             => true, 
		'menu_icon'           => "dashicons-art", 
		'supports'            => [ 'title' ],
	) );
}

  	function getBanner(){
			$args = array(
				'orderby'     => 'date',
				'order'       => 'DESC',
				'post_type'   => 'banner',
			);
			return get_posts($args);
		}
		function getPromo(){
			$args = array(
				'orderby'     => 'date',
				'order'       => 'DESC',
				'post_type'   => 'promo',
				'numberposts' => 1,
			);
			return get_posts($args);
	  }
	  function getFaq(){
			$args = array(
				'orderby'     => 'date',
				'order'       => 'DESC',
				'post_type'   => 'faq',
			);
			return get_posts($args);
	  }
	  function getDiscount(){
			$args = array(
				'orderby'     => 'date',
				'order'       => 'ASC',
				'post_type'   => 'discount',
				'numberposts' => 1,
			);
			return get_posts($args);
	  }
    function getCalculator(){
			$args = array(
				'orderby'     => 'date',
				'order'       => 'DESC',
				'post_type'   => 'calculator',
				'numberposts' => 1,
			);
			$calculator = array();

			foreach(get_posts($args) as $post){
				$calc = get_fields($post->ID);
				// $calc['name'] = $post->post_title;
				$calculator[] = $calc;
			}
			return $calculator;
	  }
    function getPortfolio(){
      $args = array(
        'orderby'     => 'date',
        'order'       => 'DESC',
        'post_type'   => 'portfolio',
      );
      $portfolio = array();
      foreach(get_posts($args) as $post){
        $port = get_fields($post->ID);
        $portfolio[] = $port;
      }
      return $portfolio;
    }
function getTowns(){
	$args = array(
		'numberposts' => 7,
		'orderby'     => 'date',
		'order'       => 'ASC',
		'post_type'   => 'hover',
	);
	$hover = array();

	foreach(get_posts($args) as $post){
		$hov = get_fields($post->ID);
		// $calc['name'] = $post->post_title;
		$hover[] = $hov;
		// var_dump($post->ID);
	}
	return $hover;
}

	function content225(){
		$post225 = get_post( 225 );
		$text = $post225->post_content;	
		echo $text;
	}
	function title225(){
		$post225 = get_post( 225 );
		$text = $post225->post_title;	
		echo $text;
	}
	function thumbnail225(){
		$thumbnail225 = get_the_post_thumbnail( 225 ) ;
		echo $thumbnail225;
	}

	function content226(){
		$post226 = get_post( 226 );
		$text = $post226->post_content;	
		echo $text;
	}
	function title226(){
		$post226 = get_post( 226 );
		$text = $post226->post_title;	
		echo $text;
	}
	function thumbnail226(){
		$thumbnail226 = get_the_post_thumbnail( 226 ) ;
		echo $thumbnail226;
	}


	function content229(){
		$post229 = get_post( 229 );
		$text = $post229->post_content;	
		echo $text;
	}
	function title229(){
		$post229 = get_post( 229 );
		$text = $post229->post_title;	
		echo $text;
	}
	function thumbnail229(){
		$thumbnail229 = get_the_post_thumbnail( 229 ) ;
		echo $thumbnail229;
	}


	function content230(){
		$post230 = get_post( 230 );
		$text = $post230->post_content;	
		echo $text;
	}
	function title230(){
		$post230 = get_post( 230 );
		$text = $post230->post_title;	
		echo $text;
	}
	function thumbnail230(){
		$thumbnail230 = get_the_post_thumbnail( 230 ) ;
		echo $thumbnail230;
	}


	function content231(){
		$post231 = get_post( 231 );
		$text = $post231->post_content;	
		echo $text;
	}
	function title231(){
		$post231 = get_post( 231 );
		$text = $post231->post_title;	
		echo $text;
	}
	function thumbnail231(){
		$thumbnail231 = get_the_post_thumbnail( 231 ) ;
		echo $thumbnail231;
	}


	function title232(){
		$post232 = get_post( 232 );
		$text = $post232->post_title;	
		echo $text;
	}
	function getThumbnail232(){
		$thumbnail232 = get_the_post_thumbnail( 232 ) ;
		echo $thumbnail232;
	}	

 ?>