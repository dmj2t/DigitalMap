<!-- File: src/Template/Articles/index.ctp -->



<div id="menu">
<ul class="menu Items" id="">
    
			<li class="current_page_item"><?= $this->Html->link("Profile", array('controller' => 'Users','action'=> 'profile'))?></li>
			<li><?=$this->Html->link("Setting", array('controller' => 'Users','action' => 'edit',$loggedUserId));?></li>
                        <li><?= $this->Html->link("Logout", array('controller' => 'Users','action'=> 'logout'))?></li>
                        
                       
</ul>
    <ul class="userDetails"> Welcome <?=$user1?> </ul>
 
    
</div>

<div id="page">
		
<div id="sidebar-bg">
			<div id="sidebar">
				<ul>
					<li>
						<h2>Social Networks</h2>
						<ul>
                                                        <li>
                                                           
                                                            <a href="<?=$facebookloginurl?>">Login To Facebook</a> 
                                                            
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
    
<div id="content">
<?= $this->Flash->render() ?>
<ul>                      
						<h2>Wall</h2>      
                                                         <table>
                                                             <tr>
                                                                            <td> 
                                                                                <?php echo $this->Html->image("/css/images/photo.jpe", ["alt" => "Photos",'url' => ['controller' => 'SocialNetworks', 'action' => 'photo']]);?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $this->Html->image("/css/images/comment.jpg", ["alt" => "Comments",'url' => ['controller' => 'SocialNetworks', 'action' => 'feeds']]);?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $this->Html->image("/css/images/friends.jpe", ["alt" => "Friends",'url' => ['controller' => 'SocialNetworks', 'action' => 'friends']]);?>
                                                                            </td>
                                                                            
                                                              </tr>
                                                              
                                                          </table>	
                                                <br>
                                                               <br>
                                                                <br>
                                                                 <br>
                                                                  <br>
                                                                   <br>
                                                                   <br>
                                                               
                                                               
</ul>
</div>
</div>
