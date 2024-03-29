<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]> <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]> <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php
// get current menu name
$menu = JSite::getMenu();
if ($menu && $menu->getActive())
    $menu = $menu->getActive()->alias;
else
	$menu = "";

if ($_SERVER['SERVER_PORT'] === 8888 ||
		$_SERVER['SERVER_ADDR'] === '127.0.0.1' ||
		stripos($_SERVER['SERVER_NAME'], 'ccistaging') !== false ||
		stripos($_SERVER['SERVER_NAME'], 'dev.') === 0) {

	$testing = true;
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
} else {
	$testing = false;
}

JHTML::_('behavior.mootools');
$analytics = "UA-24737487-1";
?>

<head>
	<meta charset="utf-8" />
	<?= ($testing)? '':  '<meta http-equiv="X-UA-Compatible" contents="IE=edge,chrome=1">' ?>

 	<jdoc:include type="head" />

 	<?php if ($testing): ?>
 	     <meta name="robots" content="noindex, nofollow" />
    <?php endif; ?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="/templates/<?= $this->template ?>/resources/favicon.ico">
	<link rel="apple-touch-icon" href="/templates/<?= $this->template ?>/resources/apple-touch-icon.png">

	<!-- load css -->
	<?php if ($testing): ?>
		<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.css">
	<?php else: ?>
		<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.min.css">
	<?php endif; ?>

	<!-- load frameworks first, all other at bottom -->
	<?php if ($testing): ?>
		<script src="/templates/<?= $this->template ?>/js/libs/modernizr-1.7.js"></script>
		<script src="/templates/<?= $this->template ?>/js/libs/jquery-1.6.1.js"></script>
	<?php else: ?>
		<script src="/templates/<?= $this->template ?>/js/libs/modernizr-1.7.min.js"></script>
		<script src="///ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="/templates/<?= $this->template; ?>/js/libs/jquery-1.6.1.min.js">\x3c/script>')</script>
	<?php endif; ?>
	<script> jQuery.noConflict(); </script>
	<script type="text/javascript" src="http://use.typekit.com/oql5jqb.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
</head>

<body class="<?= $menu ?>">

	<div id="wrapper">
		<div id="top">
		    <jdoc:include type="modules" name="top" style="xhtml" />
		    <a class="menu-btn" href="#" onclick="jQuery('body').toggleClass('menu-open');return false;">Menu</a>
		    <div class="clear"></div>
		</div>

		<div id="header">
		    <jdoc:include type="modules" name="header" style="xhtml" />

		    <div class="clear"></div>
		</div>

		<div id="body" class="<?php echo ($this->countModules('sidebar'))? '':'wide'; ?>"><div>
		    <div id="component">
				<? if ($menu !== 'home'): ?>
					<div id="text_sizer">
						<span class="decrease">A-</span>
						<span class="increase">A+</span>
					</div>
				<? endif; ?>

				<jdoc:include type="message" />
		        <jdoc:include type="component" />

		        <div class="clear"></div>
		    </div>

		    <?php if ($this->countModules('sidebar')): ?>
		    <div id="sidebar">
		        <jdoc:include type="modules" name="sidebar" style="xhtml" />

		        <div class="clear"></div>
		    </div>
		    <?php endif; ?>

		    <div class="clear"></div>
		</div></div>

		<div class="hr"></div>

		<?php if ($this->countModules('scroll')): ?>
		<div id="scroll">
		    <div class="inner">
		        <jdoc:include type="modules" name="scroll" style="xhtml" />
		    </div>
		    <div class="arrow-left"></div>
		    <div class="arrow-right"></div>

		    <div class="clear"></div>
		</div>
		<?php endif; ?>

		<?php if ($this->countModules('scroll') &&
							($this->countModules('bottom') || $this->countModules('footer'))):?>
			<div class="hr"></div>
		<?php endif; ?>

		<?php if ($this->countModules('bottom')): ?>
		<div id="bottom">
		    <jdoc:include type="modules" name="bottom" style="xhtml" />

		    <div class="clear"></div>
		</div>
		<?php endif; ?>

		<?php if ($this->countModules('footer')): ?>
		<div id="footer">
		    <jdoc:include type="modules" name="footer" style="xhtml" />

		    <div class="clear"></div>
		</div>
		<?php endif; ?>

		<div class="hr"></div>

		<div id="copyright" style="position: relative;">
		    <div class="copyright">
		        &copy; <?php echo date('Y') ?> Sarnia Gives. All Rights Reserved.
		    </div>
<div style="text-align:center;">
<a href="http://www.otf.ca/" target="_blank">
<img src="/images/stories/Trillium_Logo_Small.png" />
</a>
</div>
		    <div class="site-by-cci">
		        Site by <a href="http://www.ccistudios.com" target="_blank">CCI Studios</a>
		    </div>

		    <div class="clear"></div>
		</div>
	</div>

	<div class="hidden">
		<jdoc:include type="modules" name="hidden" style="raw" />
	</div>

	<!-- load scripts -->
	<?php if ($testing): ?>
		<script src="/templates/<?= $this->template ?>/js/html5.js"></script>
		<script src="/templates/<?= $this->template ?>/js/scroller.js"></script>
		<script src="/templates/<?= $this->template ?>/js/text_size.js"></script>
	<?php else: ?>
		<script>
			var _gaq=[["_setAccount","<?php echo $analytics?>"],["_trackPageview"]];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
				g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
				s.parentNode.insertBefore(g,s)}(document,"script"));
	  	</script>
		<script src="/templates/<?= $this->template ?>/js/scripts-ck.js"></script>
	<?php endif; ?>
</body>
</html>