<?= @helper('behavior.mootools') ?>
<script src="media://lib_koowa/js/koowa.js" />

<h1 class="componentheading">
	Change the World
</h1>

<?php
$user = JFactory::getUser();
if ($user->guest)
{
	print '<p>You must be logged in to log your volunteer hours. <a href="/login.html">Login or sign up now.</a></p>';
}
else
{
?>
<div style="text-align:center;font-size:1.2em;">
	<h2 style="color:#7f3f98;font-size:4.5em;padding-bottom:10px;display:inline-block;border-bottom:1px solid #dcdcdc;margin-bottom:0;">Thank You!</h2>
	<p style="font-size:1.5em;-webkit-font-smoothing:antialiased;">Your Hours Have Been Logged</p>
	<a href="/" style="display:inline-block;padding:12px;color:white;background:#7f3f98;text-transform:uppercase;text-decoration:none;">Return Home</a>
</div>
<?php
}
?>