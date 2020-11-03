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
            <?= $this->Html->link(__('Новий запис'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="issuance view content">
            <h3><?= h($issuance->ID) ?></h3>
            <table>
                <tr>
                    <th><?= __('Відділ') ?></th>
                    <td><?= $issuance->has('department') ? $issuance->department->name : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $issuance->has('user') ? $issuance->user->username : '' ?>
                </tr>
                <tr>
                    <th><?= __('Назва лікартсва') ?></th>
                    <td><?= $issuance->has('medicine') ? $issuance->medicine->name : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('К-ть') ?></th>
                    <td><?= $this->Number->format($issuance->count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Було') ?></th>
                    <td><?= $this->Number->format($issuance->store_previous) ?></td>
                </tr>
                <tr>
                    <th><?= __('Стало') ?></th>
                    <td><?= $this->Number->format($issuance->store_present) ?></td>
                </tr>
                <tr>
                    <th><?= __('Дата видачі') ?></th>
                    <td><?= h($issuance->date_issuance) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
