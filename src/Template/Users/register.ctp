<!-- src/Template/Users/register.ctp -->

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
		  <?= $this->Form->input('Question1', array('label' => 'Which is your favoure Colour?')) ?>
		  <?= $this->Form->input('Question2', array('label' => 'Which is your favoure Food?')) ?>
		   <?= $this->Form->input('Question3', array('label' => 'Who is your best Friend?')) ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>
