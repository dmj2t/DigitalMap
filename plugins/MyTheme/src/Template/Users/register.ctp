<!-- File: src/Template/Users/login.ctp -->

	<div id="menu">
            
		<ul>
			<li><?= $this->Html->link("Homepage", array('controller' => 'Users','action'=> 'login'))?></li>
			<li><?= $this->Html->link("About", array('controller' => 'Pages','action'=> 'about'))?></li>
                        <li><?= $this->Html->link("Contacts", array('controller' => 'Pages','action'=> 'contact'))?></li>
			
		</ul>
	</div>
	<!-- end #menu -->
<div id="page">
<div id="content">
    <?= $this->Flash->render() ?>
<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password',array('label' => 'password')) ?>
	<?= $this->Form->input('confirm_password',array('type'=>'password','label' => 'Confirm Password')) ?>
	<?= $this->Form->input('email') ?>
		 <?= $this->Form->input('birth_dt', array(
            'label' => 'Date of birth',
            'dateFormat' => 'DMY',
            'minYear' => date('Y') - 100,
            'maxYear' => date('Y') - 18,
            )) ?>
		  <?= $this->Form->input('address', array('label' => 'Address')) ?>
		  <?= $this->Form->input('question_1', array('label' => 'Which is your favoure Colour?')) ?>
		  <?= $this->Form->input('question_2', array('label' => 'Which is your favoure Food?')) ?>
		   <?= $this->Form->input('question_3', array('label' => 'Who is your best Friend?')) ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>
			

			
			
			
			
		</div>
		<!-- end #content -->
		<div id="sidebar-bg">
			<div id="sidebar">
				<ul>
					<li>
						<h2>About</h2>
						<p>This site will help you to link with Social Networks, like FaceBook, Twitter, LinkedIn and many more to help you
                                                understand about your social network usage pattern as well as let you view all social network in one place.
                                                </p>
					</li>
					<li>
						<h2>Contact</h2>
						<ul>
                                                    <li><p> You can contact us using the following information:
                                                            <br>
                                                            Telephone: 
                                                            <br>
                                                            Mobile:
                                                        
                                                        
                                                        </p></li>
				
						</ul>
					</li>
					
					
				</ul>
			</div>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->


