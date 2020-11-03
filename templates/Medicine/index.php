<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Medicine[]|\Cake\Collection\CollectionInterface $medicine
 */
?>
<div class="medicine index content">
    <?= $this->Html->link(__('Новий запис'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Лікарства') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('ID') ?></th>
                    <th><?= $this->Paginator->sort('id_category', ['label' => 'Категорія']) ?></th>
                    <th><?= $this->Paginator->sort('name', ['label' => 'Назва']) ?></th>
                    <th><?= $this->Paginator->sort('price', ['label' => 'Ціна']) ?></th>
                    <th><?= $this->Paginator->sort('measurement_unit', ['label' => 'Одиниця виміру']) ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($medicine as $medicine): ?>
                <tr>
                    <td><?= $this->Number->format($medicine->ID) ?></td>
                    <td><?= $medicine->has('category') ? $medicine->category->name : '' ?></td>
                    <td><?= h($medicine->name) ?></td>
                    <td><?= $this->Number->format($medicine->price) ?> грн. </td>
                    <td><?= h($medicine->measurement_unit) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $medicine->ID]) ?>
                        <?= $this->Html->link(__('Редагувати запис'), ['action' => 'edit', $medicine->ID]) ?>
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
