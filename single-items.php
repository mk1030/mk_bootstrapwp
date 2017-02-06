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
      <!-- Previous and Next Post Arrows --> 
      <div class="col-md-12">
      <?php previous_post_link('%link', '<span class="previous pull-left glyphicon glyphicon-chevron-left" aria-hidden="true"></span>'); ?> 
	  <?php next_post_link('%link', '<span class="next pull-right glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'); ?> 
	  
     
      </div>
      <div class="container">
	 
         <!-- Carousel/Body and Sidebar --> 
         <div class="row">
            <div class="col-md-9 main ">
	
			
			
          
  
 <?php while ( have_posts() ) : the_post(); ?>

     <!-- Carousel -->
			   
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->


  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

<?php			
	$fields = get_fields();

if( $fields )
{
	
	$i = 0;
	foreach( $fields as $field_name => $value )
	{
		
		//grab key value pairs. The image one is an object. 
	$field = get_field_object($field_name, false, array('load_value' => true));

	
	
	//When looping through, flag the images and check that the image value is an array. 
	if ($field['type'] == 'image' && (is_array($value) == true )) {
		
		
		//if the value is set and the name of the file (contained in URL)
		if (isset($value['url']) && (strpos($value['url'], 'slider_') == true ) ){ 
		
		
		
	?>
		

		<?php if ($i == 0) { ?>
	
		<!-- 	The first item in the slider needs to have an active class -->
		   <div class="item active">
		   
		<?php }

		else { ?>
		
		 <div class="item">
		<?php } 
		
		$i++;
		?> 
		
		<!-- 	Echo out the image and caption  -->
		     <img src="<?php echo $value['url'] ?>" alt="<?php $value['alt']; ?> thumbnail pic">
      <div class="carousel-caption">
     <?php echo $value['caption'] ?>
	   
      </div>
    </div>
	
	
		<?php }
	}
		
	}
}


?>

  <ol class="carousel-indicators">
<?php
$k=0; 
while ($k < $i) {


if($k == 0) { ?>

 <li data-target="#myCarousel" data-slide-to="<?php echo $k; ?>" class="active"></li>


<?php 
$k++;

} 

else {  ?>

 <li data-target="#myCarousel" data-slide-to="<?php echo $k; ?>"></li>

<?php 
$k++; 
}

 }?>
</ol>
		  <!-- Controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 <?php endwhile; ?>

	
  </div>


 


			   <!-- END Carousel -->
			   
		
              <!-- Page Body --> 
              <?php if(have_posts()): while (have_posts()) : the_post(); ?> 
              <!-- Page Body --> 
			  <div class="post_content">
			  
			
			  
			  
			  
               <?php the_content();  ?>
			   </div>
    
			 <?php endwhile; endif?> 
            </div>
            <!--Sidebar --> 
         
		 <?php get_sidebar('item'); ?> 
		 
         </div>
      </div>
<?php get_footer(); ?>