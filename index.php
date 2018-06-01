<?php
get_header();
?>


	<div id="fh5co-container">
		<div id="fh5co-home" class="js-fullheight" data-section="Home">

			<div class="flexslider">
				
				<div class="fh5co-overlay"></div>
				<div class="fh5co-text">
					<div class="container">
						<div class="row"  style="color: white">
							<h1 class="to-animate"><?php echo of_get_option('page_description');?></h1>
						</div>
					</div>
				</div>
			  	<ul class="slides">
			  	<?php
			  		
       $sliders = array( 'post_type' => 'slider', 'posts_per_page' => -1 );
	   $query = new WP_Query($sliders);	
		while($query->have_posts()) : $query->the_post() ;	
     $attachments = new Attachments( 'slider_attachments' );
     while( $attachments->get() ) : 
			$image = $attachments->src( 'full' );
     ?>
			  	
			   	<li style="background-image: url(<?php echo $image?>);" data-stellar-background-ratio="0.5"></li>
			   <?php endwhile;endwhile;;?>
			  	</ul>

			</div>
			
		</div>
		
		<div class="js-sticky">
			<div class="fh5co-main-nav">
				<div class="container-fluid">
					<div class="fh5co-menu-1">
					<?php wp_nav_menu(array( 'container'=> false, 'menu_class'=> false, 'theme_location'=> 'primary' ))?>
					</div>
					<div class="fh5co-logo">
						<a href="<?php echo home_url( '/' ); ?>"><?php if ( $img_url = of_get_option('image_logo') ) {?>
                        <img src="<?php echo $img_url; ?>">
                    <?php } else{ ?>
                        <?php $title = of_get_option('logo_title'); echo $title;?>
                    <?php }?></a>
					</div>
					<div class="fh5co-menu-2">
					<?php wp_nav_menu(array( 'container'=> false, 'menu_class'=> false, 'theme_location'=> 'secondary' ))?>
					</div>
				</div>
				
			</div>
		</div>

		<div id="fh5co-about" data-section="About">
			<div class="fh5co-2col fh5co-bg to-animate-2" style="background-image: url(<?php echo of_get_option('about_img');?>)"></div>
			<div class="fh5co-2col fh5co-text">
				<h2 class="heading to-animate"><?php echo of_get_option('about_us');?></h2>
				<p class="to-animate"><?php echo of_get_option('text_about_us');?></p>
				<p class="text-center to-animate"><a href="#" data-nav-section="Reservation" class="btn btn-primary btn-outline">Get in touch</a></p>
			</div>
		</div>

		<div id="fh5co-sayings">
			<div class="container">
				<div class="row to-animate">

					<div class="flexslider">
						<ul class="slides">
							<?php
								$tests = get_posts(array( 'post_type' => 'testimonial' ,'posts_per_page' => -1 ));
								foreach( $tests as $test ) {
							?>
							<li>
								<blockquote>
									<p><?php echo apply_filters('the_content', get_post_field('post_content', $test->ID));?></p>
									<p class="quote-author">&mdash; <?php echo get_post_meta($test->ID, '_detail_philosophist', true);?></p>
								</blockquote>
							</li>
						<?php }?>
							
						</ul>
					</div>

				</div>
			</div>
		</div>

		<div id="fh5co-featured" data-section="Features">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate"><?php echo of_get_option('feature_foods');?></h2>
						<p class="sub-heading to-animate"><?php echo of_get_option('feature_foods_body');?></p>
					</div>
				</div>
				<div class="row">
					<div class="fh5co-grid">
						<?php 
					$args = array('post_type' => 'food_section','posts_per_page' => 1,'cat' => 17);

					$query = new WP_Query($args);	
					while($query->have_posts()) : $query->the_post() ;	
					$attachments = new Attachments( 'food_section_attachments' );
					?>
						<div class="fh5co-v-half to-animate-2">
						<?php while( $attachments->get() ) : 
									$image = $attachments->src( 'full' );
								?>
							<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?php echo $image?>)"></div>
						<?php endwhile;?>
							<div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
								<h2><?php the_title();?></h2>
								<span class="pricing">$<?php echo get_post_meta($post->ID, '_detail_price', true);?></span>
								<p><?php the_content();?></p>
							</div>
						</div>
					<?php endwhile;?>
						<div class="fh5co-v-half">
						<?php 
					$args = array('post_type' => 'food_section','posts_per_page' => 2,'cat' => 17, 'offset' => 1);

					$query = new WP_Query($args);	
					while($query->have_posts()) : $query->the_post() ;	
					
					$id = get_the_ID();
					if($id % 2 == 0){
						$attachments = new Attachments( 'food_section_attachments' );
					?>
							<div class="fh5co-h-row-2 to-animate-2">
							<?php while( $attachments->get() ) : 
									$image = $attachments->src( 'full' );
								?>
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?php echo $image?>)"></div>
							<?php endwhile;?>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2><?php the_title();?></h2>
									<span class="pricing">$<?php echo get_post_meta($post->ID, '_detail_price', true);?></span>
									<p><?php the_content();?></p>
								</div>
							</div>
							<?php } else {
								$attachments = new Attachments( 'food_section_attachments' );
								?>
							<div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
							<?php while( $attachments->get() ) : 
									$image = $attachments->src( 'full' );
								?>
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?php echo $image?>)"></div>
							<?php endwhile;?>
								<div class="fh5co-v-col-2 fh5co-text arrow-right">
									<h2><?php the_title();?></h2>
									<span class="pricing">$<?php echo get_post_meta($post->ID, '_detail_price', true);?></span>
									<p><?php the_content();?></p>
								</div>
							</div>
							<?php } endwhile;?>
						</div>

						<div class="fh5co-v-half">
						<?php 
					$args = array('post_type' => 'food_section','posts_per_page' => 2,'cat' => 17, 'offset' => 3);

					$query = new WP_Query($args);	
					while($query->have_posts()) : $query->the_post() ;	
					$attachments = new Attachments( 'food_section_attachments' );
					$id = get_the_ID();
					if($id % 2 == 0){
						
					?>
							<div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
								<?php while( $attachments->get() ) : 
									$image = $attachments->src( 'full' );
								?>
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?php echo $image ?>)"></div>
								<?php endwhile; ?>
								<div class="fh5co-v-col-2 fh5co-text arrow-right">
									<h2><?php the_title();?></h2>
									<span class="pricing">$<?php echo get_post_meta($post->ID, '_detail_price', true);?></span>
									<p><?php the_content();?></p>
								</div>
							</div>
							<?php } else {
								 while( $attachments->get() ) : 
									$image = $attachments->src( 'full' );
								?>
							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?php echo $image?>)"></div>
								<?php endwhile; ?>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2><?php the_title();?></h2>
									<span class="pricing">$<?php echo get_post_meta($post->ID, '_detail_price', true);?></span>
									<p><?php the_content();?></p>
								</div>
							</div>
							<?php } endwhile;?>
						</div>
						<?php 
					$args = array('post_type' => 'food_section','posts_per_page' => 1,'cat' => 17 , 'offset' => 5);

					$query = new WP_Query($args);	
					while($query->have_posts()) : $query->the_post() ;	
					$thumb_url = get_the_post_thumbnail_url( $post->ID, 'full' );
					?>
						<div class="fh5co-v-half to-animate-2">
							<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?php echo $thumb_url?>)"></div>
							<div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
								<h2><?php the_title();?></h2>
								<span class="pricing">$<?php echo get_post_meta($post->ID, '_detail_price', true);?></span>
								<p><?php the_content();?></p>
							</div>
						</div>
					<?php endwhile;?>
					</div>
				</div>

			</div>
		</div>

		<div id="fh5co-type" style="background-image: url(<?php bloginfo('template_url');?>/images/slide_3.jpg);" data-stellar-background-ratio="0.5">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="row">
				<?php 
					$args = array('post_type' => 'feature','posts_per_page' => 4 );
					$query = new WP_Query($args);	
					while($query->have_posts()) : $query->the_post() ;	
					$thumb_url = get_the_post_thumbnail_url( $post->ID, 'full' );
				?>
					<div class="col-md-3 to-animate">
						<div class="fh5co-type">
						<span class="with-icon"><img class="with-icon" src="<?php echo $thumb_url;?>"></span>
							<h3><?php the_title();?></h3>
							<p><?php the_content();?></p>
						</div>
					</div>
				<?php endwhile;?>
				</div>
			</div>
		</div>

		<div id="fh5co-menus" data-section="Menu">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate"><?php echo of_get_option('food_menu');?></h2>
						<p class="sub-heading to-animate"><?php echo of_get_option('food_menu_body');?></p>
					</div>
				</div>
				<div class="row row-padded">
					<div class="col-md-6">
						<div class="fh5co-food-menu to-animate-2">
						<?php 
					$args = array('post_type' => 'food_section','posts_per_page' => 4 , 'category__not_in' => array(17,19));
					$query = new WP_Query($args);	
					if($query -> have_posts()){
						$id = $query->posts[0]->ID;

					$category = get_the_category($id);
					?>

					<h2 class="fh5co-drinks"><?php echo $category[0]->cat_name;?></h2>
					<?php
					while($query->have_posts()) : $query->the_post() ;	
					$attachments = new Attachments( 'food_section_attachments' );
					
				?>
				<ul>
								<li>
									<div class="fh5co-food-desc">
									<?php
										while( $attachments->get() ) : 
										$image = $attachments->src( 'full' );
									?>
										<figure>
											<img src="<?php echo $image?>" class="img-responsive" alt="">
										</figure>
									<?php endwhile;?>
										<div>
											<h3><?php the_title();?></h3>
											<p><?php the_content();?></p>
										</div>
									</div>
									<div class="fh5co-food-pricing">
										$<?php echo get_post_meta($post->ID, '_detail_price', true);?>
									</div>
								</li>
						<?php endwhile; }?>

							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-food-menu to-animate-2">
						<?php 
					$args = array('post_type' => 'food_section','posts_per_page' => 4 , 'category__not_in' => array(17,18));
					$query = new WP_Query($args);	
					if($query -> have_posts()){
						$id = $query->posts[0]->ID;

					$category = get_the_category($id);
					?>

					<h2 class="fh5co-dishes"><?php echo $category[0]->cat_name;?></h2>
					<?php
					while($query->have_posts()) : $query->the_post() ;	
					$attachments = new Attachments( 'food_section_attachments' );
				?>
							<ul>
								<li>
									<div class="fh5co-food-desc">
									<?php
										while( $attachments->get() ) : 
										$image = $attachments->src( 'full' );
									?>
										<figure>
											<img src="<?php echo $image?>" class="img-responsive" alt="">
										</figure>
									<?php endwhile;?>
										<div>
											<h3><?php the_title();?></h3>
											<p><?php the_content();?></p>
										</div>
									</div>
									<div class="fh5co-food-pricing">
										$<?php echo get_post_meta($post->ID, '_detail_price', true);?>
									</div>
								</li>
								<?php endwhile; }?>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center to-animate-2">
						<p><a href="#" class="btn btn-primary btn-outline">More Food Menu</a></p>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-events" data-section="Events" style="background-image: url(images/slide_2.jpg);" data-stellar-background-ratio="0.5">
			<div class="fh5co-overlay"></div>
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2 to-animate">
						<h2 class="heading"><?php echo of_get_option('upcoming_events');?></h2>
						<p class="sub-heading"><?php echo of_get_option('upcoming_events_body');?></p>
					</div>
				</div>
				<div class="row">
				<?php 
					$args = array('post_type' => 'post','posts_per_page' => 3);

					$query = new WP_Query($args);	
					while($query->have_posts()) : $query->the_post() ;
					$dates = get_post_meta($post->ID , '_detail_date',true );
					$date = date(get_option('date_format'), $dates);
					?>
					<div class="col-md-4">
						<div class="fh5co-event to-animate-2">
							<h3><?php the_title();?></h3>
							<span class="fh5co-event-meta"><?php echo date('l,F j, Y', strtotime($date));?></span>
							<p><?php the_content();?></p>
							<p><a href="#" class="btn btn-primary btn-outline">Read More</a></p>
						</div>
					</div>
				<?php endwhile;?>
				</div>
			</div>
		</div>

		<div id="fh5co-contact" data-section="Reservation">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate"><?php echo of_get_option('contact');?></h2>
						<p class="sub-heading to-animate"><?php echo of_get_option('contact_body');?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 to-animate-2">
						<h3>Contact Info</h3>
						<ul class="fh5co-contact-info">
							<li class="fh5co-contact-address ">
								<i class="icon-home"></i>
								<?php echo of_get_option('footer_address');?>
							</li><br>
							<li class="fh5co-contact-address" ><i class="icon-phone"></i> <?php echo of_get_option('footer_mobile');?></li><br>
							<li class="fh5co-contact-address" ><i class="icon-envelope"></i><?php echo of_get_option('footer_email');?></li><br>
							<li class="fh5co-contact-address" ><i class="icon-globe"></i> <a href="<?php echo of_get_option('footer_website');?>" target="_blank"><?php echo of_get_option('footer_website');?></a></li>
						</ul>
					</div>
					<div class="col-md-6 to-animate-2">
						<h3>Reservation Form</h3>
						<div class="form-group ">
							<label for="name" class="sr-only">Name</label>
							<input id="name" class="form-control" placeholder="Name" type="text">
						</div>
						<div class="form-group ">
							<label for="email" class="sr-only">Email</label>
							<input id="email" class="form-control" placeholder="Email" type="email">
						</div>
						<div class="form-group">
							<label for="occation" class="sr-only">Occation</label>
							<select class="form-control" id="occation">
								<option>Select an Occation</option>
							  <option>Wedding Ceremony</option>
							  <option>Birthday</option>
							  <option>Others</option>
							</select>
						</div>
						<div class="form-group ">
							<label for="date" class="sr-only">Date</label>
							<input id="date" class="form-control" placeholder="Date &amp; Time" type="text">
						</div>


							
						<div class="form-group ">
							<label for="message" class="sr-only">Message</label>
							<textarea name="" id="message" cols="30" rows="5" class="form-control" placeholder="Message"></textarea>
						</div>
						<div class="form-group ">
							<input class="btn btn-primary" value="Send Message" type="submit">
						</div>
						</div>
				</div>
			</div>
		</div>

		
	</div>


























<?php
get_footer();
?>