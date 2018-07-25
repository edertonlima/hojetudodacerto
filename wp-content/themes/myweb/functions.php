<?php
/**
 * @package WordPress
 * @subpackage My Web
 * @since My web Site 1.0
 **
 */

	/* HABILITAR / DESABILITAR */

	// Enable featured images
	add_theme_support( 'post-thumbnails' );

	// Unable the admin bar
	add_filter('show_admin_bar', '__return_false');

	/* MENUS */
	add_action( 'after_setup_theme', 'register_menu' );
	function register_menu() {
	  register_nav_menu( 'primary', __( 'Primary Menu', 'header' ) );
	}

	function countPostDate($mes,$ano){
		$args = array(
		    'date_query' => array(
		        array(
		            'year'  => $ano,
		            'month' => $mes
		        ),
		    ),
		);
		$query = new WP_Query( $args );
		return $query->post_count;
	}

	function anuncios(){
		global $anuncios;
		global $linha;
		global $numAnuncio;
		global $qtdAnuncios;
		$novaLinha = $numAnuncio[$linha];
		if(($qtdAnuncios>0) && ($qtdAnuncios > $linha)){

			if($anuncios[$novaLinha]['url']!=''){
				echo '<a href="'.$anuncios[$novaLinha]['url'].'">';
			}

			echo '<img src="'.$anuncios[$novaLinha]['imagem'].'" class="banner">';

			if($anuncios[$novaLinha]['url']!=''){
				echo '</a>';
			}

			echo '
			<div class="container-info banner-padding">
				<span class="post-date">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					'.get_the_date().'
				</span>
				<h2>'.get_the_title().'</h2>
				<span class="autor">por '.get_the_author().'</span>

				<p class="descricao">'.get_field('descrição').'</p>
			</div>
			';
		}else{
			echo '
			<div class="container-info">
				<span class="post-date">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					'.get_the_date().'
				</span>
				<h2>'.get_the_title().'</h2>
				<span class="autor">por '.get_the_author().'</span>

				<p class="descricao">'.get_field('descrição').'</p>
			</div>
			';
		}
	}

	if( have_rows('anuncios','option') ):
		$anuncios = array();
		
		$i=0;
		while ( have_rows('anuncios','option') ) : the_row();

			if(get_sub_field('status','option')){
				$anuncios[$i]['imagem'] = get_sub_field('imagem','option');
				$anuncios[$i]['url'] = get_sub_field('url','option');
			}

			$i=$i+1;

		endwhile; //print_r($anuncios); /*shuffle($anuncios); echo '<br><br>'; print_r($anuncios); echo '<br><br>'*/;

	endif; 
	$qtdAnuncios = count($anuncios); 

	if($qtdAnuncios > 0){
		for($count = 0; $count < $qtdAnuncios; $count++){
			$numAnuncio[] = $count;
		}
	}

	//print_r($numAnuncio);
	shuffle($numAnuncio);
	//echo '<br><br>';
	//var_dump($numAnuncio);
	//var_dump($anuncios);



function SearchFilter($query) {
	if ($query->is_search) {
	$query->set('post_type', 'post');
	}
	return $query;
}

add_filter('pre_get_posts','SearchFilter');
	
	add_action( 'init', 'my_custom_init' );
	function my_custom_init() {
		remove_post_type_support( 'post', 'editor' );
		//remove_post_type_support( 'page', 'thumbnail' );
	}




if(wp_get_current_user()->ID != 1){
	add_action('admin_head', 'my_custom_fonts');

	function my_custom_fonts() {
	  echo '<style>
		#menu-media, #menu-comments, #menu-appearance, #menu-plugins, #menu-tools, #menu-settings, #toplevel_page_edit-post_type-acf, #toplevel_page_edit-post_type-acf-field-group, 
		#toplevel_page_zilla-likes, 
		#screen-options-link-wrap, 
		.acf-postbox h2 a, 
		#the-list #post-94, 
		#the-list #post-65, 
		.taxonomy-category .form-field.term-parent-wrap 
		{
			display: none!important;
		}
	  </style>';
	}
}



function gera_url_encurtada($url){
    $url = urlencode($url);
    $xml =  simplexml_load_file("http://migre.me/api.xml?url=$url");
 
    if($xml->error != 0){
        return $xml->errormessage;
    }
    else{
        return $xml->migre;
    }
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Anúncios',
		'menu_title'	=> 'Anúncios',
		'menu_slug' 	=> 'anuncios',
		'capability'	=> 'edit_posts',
		'icon_url' => 'dashicons-tag',
		'redirect'		=> false
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Configurações',
		'menu_title'	=> 'Configurações',
		'menu_slug' 	=> 'configuracoes-geral',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações Gerais',
		'menu_title'	=> 'Geral',
		'parent_slug'	=> 'configuracoes-geral',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Configurações de Redes sociais',
		'menu_title'	=> 'Redes sociais',
		'menu_slug' 	=> 'redes-sociais',
		'parent_slug'	=> 'configuracoes-geral',
	));
}

?>