<!-- File: src/Template/Articles/index.ctp -->

<h1>User Details</h1>

<div id="menu">
<ul class="menu Items" id="">
    <li><button type="button" name="Profile"  title="Profile"></button></li>
			<li class="current_page_item"><a href="#">Profile</a></li>
			<li><a href="#">Settings</a></li>
</ul>
<ul class="external sites" id="">
<li><button type="button" class="socialicon twitter" onclick="window.open('https://twitter.com/FedUniAustralia?utm_source=moodle&amp;utm_medium=banner&amp;utm_campaign=moodletwitter')" title="Twitter"><i class="fa fa-twitter fa-inverse"></i><span class="sr-only"></span></button></li>
<li id="yui_3_17_2_2_1443254932482_580"><button type="button" class="socialicon facebook" onclick="window.open('<?=$facebookloginurl;?>')" title="Facebook Connect" id="yui_3_17_2_2_1443254932482_579"><i class="fa fa-facebook fa-inverse" id="yui_3_17_2_2_1443254932482_578"></i><span class="sr-only"></span></button></li>
<li><button type="button" class="socialicon linkedin" onclick="window.open('https://www.linkedin.com/company/feduni-business-students-society?utm_source=moodle&amp;utm_medium=banner&amp;utm_campaign=moodlelinkedin')" title="LinkedIn"><i class="fa fa-linkedin fa-inverse"></i><span class="sr-only"></span></button></li>
<li><button type="button" class="socialicon youtube" onclick="window.open('https://www.youtube.com/user/FedUniAustralia?utm_source=moodle&amp;utm_medium=banner&amp;utm_campaign=moodleyoutube')" title="YouTube"><i class="fa fa-youtube fa-inverse"></i><span class="sr-only"></span></button></li>
<li><button type="button" class="socialicon instagram" onclick="window.open('http://instagram.com/FedUniAustralia?utm_source=moodle&amp;utm_medium=banner&amp;utm_campaign=moodleinstagram')" title="Instagram"><i class="fa fa-instagram fa-inverse"></i><span class="sr-only"></span></button></li>
<li><button type="button" class="socialicon website" onclick="window.open('http://www.federation.edu.au?utm_source=moodle&amp;utm_medium=banner&amp;utm_campaign=moodlewebsite')" title="Website"><i class="fa fa-globe fa-inverse"></i><span class="sr-only"></span></button></li>                            
</ul>
</div>
<div id="page">
		

		<div id="content">
<ul>
                                        <li>
						<h2>Sections</h2>
						<ul>
                                                        <li><a href="<?=$user1;?>">Login To Facebook</a></li>
							<li><a href="#">Profile</a></li>
							<li><a href="#">Best Picture</a></li>
							<li><a href="#">Friends</a></li>
							<li><a href="#">Connections</a></li>
                                                        <li><a href="#">Followers</a></li>
							<li><a href="#">Number of Online Posts</a></li>
							
						</ul>
					</li>
</ul>
			</div>

<div id="sidebar-bg">
			<div id="sidebar">
				<ul>
					<li>
						<h2>Sections</h2>
						<ul>
                                                        <li><a href="<?=$facebookloginurl;?>">Login To Facebook</a></li>
							<li><a href="#">Profile</a></li>
							<li><a href="#">Best Picture</a></li>
							<li><a href="#">Friends</a></li>
							<li><a href="#">Connections</a></li>
                                                        <li><a href="#">Followers</a></li>
							<li><a href="#">Number of Online Posts</a></li>
							
						</ul>
					</li>
					<li>
						<h2>Your Activity Info</h2>
						<ul>
							<li><a href="#">Active For</a></li>
							
						</ul>
					</li>
					<li>
						<h2>Something For You</h2>
						<ul>
							<li><a href="#">Profile</a></li>
							
						</ul>
					</li>

				</ul>
			</div>
		</div>
</div>