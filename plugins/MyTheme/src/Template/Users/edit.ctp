

<div id="menu">
<ul class="menu Items" id="">
    
			<li class="current_page_item"><?= $this->Html->link("Profile", array('controller' => 'Users','action'=> 'profile'))?></li>
			<li><?=$this->Html->link("Setting", ['action' => 'edit',$loggedUserId]);?></li>
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
    
<div id="content">
<?= $this->Flash->render() ?>
<div class="Edit User">
<?= $this->Form->create($user,['context' => ['validator' => 'userUpdate']]) ?>
    <fieldset>
        <legend><?= __('Edit Details') ?></legend>
        <?= $this->Form->input('username',array('readonly' => 'readonly')) ?>
        <?= $this->Form->input('password') ?>
	<?= $this->Form->input('email') ?>
	<?= $this->Form->input('birth_dt', array(
            'label' => 'Date of birth',
            'dateFormat' => 'DMY',
            'minYear' => date('Y') - 100,
            'maxYear' => date('Y') - 18,
            )) ?>
	<?= $this->Form->input('address', array('label' => 'Address')) ?>
	<?= $this->Form->input('question_1', array('label' => 'Which is your favourite Color?')) ?>
        <?= $this->Form->input('question_2', array('label' => 'Which is your favourite Food?')) ?>
	<?= $this->Form->input('question_3', array('label' => 'Who is your Best Friend?')) ?>
   </fieldset>
<?= $this->Form->button(__('Save')); ?>
<?= $this->Form->end() ?>
</div>
</div>
    
    
</div>








