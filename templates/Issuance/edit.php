<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Issuance $issuance
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $issuance->ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $issuance->ID), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Issuance'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="issuance form content">
            <?= $this->Form->create($issuance) ?>
            <fieldset>
                <legend><?= __('Edit Issuance') ?></legend>
                <?php
                    echo $this->Form->control('department_id', ['options' => $departments]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('medicine_id');
                    echo $this->Form->control('date_issuance');
                    echo $this->Form->control('count');
                    echo $this->Form->control('store_previous');
                    echo $this->Form->control('store_present');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
