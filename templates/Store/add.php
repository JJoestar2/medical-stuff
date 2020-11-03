<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store $store
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Склад'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="store form content">
            <?= $this->Form->create($store) ?>
            <fieldset>
                <legend><?= __('Новий запис') ?></legend>
                <?php
                    echo $this->Form->control('medicine_id', ['options' => $medicines]);
                    echo $this->Form->control('count', ['label' => 'К-ть']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
