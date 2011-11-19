<article id="main_container">
<?php if (isset($_SERVER['HTTP_REFERER'])):
$backlink = $_SERVER['HTTP_REFERER'];
else:
$backlink = $this->config->item('base_url');
endif; ?>
<p id="breadcrumb"><a href="<?php echo $backlink?>">&laquo; Back To Lifestream</a></p>

<div id="single_container">
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4e725467021f7fb3"></script>
<!-- AddThis Button END -->
	<div id="single_header">
	<h2><?php echo $item->get_title()?></h2>
	<p><?php echo $item->get_human_date()?></p>
	</div>
	
	<?php if ($item->has_content()): ?>
	<div id="single_content"><?php echo $item->get_content()?></div>
	<?php endif; ?>
	<?php if ($item->has_image() && !$item->has_video()): ?>
	<?php if (isset($item->item_data[$item->get_feed_class()]['image']['m']) && !empty($item->item_data[$item->get_feed_class()]['image']['m'])): ?>
	<p><img src="<?php echo $item->item_data[$item->get_feed_class()]['image']['m']?>" alt="" /></p>
	<?php else: ?>
	<p><img src="<?php echo $item->get_image()?>" alt="" /></p>
	<?php endif; ?>
	<?php endif; ?>
	<?php if ($item->has_video()): ?>
	<p>
	        <?php //inline php hackery FTW!
	        $video = str_replace('width="212"', 'width="500"', $item->get_video());
            $video = str_replace('height="159"', 'height="375"', $video);
            $video = str_replace('height="178"', 'height="415"', $video);
            echo $video?>
	</p>
	<?php endif; ?>
	<?php if ($item->has_tags()): ?>
	<ul class="item_tag_list">
		<li>Tags:</li>
		<?php foreach ($item->get_tags() as $tag): ?>
		<li><a href="<?php echo $this->config->item('base_url')?>items/tag/<?php echo $tag->slug?>"><?php echo $tag->name?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
	<div id="textLinksSingle">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7220126959042532";
/* singleMeancouverTextLinks2 */
google_ad_slot = "6443713717";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
	<?php if ($item->get_original_permalink()): ?>
	<p id="original_permalink">Via: <span><a href="<?php echo $item->get_original_permalink()?>"><?php echo $item->get_original_permalink()?></a></span></p>
	<?php endif; ?>
</div>

            <div id="comments_container">
	        <div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'meancouver'; // required: replace example with your forum shortname

    // The following are highly recommended additional parameters. Remove the slashes in front to use.
    // var disqus_identifier = 'unique_dynamic_id_1234';
    // var disqus_url = 'http://example.com/permalink-to-page.html';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>
</div>

</article>
<?php $this->load->view('themes/'.$this->config->item('theme').'/_sidebar')?>