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
            <?= $this->Html->link(__('Редагувати запис'), ['action' => 'edit', $store->ID], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Склад'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Новий запис'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="store view content">
            <h3><?= h($store->medicine->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($store->ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Назва лікартсва') ?></th>
                    <td><?= $store->has('medicine') ? $store->medicine->name : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('К-ть') ?></th>
                    <td><?= $this->Number->format($store->count) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
