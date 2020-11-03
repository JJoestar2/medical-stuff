<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Редагувати'), ['action' => 'edit', $user->ID], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Користувачі'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Новий запис'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Відділ') ?></th>
                    <td><?= $user->has('department') ? $user->department->name : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Роль') ?></th>
                    <td><?= $user->has('role') ? $user->role->name : '' ?></td>
                </tr>
                <tr>
                    <th><?= __("Ім'я") ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Прізвище') ?></th>
                    <td><?= h($user->surname) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($user->ID) ?></td>
                </tr>
            </table>
            </div>
        </div>
    </div>
</div>
