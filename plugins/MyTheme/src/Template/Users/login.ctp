<!-- File: src/Template/Users/login.ctp -->

	<div id="menu">
            
		<ul>
			<li class="current_page_item"><a href="#">Homepage</a></li>
			<li><a href="#"></a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="page">
		<div id="content">
                    
                 <div class="users form">
<?= $this->Flash->render('auth') ?>
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
			

			
			
			
			
		</div>
		<!-- end #content -->
		<div id="sidebar-bg">
			<div id="sidebar">
				<ul>
					<li>
						<h2>About</h2>
						<p>The web-site is a tool to create content related to oneself using various social media sites and search engines</p>
					</li>
					<li>
						<h2>Contact</h2>
						<ul>
                                                    <li><p> You can contact us using the following information </p></li>
				
						</ul>
					</li>
					
					
				</ul>
			</div>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->

