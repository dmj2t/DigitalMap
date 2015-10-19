
<h1>Setting</h1>

<div id="menu">
                <ul>
                       <li><?= $this->Html->link("Profile", array('controller' => 'Users','action'=> 'profile'))?></li>
                        <li class="current_page_item"><?=$this->Html->link('Setting', ['action' => 'edit',$loggedUserId]);?></li>
			<li><?= $this->Html->link("Logout", array('controller' => 'Users','action'=> 'logout'))?></li>
			
		</ul>
   
<ul class="userDetails"> Welcome <?=$user1?> </ul>
</div>
<div id="page">
		

<div id="content">
<?= $this->Flash->render() ?>
<ul>
                                        <li>
						<h2>Sections</h2>
						<ul>
                                                        <li>Name <?=$user;?></li>
                                                        <li>

<?=$this->Html->link('Change Personal Settings', ['action' => 'edit',$loggedUserId]);?> 
</li>
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
						<h2>Social Networks</h2>
						<ul>
                                                        <li>
                                                        
                                                            <?php if(isset($facebookloginurl)){$login="Login To Facebook";} else {$facebookloginurl="";$login="Logout Of Facebook";}?>
                                                            <a href="<?=$facebookloginurl?>"><?=$login?></a>            
                                                        </li>
							
							
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
    