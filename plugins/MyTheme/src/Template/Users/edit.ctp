<div class="Edit User">
<?= $this->Form->create($user,['context' => ['validator' => 'adminUpdate']]) ?>
    <fieldset>
        <legend><?= __('Edit Details') ?></legend>
        <?= $this->Form->input('username') ?>
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