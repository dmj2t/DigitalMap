<!-- File: src/Template/Users/login.ctp -->

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
