<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medicine $medicine
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Лікарства'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="medicine form content">
            <?= $this->Form->create($medicine) ?>
            <fieldset>
                <legend><?= __('Редагування') ?></legend>
                <?php
                    echo $this->Form->control('id_category', ['options' => $categories, 'label' => 'Категорія']);
                    echo $this->Form->control('name', ['label' => 'Назва']);
                    echo $this->Form->control('price', ['label' => 'Ціна']);
                    echo $this->Form->control('measurement_unit', ['label' => 'Одиниця виміру']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
