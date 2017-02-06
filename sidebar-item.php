   <div class="col-xs-8 col-md-3 sidebar">


<?php if (!dynamic_sidebar('sidebar-6')): ?>
       <h3 class="sidebar_heading" > SIDEBAR </h3>
	   
	   <p> Please add widgets to the page sidebar to have them display here </p>
        
<?php endif; ?>	 
<?php $menu_ID = 0; ?> 



<?php 

// this value is coming from the time custom field. We use this value to call the appropriate menu on each year We also use menu id You can get the menu id by doing:

// $menu = wp_get_nav_menu_object("2010s");
// var_dump($menu);

//NOTE: You all see need to change where is says 'menu' => '1990s'

//NOTE: To PRINT MENU NAME DYNAMICALLY echo $nav_menu->name 


$value = get_field("Time");
if(!empty($value)) {



if($value =="1990s") {
	$menu_ID = 6; 
	$nav_menu = wp_get_nav_menu_object( $menu_ID ); ?>
	<h3 class="sidebar_heading" > See Other Items from the 1990s </h3>
	
<?php 
 $args = array('menu' => '1990s', 'menu_class' => 'list-group', 'container' => 'false', 'items_wrap' => '<ul id="%1$s" class="nav nav-navbar %2$s">%3$s</ul>');
			   wp_nav_menu($args); 	
}

elseif($value=="2000s") {
	$menu_ID = 5; 
	$nav_menu = wp_get_nav_menu_object( $menu_ID ); ?>
	<h3 class="sidebar_heading" > See Other Items from the 2000s  </h3>
	<?php
	$args = array('menu' => '2000s', 'menu_class' => 'list-group', 'container' => 'false', 'items_wrap' => '<ul id="%1$s" class="nav nav-navbar %2$s">%3$s</ul>');
			   wp_nav_menu($args); 
}


elseif($value=="2010s") {
	$menu_ID = 220; 
	$nav_menu = wp_get_nav_menu_object( $menu_ID ); ?>
	<h3 class="sidebar_heading" > See Other Items from the 2010s  </h3>
	<?php
	$args = array('menu' => '2010s', 'menu_class' => 'list-group', 'container' => 'false', 'items_wrap' => '<ul id="%1$s" class="nav nav-navbar %2$s">%3$s</ul>');
			   wp_nav_menu($args); 
}


else {
	
}


}

?>


<?php while ( have_posts() ) : the_post(); 

$image = get_field('image'); 


?>
		 <div class="thumbnail sidebar_thumbnail">
		 
		 
		  <?php if( $image == true ): ?>
               <img src="<?php echo $image['url'] ?>" alt="<?php $image['alt']; ?> ">
				 <?php endif; ?>
				 
				 
                  <div class="caption">
				   <?php if( get_field( 'thumbnail_link') ): ?>
                 <a class="thumbnail_meta" href="<?php if (!empty(the_field('thumbnail_link'))); ?>"><?php the_field('thumbnail_link_title');?> </a>
				  <?php endif; ?>
				  
				   <?php if( get_field( 'thumbnail_title') ): ?>
                     <h4 class="thumbnail_title"><?php if (!empty(the_field('thumbnail_title'))); ?></h4>
					 <?php endif; ?>
					 
					 
                  </div>
               </div>
		

			

<?php endwhile; // end of the loop. ?>



	
   </div>