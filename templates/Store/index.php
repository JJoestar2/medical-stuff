<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Store[]|\Cake\Collection\CollectionInterface $store
 */
?>
<div class="store index content">
    <?= $this->Html->link(__('Новий запис'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Склад') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('medicine_id') ?></th>
                    <th><?= $this->Paginator->sort('count', ['label' => 'К-ть на складі']) ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($store as $store): ?>
                <tr>
                    <td><?= $this->Number->format($store->ID) ?></td>
                    <td><?= $store->has('medicine') ? $store->medicine->name : '' ?></td>
                    <td><?= $this->Number->format($store->count) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $store->ID]) ?>
                        <?= $this->Html->link(__('Редагувати'), ['action' => 'edit', $store->ID]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
