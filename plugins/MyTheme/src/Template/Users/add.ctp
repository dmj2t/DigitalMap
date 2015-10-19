<div id="menu">
<ul class="menu Items" id="">
    
			<li class="current_page_item"><?= $this->Html->link("Profile", array('controller' => 'Users','action'=> 'admin_profile'))?></li>
			<li><?=$this->Html->link('Personal Settings', ['action' => 'admin_edit',$loggedUserId]);?></li>
                        <li><?= $this->Html->link("Logout", array('controller' => 'Users','action'=> 'logout'))?></li>
</ul>
<ul class="userDetails"> Welcome <?=$user1?> </ul>
</div>


<div id="page">
<div id="content">
<div class="users form">
<?= $this->Form->create($user) ?>    
     <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
	<?= $this->Form->input('email') ?>
        <?= $this->Form->input('role', [
            'options' => ['admin' => 'Admin', 'user' => 'User']
        ]) ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>				

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







