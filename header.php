<!DOCTYPE html>

<html <?php language_attributes(); ?>>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" href="<?php  echo esc_url( get_template_directory_uri() )  ?>/img/myfavicon.ico"> 
	  
     
	  <?php wp_title('|', true, 'right'); ?>
	  <?php bloginfo('name'); ?>
	
	 
	  <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>
      <!-- Navigation --> 
      <nav class="navbar navbar-inverse navbar-fixed-top">
	  <?php 
  // Fix menu overlap
  if ( is_admin_bar_showing() ) { echo '<div style="min-height: 32px;"></div>'; 
  }?>
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="<?php  echo esc_url( home_url() )?>"><?php bloginfo('name') ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav ">
			   
			   <?php
			   $args = array('menu' => 'header-menu', 'menu_class' => 'nav navbar-nav', 'container' => 'false');
			   wp_nav_menu($args);
			   ?>
			 	 
               </ul>
			  
			  
			  <?php get_search_form(); ?>
			  
               <?php
			   $section_1_name = get_field('section_1_name');
			   
			   $section_1_name = str_replace(' ', '_', $section_1_name);
			   
			   $section_2_name = get_field('section_2_name');
			   
			   $section_2_name = str_replace(' ', '_', $section_2_name);
	
			   $section_3_name = get_field('section_3_name');
			   
			   $section_3_name = str_replace(' ', '_', $section_3_name);
	
			   ?>
			   
		   <?php if ( is_front_page() ) {?>
			    <ul class="nav navbar-nav navbar-right">
			    <li><a href="#<?php echo $section_1_name;  ?>"><?php the_field('section_1_name'); ?></a></li>
				<li><a href="#<?php echo $section_2_name;  ?>"><?php the_field('section_2_name'); ?></a></li>
				<li><a href="#<?php echo $section_3_name;  ?>"><?php the_field('section_3_name'); ?></a></li>
			   </ul>
			   <?php } ?>
			   
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>