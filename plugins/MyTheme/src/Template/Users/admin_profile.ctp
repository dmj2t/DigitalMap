<!-- File: src/Template/Articles/index.ctp -->


<div id="menu">
<ul class="menu Items" id="">
    
			<li class="current_page_item"><?= $this->Html->link("Profile", array('controller' => 'Users','action'=> 'admin_profile'))?></li>
			<li><?=$this->Html->link('Setting', ['action' => 'admin_edit',$loggedUserId]);?></li>
                        <li><?= $this->Html->link("Logout", array('controller' => 'Users','action'=> 'logout'))?></li>
</ul>
<ul class="userDetails"> Welcome <?=$user1?> </ul>
</div>


<div id="page">
<div id="content">

                                        
<table>
    <table>
    <tr>
        <th><?=$this->Paginator->sort('id', 'Id');?></th>
        <th><?=$this->Paginator->sort('username', 'Username');?></th>
	<th><?=$this->Paginator->sort('role', 'Role');?></th>
        <th>Delete/Edit</th>
    </tr>

    <!-- Here is where we iterate through our $users query object, printing out user info -->
 
    <?php foreach ($users as $user): ?>
   
    <tr>
        <td><?= $user->id ?></td>
		<td><?= $user->username ?> </td>
                
		<td><?= $user->role ?> </td>
                <td> <?= $this->Form->postLink(
                'Delete ',
                ['action' => 'delete', $user->id],
                ['confirm' => 'Please press Confirm to Delete User?'])
            ?><?=$this->Html->link('edit', ['action' => 'admin_edit',$user->id]);?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <th><?= $this->Paginator->first('< first');?></th>
         <th><?=$this->Paginator->prev(' << ' . __('previous'));?></th>
	<th><?=$this->Paginator->next(' >> ' . __('next'));?></th>
        <th><?= $this->Paginator->last('> last');?></th>
    </tr>
                
    
    
</table>
    
</table>
						
					

</div>

<div id="sidebar-bg">
			<div id="sidebar">
				<ul>
						<h2>Control Panel</h2>
						<ul>
							<li><?=$this->Html->link('Change Personal Settings', ['action' => 'admin_edit',$loggedUserId]);?></li>
                                                    	<li><?= $this->Html->link("Add New User", array('controller' => 'Users','action'=> 'add'))?></li>
                                                        
						</ul>
					
                                                  
				</ul>
			</div>
		</div>
</div>