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

<div class="Edit User">
<?= $this->Form->create($user,['context' => ['validator' => 'adminUpdate']]) ?>
    <fieldset>
        <legend><?= __('Edit Details') ?></legend>
        <?= $this->Form->input('username',array('readonly' => 'readonly')) ?>
        <?= $this->Form->input('password') ?>
	<?= $this->Form->input('email') ?>
	<?= $this->Form->input('role', [
            'options' => ['user' => 'User','admin' => 'Admin']
        ]) ?>
	<?= $this->Form->input('birth_dt', array(
            'label' => 'Date of birth',
            'dateFormat' => 'DMY',
            'minYear' => date('Y') - 100,
            'maxYear' => date('Y') - 18,
            )) ?>
	<?= $this->Form->input('address', array('label' => 'Address')) ?>
	<?= $this->Form->input('Question1', array('label' => 'Which is your favoure Colour?')) ?>
        <?= $this->Form->input('Question2', array('label' => 'Which is your favoure Food?')) ?>
	<?= $this->Form->input('Question3', array('label' => 'Who is your best Friend?')) ?>
   </fieldset>
<?= $this->Form->button(__('Save')); ?>
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





