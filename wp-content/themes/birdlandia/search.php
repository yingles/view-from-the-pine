<?php get_header(); ?>
<div <?php post_class('banner'); ?>></div>
	<div class="content-wrap banner-overlap">
		<div class="container margin-top">
			
				<div class="row-fluid">
			
					<div class="span8">
					<div class="post-area">
						<div <?php post_class('post-content'); ?>>
							<div class="post-wrap">
								<h1 class="search-title"><span>Search Results for:</span> <?php echo esc_attr(get_search_query()); ?></h1>
							</div><!-- /post-wrap -->
						</div><!--/post-content -->

						<?php 
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
					/* query_posts('post_type=post&paged=' . $paged); */
					if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
				?>
                <div <?php post_class('post-content'); ?>>
	                	<div class="post-wrap">
		                	<?php if(has_post_thumbnail()) :?>
		                		<div class="archive-thumbnail thumbnail pull-left"><?php the_post_thumbnail('archive-thumb'); ?></div>
			                	<div class="archive-text-content">
			                		<div <?php post_class('category'); ?>><?php the_category(', '); ?></div><!-- /category -->
			                		<div class="comment-total"><a href="<?php comments_link(); ?> "><?php comments_number('', '1 comment', '% comments'); ?></a></div>
				                    <h2 class="post-title archive-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				                    <div class="byline_contain archive-byline"><p class="byline vcard"><?php _e("Posted", "bonestheme"); ?> <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <span class="author"><?php the_author_posts_link(); ?></span><?php edit_post_link(' | Edit Post'); ?></p></div>
				                    <div class="main-content archive-content"><?php the_excerpt(); ?></div>
				                </div><!-- /archive-text-content -->
				                <div class="post-meta"><?php the_tags('<p class="tags"> #', ' #', '</p>'); ?></div>
		                	<?php else :?>
			                	<div <?php post_class('category'); ?>><?php the_category(', '); ?></div><!-- /category -->
		                		<div class="comment-total"><a href="<?php comments_link(); ?> "><?php comments_number('', '1 comment', '% comments'); ?></a></div>
		                		<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					                    <div class="byline_contain byline-top"><p class="byline vcard"><?php _e("Posted", "bonestheme"); ?> <time class="updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time> <?php _e("by", "bonestheme"); ?> <span class="author"><?php the_author_posts_link(); ?></span> | <?php edit_post_link('Edit Post'); ?></p></div>
		                	</div><!-- end post-wrap -->
				                	<?php if(has_post_thumbnail()) :?>
				                	<div class="thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('blog-thumb'); ?></a></div>
				                	<?php else :?>
				                	<?php endif;?>
				                	<div class="post-wrap-lower">
					                    
					                    <div class="main-content"><?php the_excerpt(); ?></div>
					                    <div class="post-meta">
					                    	<?php the_tags('<p class="tags"> #', ' #', '</p>'); ?>
					                    </div>
		                	<?php endif;?>
		                	
	                	</div><!-- /post-wrap -->
                	</div><!-- /post-content -->
                <?php endwhile; ?>
                	</div><!-- post-area -->
                	<?php if (function_exists('page_navi')) { ?>
					            <?php page_navi(); ?>
					        <?php } else { ?>
					            <nav class="wp-prev-next">
					                <ul class="clearfix">
					        	        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
					        	        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
					                </ul>
					            </nav>
					        <?php } ?>
                <?php else : ?>
                	<p>No posts.</p>
                <?php endif; ?>    
				
			</div><!-- end span9 -->
				
			<?php get_sidebar(); ?>
                
			</div><!-- end row-fluid -->           

		</div><!-- /container -->
	</div><!-- /content-wrap -->
		
	</div><!-- /main -->
	</div><!-- /wrap -->

<?php get_footer(); ?>