<?php
/*
Template Name: Full-width Template
*/
?>



<?php get_header(); ?> 


      <div class="container-fluid">
         <!-- Page Title and Breadcrumbs -->
         <div class="row border-container">
            <div class="col-md-12 border">
               <div class="col-md-12">
                  <h1 class="border-text" > <?php the_title();  ?> </h1>
               </div>
            </div>
         </div>
         <!-- Breadcrumbs -->
   	  <div class="row">
		 <ol class="breadcrumbs breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</ol>
   </div>	
      </div>


      <div class="container">
	 
         <!-- Carousel/Body and Sidebar --> 
         <div class="row">
            <div class="col-md-12 main ">
		
			<?php if(have_posts()): while (have_posts()) : the_post(); ?> 
              <!-- Page Body --> 
			  <div class="post_content">
               <?php the_content();  ?>
			   </div>
            </div>
			 <?php endwhile; endif?> 
            <!--Sidebar --> 
         
		 
		 
         </div>
      </div>
<?php get_footer(); ?>