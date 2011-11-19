</div>
<footer id="contentinfo" class="body">
<a id="credits" href="http://meancouver.com"><img src="<?php echo $this->config->item('theme_folder')?>images/meancouver-footer-iphone.png" alt="" /></a>
</footer>
</div> <!-- end of #container -->


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.4.2.js"%3E%3C/script%3E'))</script>


<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
<!-- end concatenated and minified scripts-->
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