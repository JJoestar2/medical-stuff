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
            <?= $this->Html->link(__('Видача'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="issuance form content">
            <?= $this->Form->create($issuance) ?>
            <fieldset>
                <legend><?= __('Додати запис') ?></legend>
                <?php

                    echo $this->Form->control('medicine_id');
                    echo $this->Form->control('date_issuance', ['default' => date("Y-m-d H:i:s"), 'label' => 'Дата видачі']);
                    echo $this->Form->control('count', ['label' => 'К-ть']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
