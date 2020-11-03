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
            <?= $this->Html->link(__('Користувачі'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Новий запис') ?></legend>
                <?php
                    echo $this->Form->control('department_id', ['options' => $departments, 'label' => 'Відділ']);
                    echo $this->Form->control('role_id', ['options' => $roles, 'label' => 'Роль']);
                    echo $this->Form->control('username', ['label' => "Ім'я"]);
                    echo $this->Form->control('surname', ['label' => 'Прізвище']);
                    echo $this->Form->control('password', ['label' => 'Пароль']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
