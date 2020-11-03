<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Issuance[]|\Cake\Collection\CollectionInterface $issuance
 */
?>
<div class="issuance index content">
    <h3><?= __('Вся видача') ?></h3>
    <div class="table-responsive">
        <?= $this->Form->create(null, ['url' =>['action' => 'deleteAll']]) ?>
        <button>Видалити обране</button>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th><?= $this->Paginator->sort('department_id', ['label' => 'Відділ']) ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('medicine_id') ?></th>
                    <th><?= $this->Paginator->sort('date_issuance', ['label' => 'Дата видачі']) ?></th>
                    <th><?= $this->Paginator->sort('count', ['label' => 'Видана к-ть']) ?></th>
                    <th>Ціна за 1 шт.</th>
                    <th>Total:</th>
                    <th><?= $this->Paginator->sort('store_present', ['label' => 'Було']) ?></th>
                    <th><?= $this->Paginator->sort('store_previous', ['label' => 'Стало']) ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($issuance as $issuance): ?>
                <tr>
                    <td><?= $this->Form->checkbox('ids[]', ['value' => $issuance->ID])  ?></td>
                    <td><?= $issuance->has('department') ? $issuance->department->name : '' ?></td>
                    <td><?= $issuance->has('user') ? $issuance->user->username : '' ?></td>
                    <td><?= $issuance->has('medicine') ? $issuance->medicine->name : '' ?></td>
                    <td><?= h($issuance->date_issuance) ?></td>
                    <td>К-ть:<?= $this->Number->format($issuance->count) ?></td>
                    <td><?= $this->Number->format($issuance->medicine->price) ?> грн за одиницю</td>
                    <td><?= $this->Number->format($issuance->count * $issuance->medicine->price) ?> грн загалом</td>
                    <td><?= $this->Number->format($issuance->store_previous) ?></td>
                    <td><?= $this->Number->format($issuance->store_present) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->Form->end() ?>
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