

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
<!-- File: src/Template/Articles/index.ctp -->

<h1>Setting</h1>

<div id="menu">
                <ul>
                       <li class="current_page_item"><a href="#">Settings</a></li>
			<li ><a href="#">Profile</a></li>
			
		</ul>
</div>
<div id="page">
		

<div id="content">
<ul>
                                        <li>
						<h2>Sections</h2>
						<ul>
                                                        <li>Name <?=$user;?></li>
                                                        <li>
<?php
echo $this->Html->link('edit', [
    'action' => 'edit',
    $post->id
]); ?>
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
						<h2>Setting</h2>
						<ul>
                                                        <li>General</li>	
						</ul>
					</li>
					
				</ul>
			</div>
		</div>
</div>