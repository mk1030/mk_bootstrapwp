<?php get_header(); ?> 


      <div class="container-fluid">
         <!-- Page Title and Breadcrumbs -->
         <div class="row border-container">
            <div class="col-md-12 border">
               <div class="col-md-12">
                  <h1 class="border-text" > <?php wp_title(); ?> </h1>
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
	 
         <!-- Body and Sidebar --> 
         <div class="row">
            <div class="col-md-9 main ">
		<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<h2 class="post_title"><a href="<?php the_permalink();?>" > <?php the_title(); ?> </a> </h2>
 <?php the_excerpt(); ?>
 <hr>
<?php endwhile; ?>
            <!--Sidebar --> 
         	</div>
		 <?php get_sidebar(); ?> 

	</div>
</div>
<?php get_footer(); ?>