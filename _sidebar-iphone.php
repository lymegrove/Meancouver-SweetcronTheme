<aside id="sidebar_container">
<section>
<h3>Search</h3>
    <form id="search_form" method="post" action="<?php echo $this->config->item('base_url')?>items/do_search">
    <p><input type="text" name="query" class="text_input" value="<?php if (isset($query)): echo $query; endif;?>" /> <input type="submit" /></p>
    </form>
    </section>

<section>
<div id="explanation">
	<p>Vancouver is a beautiful place to live in but finding a job on these mean streets can be tough. Meancouver is the Vancouver area's leading niche job aggregator for tech jobs.</p>
	</div>
    </section>
<section>
<h3>Popular Tags</h3>
    <ul class="tag_list">
    	<?php foreach($popular_tags as $tag): ?>
    	<li><a href="<?php echo $this->config->item('base_url')?>items/tag/<?php echo $tag->slug?>"><?php echo $tag->name?></a></li>
    	<?php endforeach; ?>
    </ul>
</section>
    
</aside>