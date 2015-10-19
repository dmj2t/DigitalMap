


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
<div class="reset password form">
  <?= $this->Form->create($user, ['context' => ['validator' => 'verify']]) ?>  
    <fieldset>
        <legend><?= __('Please Enter The Details') ?></legend>
        <?= $this->Form->input('username',array('style'=>'float:left','label' => 'Please provide your username'))?>
        <?= $this->Form->input('Question1',array('style'=>'float:left','label' => 'Which is your favourite Color?'))?>
        <?= $this->Form->input('Question2',array('style'=>'float:left','label' => 'Which is your favourite Food?'))?>
        <?= $this->Form->input('Question3',array('style'=>'float:left','label' => 'Who is your Best Friend?'))?>
    </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end()?>
    <br>
</div>
			

			
			
			
			
		</div>
		<!-- end #content -->
		<div id="sidebar-bg">
			<div id="sidebar">
				<ul>
					<li>
						<h2>About</h2>
						<p>This site will help you to link with Socail Networks, like FaceBook, Twitter, LinkedIn and many more to help you
                                                understand about your socail network usage pattern as well as let you view all social network in one place.
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

