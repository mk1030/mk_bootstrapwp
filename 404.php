<?php
 
get_header(); ?>


<div class="container-fluid">
         <!-- Page Title and Breadcrumbs -->
         <div class="row border-container">
            <div class="col-md-12 border">
               <div class="col-md-12">
                  <h1 class="border-text" > 404  </h1>
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
			<section>
				
					<h2><?php _e( 'Oops! Sorry this page can&rsquo;t be found.', 'mk-bootstrap-template' ); ?></h2>
			
 
			</section><!-- .error-404 -->
            <!--Sidebar --> 
         	</div>
		

	</div>
</div>
 

<?php get_footer(); ?>