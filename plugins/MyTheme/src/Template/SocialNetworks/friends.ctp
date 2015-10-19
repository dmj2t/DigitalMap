<!-- File: src/Template/Articles/index.ctp -->

<h1>Welcome <?=$user1?></h1>

<div id="menu">
<ul class="menu Items" id="">
    <li><button type="button" name="Profile"  title="Profile"></button></li>
			<li class="current_page_item"><?= $this->Html->link(array('controller' => 'Users','action'=> 'photo'))?></li>
			<li><a href="#">Settings</a></li>

</div>
<div id="page">

<div id="content">
<ul>
                                        <li>
						<h2>Sections</h2>
						<ul>
                                                        <li>
                                                            
                                                            <img src="<?//=//$picture?>" >
                                                            <?= $this->Html->link("/photo", array('controller' => 'Users','action'=> 'photo'))?>
                                                        
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
    
    
</div>