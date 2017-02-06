<?php get_header(); ?> 



<div class="container-fluid">
    <!-- Page Title and Breadcrumbs -->
    <div class="row border-container">
        <div class="col-md-12 border">
            <div class="col-md-12">
                <h1 class="border-text"> items </h1>
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
<div class="container-fluid">
    <div class="row">
        <!-- Filter Box -->
        <!-- Note: There is a search and filter plugin to use here -->
        <div class="col-md-2">
            <h3 class="sidebar_heading"> Filter by Category:</h3>

<div id="filters" class="btn-group-vertical">

    <?php
	
	// NOTE CATEGORY NAME NEEDS TO BE IN THIS FORMAT WARM_COLORS match with the URL
$terms = get_terms('category_items');
        $count = count($terms);
	
   	echo "<button type='button' data-filter='.item'	class='btn btn-default btn-large all '>All</button>";

        if ( $count > 0 ){
 
            foreach ( $terms as $term ) {
 
                $termname = strtolower($term->name);
			
                $termname_display = str_replace('_', ' ', $termname);
				
			$termname_display = ucwords($termname_display);
			
        
	
				 	echo "<button type='button' active data-filter='.category_items-" .$termname."'class='btn btn-default btn-large '>". $termname_display . "</button>";

            }
        }
    ?>
	
	
	

</div>




</div>



        <!-- Content Block Content Area -->

        <div id="isotope-list" class="col-md-10 main">
	
            <?php $args=array ( 'post_type'=> 'items',  'posts_per_page' => 50); $the_query = new WP_Query($args); ?>

	
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


            <?php endwhile; endif; ?>



        </div>
    </div>
</div>


<?php get_footer(); ?>