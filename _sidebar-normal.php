<aside id="sidebar_container">
<?php if (function_exists('smcf')) : ?>
    <?php smcf(); ?>
<?php endif; ?>

  <div id="explanation">
	<p>Vancouver is a beautiful place to live in but finding a job on these mean streets can be tough. Meancouver is the Vancouver area's leading niche job aggregator for tech jobs.</p>
	</div>
<div class="adsenseSidebarFullRes">
    <script type="text/javascript"><!--
google_ad_client = "ca-pub-7220126959042532";
/* Meancouver 300x250, created 11/13/08 */
google_ad_slot = "0303022851";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<script id="dlvr-widget" src="http://widgets.dlvr.it/f7d80b870a39695bcab247791162f182_3AnY0X6DBf5bXcaWpvbl0uaTeCcVLg0wsoyGVnIBlKdhNKEOnIXG9htIC3F_2BeuSoALeVyAiBpiTZv6cA_3D_3D" type="text/javascript"></script>
<script type="text/javascript">
    	DlvrWidget({
		width:300,
		items:5,
		widgetbg:'ffffff',
		widgetborder:'CCCCCC',
		titlecolor:'CCCCCC',
		containerbg:'F9F9F9',
		containerborder:'CCCCCC',
		linkcolor:'86D8D5',
		textcolor:'45240D'
	}).render();    
</script>
    <!--h3>Popular Tags</h3>
    <ul class="tag_list">
    	<?php foreach($popular_tags as $tag): ?>
    	<li><a href="<?php echo $this->config->item('base_url')?>items/tag/<?php echo $tag->slug?>"><?php echo $tag->name?></a></li>
    	<?php endforeach; ?>
    </ul-->
    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<!-- aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e( 'Meta', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside -->

			<?php endif; // end sidebar widget area ?>

    
</aside>
</section>