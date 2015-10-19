<!-- File: src/Template/Articles/index.ctp -->

<div id="menu">
<ul class="menu Items" id="">
    
			<li class="current_page_item"><?= $this->Html->link("Profile", array('controller' => 'Users','action'=> 'profile'))?></li>
			<li><?=$this->Html->link("Setting", array('controller' => 'Users','action'=> 'edit',$loggedUserId));?></li>
                        <li><?= $this->Html->link("Logout", array('controller' => 'Users','action'=> 'logout'))?></li>
                        
                       
</ul>
    <ul class="userDetails"> Welcome <?=$user1?> </ul>
 
    
</div>
</div>
<div id="page">

<div class="content_other" >

    <table>
        <tr>
    <?php 
        foreach($pic as $picture) {
            
            echo '<img src="'.$picture->getProperty('picture').'">';
                
                
                echo "</div>";
			   
			   }
        
    
    ?>
        </tr>
        </table>
    
</div>
</div>