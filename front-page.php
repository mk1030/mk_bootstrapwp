

<?php get_header(); ?> 

 <div class="overlay">
 
 <?php  while ( have_posts() ) : the_post(); ?> 
        
		   <?php the_content(); ?> 
		  <?php
    endwhile;
    wp_reset_query(); //resetting the page query
    ?>
</div>

<?php wd_slider(1); ?>      


      <!-- Divider --> 
      <div class="divider"> </div>
      <div class="container-fluid">
         <!-- Section 1 -->
		

   <?php
	$section_1_name = get_field('section_1_name');
			   
	$section_1_name = str_replace(' ', '_', $section_1_name);
	
	$section_2_name = get_field('section_2_name');
			   
	$section_2_name = str_replace(' ', '_', $section_2_name);
	
	$section_3_name = get_field('section_3_name');
			   
	$section_3_name = str_replace(' ', '_', $section_3_name);
	
	?>		
		 
<?php 

//Note: when the admin bar is showing you have to adjust the styles of these headings. 
echo ((is_admin_bar_showing()) ? "<div class='section_admin' id=" . $section_1_name . ">" : "<div class='section_1' id=" . $section_1_name . ">")?>
            <div class="row">
               <h2 class="section_heading"> <?php the_field('section_1_name'); ?> </h2>
               <hr class="section_line">
            </div>
            <div class="row">
               <div class="col-md-4 text-center">
                  <?php if(dynamic_sidebar('sidebar-1')); ?>
               </div>
               <div class="col-md-4 text-center">
                   <?php if(dynamic_sidebar('sidebar-2')); ?>
               </div>

               <div class="col-md-4 text-center">
                   <?php if(dynamic_sidebar('sidebar-3')); ?>
               </div>
            </div>
         </div>
      </div>
      <!--Divider --> 	 
      <div class="divider"> </div>
	  
	
	        <!-- Background Image --> 
      <div class="bg" style="background-image: url('<?php if (!empty(the_field('background_image_1')));?>')"></div>
	  
	
	  
	  
	  
	  
      <div class="divider"> </div>
      <!-- Section 2-->
     <?php echo ((is_admin_bar_showing()) ? "<div class='section_admin' id=" . $section_2_name . ">" : "<div class='section_2' id=" . $section_2_name . ">")?>
         <div class="row">
            <h2 class="section_heading"> Section 2 </h2>
            <hr class="section_line">
         </div>
		 
		 
		 
         <div class="row">
	 <?php $args=array ( 'post_type'=> 'items', 
						 'posts_per_page'=>'12'
	
	 ); 
	 $the_query = new WP_Query($args); ?>

	
            <?php if (have_posts()) : while ($the_query -> have_posts()) : $the_query ->the_post();
	$image = get_field('image'); 
	$size = 'thumbnail';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];
	$alt = $image['alt'];
			?>
			
			<?php 
			$classes = array('col-xs-12', 'col-sm-6', 'col-md-3', 'col-lg-2', 'item');
			
			?>


            <div <?php post_class($classes); ?>>
                <div class="content-block" style="background-color: <?php if (!empty(the_field('backgroundcolor'))); ?>; background-image: url('<?php if (!empty(the_field('Background-Image')));?>')">


                    <?php if( $image ): ?>

                 <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

                    <?php endif; ?>


                  <a href="<?php the_permalink(); ?>"> <h2 class="heading-md"><?php the_title(); ?> </h2> </a>
               
                    <span class="<?php if(!empty(the_field('glyphicon'))); ?> " aria-hidden="true"></span>
                    <p>
                        <?php the_field('excerpt'); ?>
                    </p>
                </div>
            </div>


            <?php endwhile; endif;  wp_reset_query(); //resetting the page query ?>



         
         </div>
         <!-- /.row -->
       
         <!-- /.row -->
      </div>
	  
	  
	  
      <div class="divider"> </div>
     
      <!-- Background Image --> 
      <div class="bg" style="background-image: url('<?php if (!empty(the_field('background_image_2')));?>')"></div>
	  
	      
		
      <!-- Divider --> 
      <div class="divider"> </div>
	  
      <!-- Section 3 -->
      <div class="row">
         <div class="col-md-12">
          <?php echo ((is_admin_bar_showing()) ? "<div class='section_admin' id=" . $section_3_name . ">" : "<div class='section_3' id=" . $section_3_name . ">")?>
               <div class="row">
                  <h2 class="section_heading"> Section 3 </h2>
                  <hr class="section_line">
               </div>
			   
			   		   
               <!-- Timeline -->
               <ul class="timeline">
			   
			   <?php $args=array ( 'post_type'=> 'timeline', 'order' => 'ASC', 'orderby' => 'date'); 
	 $the_query = new WP_Query($args); 
	 $i = 0; 
	 $timeline_dates = array(); 
	 
	 
	 
	 ?>
		   
			   <?php if (have_posts()) : while ($the_query -> have_posts()) : $the_query ->the_post(); ?>
			   
			   <?php 
			$image = get_field('image'); 
			$size = 'thumbnail';
			$thumb = $image['sizes'][ $size ];
			$width = $image['sizes'][ $size . '-width' ];
			$height = $image['sizes'][ $size . '-height' ];
			$alt = $image['alt'];
			$title = get_field('title'); 
			$date = get_field('date');
			
			$date_formatted = date("F j, Y", strtotime($date)); 
		 ?> 
		
		
				<?php  if(!in_array($date_formatted, $timeline_dates)) { ?>
				
			     <li>
                     <div class="tldate"><?php echo $date_formatted ?></div>
                  </li>
				
				<?php } ?> 			


				<!-- Determine if the post is odd or even to display on either left or right -->
				  <?php if ($i % 2 == 0 ) { ?>
					 <li> 
					  
				 <?php 
					  
				  } else { ?>
					  
					 <li class="timeline-inverted"> <?php
				  }
				  
				  ?> 
              
				  
                     <div class="tl-circ"></div>
					 
					 
                     <div class="timeline-panel noarrow">
                        <div class="tl-heading">
                           <h4><?php the_title();  ?></h4>
                        </div>
                        <div class="tl-body">
                           <div class="row">
                              <div class="col-md-3">
                                 <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
                              </div>
                              <div class="col-md-9">
                                 <p> <?php the_content();  ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
					 
                  </li>
 
  		   
			    <?php 
				
				//increment $i to keep track of odd/even timeline panels 
				$i++; 
				
				//check to see if the date is in the timeline array. If it isn't add it to the timeline array. 
				
				 if(!in_array($date_formatted, $timeline_dates)) {
				$timeline_dates[] = $date_formatted; 
				 }
				
				endwhile; endif; 
				
				?>
	</ul>
               
			   


			   
			   
				  
				
         
         <!-- End of Fluid Container --> 
      </div>
	  </div>
	  </div>
	  </div>
	  
    <?php get_footer(); ?> 