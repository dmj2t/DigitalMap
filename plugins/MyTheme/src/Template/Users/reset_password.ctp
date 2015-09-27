

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
<div class="reset password form">
  <?= $this->Form->create($user, ['context' => ['validator' => 'verify']]) ?>  
    <fieldset>
        <legend><?= __('Please Enter The Details') ?></legend>
        <?= $this->Form->input('username',array('style'=>'float:left','label' => 'Please provide your username'))?>
        <?= $this->Form->input('Question1',array('style'=>'float:left','label' => 'Which is your favoure Colour?'))?>
        <?= $this->Form->input('Question2',array('style'=>'float:left','label' => 'Which is your favoure Food?'))?>
        <?= $this->Form->input('Question3',array('style'=>'float:left','label' => 'Who is your best Friend?'))?>
    </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end()?>
</div>