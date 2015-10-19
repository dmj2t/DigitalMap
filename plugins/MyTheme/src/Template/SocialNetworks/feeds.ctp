<!-- File: src/Template/Articles/index.ctp -->

<div id="menu">
<ul class="menu Items" id="">
    
			<li class="current_page_item"><?= $this->Html->link("Profile", array('controller' => 'Users','action'=> 'admin_profile'))?></li>
			<li><?=$this->Html->link('Personal Settings', ['action' => 'admin_edit',$loggedUserId]);?></li>
                        <li><?= $this->Html->link("Logout", array('controller' => 'Users','action'=> 'logout'))?></li>
</ul>
<ul class="userDetails"> Welcome <?=$user1?> </ul>
</div>
<div id="page">

<div class="content_other">
    <table>
<?php 

        foreach($feed as $feed) {
            echo "<tr>";
                echo "<td>";
		echo "Story: ".$feed->getProperty('story');  
                echo "</td>";
                echo "<td>";
                
                echo "message: ".$feed->getProperty('message');  
                echo "</td>";
		echo "</tr>";	   
			   }
    
    ?>
    </table>
</div>
    
    
</div>