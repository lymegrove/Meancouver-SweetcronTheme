<div class="footerBannerFullRes">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-7220126959042532";
/* MeancouverFooterBanner */
google_ad_slot = "1177782283";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
</div>

<footer id="contentinfo" class="body">
<a href="privacy.html" target="_blank">Privacy Policy</a>
<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>
			
<a id="credits" href="http://meancouver.com"><img src="<?php echo $this->config->item('theme_folder')?>images/meancouverFooter.png" alt="Meancouver" title="Meancouver" /></a>


</footer>
</div> <!-- end of #container -->
<?php wp_footer(); ?>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.4.2.js"%3E%3C/script%3E'))</script>


<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<script>
// Rewritten version
// By @mathias, @cheeaun and @jdalton

(function(doc) {

	var addEvent = 'addEventListener',
	    type = 'gesturestart',
	    qsa = 'querySelectorAll',
	    scales = [1, 1],
	    meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

	function fix() {
		meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
		doc.removeEventListener(type, fix, true);
	}

	if ((meta = meta[meta.length - 1]) && addEvent in doc) {
		fix();
		scales = [.25, 1.6];
		doc[addEvent](type, fix, true);
	}

}(document));
</script>
<!-- end concatenated and minified scripts-->


<!--[if lt IE 7 ]>
<script src="js/libs/dd_belatedpng.js"></script>
<script> DD_belatedPNG.fix('img, .png_bg'); </script>
<![endif]-->

<!-- yui profiler and profileviewer - remove for production -->
<script src="js/profiling/yahoo-profiling.min.js"></script>
<script src="js/profiling/config.js"></script>
<!-- end profiling code -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-6556750-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>