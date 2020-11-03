<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('Новий запис'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Користувачі') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('department_id', ['label' => 'Відділ']) ?></th>
                    <th><?= $this->Paginator->sort('role_id', ['label' => 'Роль']) ?></th>
                    <th><?= $this->Paginator->sort('username', ['label' => "Ім'я"]) ?></th>
                    <th><?= $this->Paginator->sort('surname', ['label' => 'Прізвище']) ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->has('department') ? $user->department->name : '' ?></td>
                    <td><?= $user->has('role') ? $user->role->name : '' ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->surname) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->ID]) ?>
                        <?= $this->Html->link(__('Редагування'), ['action' => 'edit', $user->ID]) ?>
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
