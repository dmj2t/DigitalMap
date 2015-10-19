<div class="reset password form">
  <?= $this->Form->create() ?>  
    <fieldset>
        <legend><?= __('Please Enter The Details') ?></legend>
        <?= $this->Form->input('username',array('style'=>'float:left','label' => 'Please provide your username'))?>
        <?= $this->Form->input('Question1',array('style'=>'float:left','label' => 'Which is your favourite Color?'))?>
        <?= $this->Form->input('Question2',array('style'=>'float:left','label' => 'Which is your favourite Food?'))?>
        <?= $this->Form->input('Question3',array('style'=>'float:left','label' => 'Who is your Best Friend?'))?>
    </fieldset>
<?= $this->Form->button(__('Reset')); ?>
<?= $this->Form->end()?>
</div>