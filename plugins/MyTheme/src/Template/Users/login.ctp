<!-- File: src/Template/Users/login.ctp -->

	<div id="menu">
            
		<ul>
			<li><?= $this->Html->link("Homepage", array('controller' => 'Users','action'=> 'login'))?></li>
			<li><?= $this->Html->link("About", array('controller' => 'Websites','action'=> 'about'))?></li>
                        <li><?= $this->Html->link("Contact", array('controller' => 'Pages','action'=> 'contact'))?></li>
			
		</ul>
	</div>
	<!-- end #menu -->
<div id="page">
<div id="content">
                    
<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->input('username') ?>
        <?= $this->Form->input('password') ?>
    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
<?= $this->Html->link("Register ", array('controller' => 'Users','action'=> 'register'))?>
<?= $this->Html->link(" / Reset Password", array('controller' => 'Users','action'=> 'resetPassword'))?>
</div>
<br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                
		</div>
		<!-- end #content -->
		<div id="sidebar-bg">
			<div id="sidebar">
				<ul>
					<li>
						<h2>About</h2>
						<p>This site will help you to link with Social Networks, like FaceBook, Twitter, LinkedIn and many more to help you
                                                understand about your Social network usage pattern as well as let you view all social network in one place.
                                                </p>
					</li>
					<li>
						<h2>Contact</h2>
						<ul>
                                                    <li><p>   You can contact us using the following information in the contact page.
                                                            
                                                        
                                                        </p></li>
				
						</ul>
					</li>
					
					
				</ul>
                            <br>
			</div>
		</div>
                
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->

