<? defined('KOOWA') or die; ?>

<center>
	<div style="width: 650px; border-bottom: 1px solid #c8c9cb; padding: 0 0 5px;">
		<table width="100%" cellpadding="0" border="0" cellspacing="0">
			<tr>
				<td>
					<img src="http://dev.sarniagives.com/images/stories/default/logo.png" alt="Sarnia Gives" />
				</td>
				
				<td align="right" style="vertical-align: bottom;" valign="bottom">
					<a href="mailto:info@sarniagives.com" style="color: #bbb;">info@sarniagives.com</a>
					<a href="http://www.sarniagives.com" style="color: #bbb;">www.sarniagives.com</a>
				</td>
			</tr>
		</table>
	</div>
	
	<div style="width: 650px; text-align: left; ">
		<p>Hello <?= $name; ?>,</p>
		<p style="color: #5F167B;">Welcome to Sarnia Gives, Sarnia-Lambton's Community Volunteer Center!</p>
		<p>Whether you have used our site before or this is your first time, here are some of the many ways Sarnia Gives can help you:</p>
		<ul>
			<li>Information on how to get started volunteering.</li>
			<li>Profiles of local organizations.</li>
			<li>Postings to help you find volunteer opportunities best suited to you.</li>
		</ul>
		<p>Now that you are registered, volunteer opportunities best suited to your skills, abilities and interests will always be readily available when you log in.
			<?// You will also receive weekly emails if a new opportunity that fits your criteria becomes available. ?></p>
		<p>You can update your profile by logging in with your username and password <a href="http://sarniagives.com/log-in.html">here</a>:</p>
		<p>Username: <?= $email ?><br/>
		Password: <?= $password ?></p>

		<p>If you have any questions about Sarnia Gives please do not hesitate to email us at <a href="mailto:info@sarniagives.com">info@sarniagives.com</a>.</p>

		<p>Thank you again for registering with Sarnia Gives,<br/>
		The Team at Sarnia Gives</p>
	</div>
</center>
		
