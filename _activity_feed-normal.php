<article id="main_container">

	<?php if (isset($tag)): ?>
	<p id="breadcrumb"><a href="<?php echo $this->config->item('base_url')?>">Home</a> &rsaquo; Items tagged with <?php echo $tag?></p>
	<?php endif; ?>

	<?php if (isset($query)): ?>
	<p id="breadcrumb"><a href="<?php echo $this->config->item('base_url')?>">Home</a> &rsaquo; Search for <?php echo $query?></p>
	<?php endif; ?>

	<?php if (isset($site)): ?>
	<p id="breadcrumb"><a href="<?php echo $this->config->item('base_url')?>">Home</a> &rsaquo; Items from <?php echo $site?></p>
	<?php endif; ?>
		
    <ul id="activity_list">
        <?php if ($items): $i = 1; foreach ($items as $item): ?>
            <!-- begin conditional content -->
            <li class="item <?php echo $item->get_feed_class()?> <?php if ($i % 3 == 0): ?> last<?php endif; ?>">
            	<p class="site_info" style="background-size: 16px 16px;background: url(<?php echo $item->get_feed_icon()?>) 3px center no-repeat">Posted at <a href="<?php echo $this->config->item('base_url')?>items/site/<?php echo $item->get_feed_domain()?>"><?php echo $item->get_feed_domain()?></a></p>
            	<div class="item_inner">
            	
            	<!-- domain-specific boxes -->
            	        	
            	<?php if ($item->get_feed_domain() == 'careerjet.ca'): ?>
            	<div class="inner_container">
            	<p class="digg_title"><a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>"><?php echo $item->get_title()?></a></p>
            	<p><?php echo word_limiter(strip_tags($item->get_content()), 38)?></p>
            	</div>
            	
            	<?php elseif ($item->get_feed_domain() == 'vancouver.en.craigslist.ca'): ?>
            	<div class="inner_container">
            	<p class="digg_title"><a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>"><?php echo $item->get_title()?></a></p>
            	<p><?php echo word_limiter(strip_tags($item->get_content()), 38)?></p>
            	</div>
            	
            	<?php elseif ($item->get_feed_domain() == 'vancouver.kijiji.ca'): ?>
            	<div class="inner_container">
            	<p class="digg_title"><a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>"><?php echo $item->get_title()?></a></p>
            	<p><?php echo word_limiter(strip_tags($item->get_content()), 38)?></p>
            	</div>
            	
            	<?php elseif ($item->get_feed_domain() == 'simplyhired.ca'): ?>
            	<div class="inner_container">
            	<p class="digg_title"><a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>"><?php echo $item->get_title()?></a></p>
            	<p><?php echo word_limiter(strip_tags($item->get_content()), 38)?></p>
            	</div>
            	
            	<?php elseif ($item->get_feed_domain() == 'bctechnology.com'): ?>
            	<div class="inner_container">
            	<p class="digg_title"><a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>"><?php echo $item->get_title()?></a></p>
            	<p><?php echo word_limiter(strip_tags($item->get_content()), 38)?></p>
            	</div>
            	
            	<?php elseif ($item->get_feed_domain() == 'eluta.ca'): ?>
            	<div class="inner_container">
            	<p class="digg_title"><a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>"><?php echo $item->get_title()?></a></p>
            	<p><?php echo word_limiter(strip_tags($item->get_content()), 38)?></p>
            	</div>
            	
            	<?php elseif ($item->get_feed_domain() == 'vancouverjobs.ca'): ?>
            	<div class="inner_container">
            	<p class="digg_title"><a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>"><?php echo $item->get_title()?></a></p>
            	<p><?php echo word_limiter(strip_tags($item->get_content()), 38)?></p>
            	</div>
            	
            	<?php elseif ($item->get_feed_domain() == 'workopolis.com'): ?>
            	<div class="inner_container">
            	<p class="digg_title"><a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>"><?php echo $item->get_title()?></a></p>
            	<p><?php echo word_limiter(strip_tags($item->get_content()), 38)?></p>
            	</div>
            	
            	<?php elseif ($item->get_feed_domain() == 'monster.com'): ?>
            	<div class="inner_container">
            	<p class="digg_title"><a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>"><?php echo $item->get_title()?></a></p>
            	<p><?php echo word_limiter(strip_tags($item->get_content()), 38)?></p>
            	</div>
            	
            	<?php elseif ($item->get_feed_domain() == 'digg.com'): ?>
            	<div class="inner_container">
            	<p class="digg_title"><a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>"><?php echo $item->get_title()?></a></p>
            	<p><?php echo word_limiter(strip_tags($item->get_content()), 38)?></p>
            	</div>
            	           	
            	<?php elseif (!$item->feed_id): //this means it came from Sweetcron itself ?>
            	<div class="inner_container">
            	<p class="blog_title"><a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>"><?php echo $item->get_title()?></a></p>
            	<p class="blog_cite">A blog post</p>
            	</div>

            	<?php else: //generic container with instructions ?>
            	<div class="inner_container instructions">
            	<p><strong>The Boxy theme does not have a custom style for this type of item.</strong></p>  
            	<p>You can create one by editing the <code>_activity_feed.php</code> and <code>main.css</code> files.</p>
            	<p>Please read the <a href="http://code.google.com/p/sweetcron/wiki/Themes">Theme Docs</a> and <a href="http://code.google.com/p/sweetcron/wiki/API">API</a> for more information.</p>
            	</div>

            	<?php endif; ?>
            	
            	</div>
            	<p class="date"><?php echo $item->get_human_date()?> | <a href="<?php echo $item->get_permalink()?>/<?php echo $item->get_name()?>#disqus_thread">Comments &raquo;</a></p>

            </li>

        <?php $i++; endforeach; endif; ?>
    </ul>
	<div class="clear"></div>
    <p id="pagination">Page: <?php echo $pages?></p>

</article>