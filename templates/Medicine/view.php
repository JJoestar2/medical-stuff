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
            <?= $this->Html->link(__('Редагувати'), ['action' => 'edit', $medicine->ID], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Лікарства'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Новий запис'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="medicine view content">
            <h3><?= h($medicine->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Назва') ?></th>
                    <td><?= h($medicine->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Одиниця виміру') ?></th>
                    <td><?= h($medicine->measurement_unit) ?></td>
                </tr>
                <tr>
                    <th><?= __('ID') ?></th>
                    <td><?= $this->Number->format($medicine->ID) ?></td>
                </tr>
                <tr>
                    <th><?= __('Категорія') ?></th>
                    <td><?= $medicine->has('category') ? $medicine->category->name : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Ціна') ?></th>
                    <td><?= $this->Number->format($medicine->price) ?> грн</td>
                </tr>
            </table>
        </div>
    </div>
</div>
