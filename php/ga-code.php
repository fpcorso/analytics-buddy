<?php
/**
 * This file handles displaying the GA code
 */

/**
 * Creates and outputs the necessary GA code
 *
 * @since 1.0.0
 */
function something() {
	$settings = get_option( '' );
	$tracking
	?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', '<?php echo $id; ?>', 'auto');
		<?php
		// if anonymized
		?>
		ga('set', 'anonymizeIp', true);
		<?php
		// end
		?>
		ga('send', 'pageview');

	</script>
	<?php
}