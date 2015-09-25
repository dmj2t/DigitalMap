/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
<div class="forgetpwd confirmation">
  <?= $this->Form->create($user, ['context' => ['validator' => 'reset']]) ?>  
    <fieldset>
        <legend><?= __('Enter Your New Password') ?></legend>
        <?= $this->Form->input('password',array('label' => 'New Password'))?>
        <?= $this->Form->input('confirm_password',array('type' =>'password','label' => 'Retype New Password'))?>
    </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end()?>
</div>