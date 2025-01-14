<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Issuance Entity
 *
 * @property int $ID
 * @property int $department_id
 * @property int $user_id
 * @property int $medicine_id
 * @property \Cake\I18n\FrozenTime $date_issuance
 * @property int $count
 * @property int $store_previous
 * @property int $store_present
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Medicine $medicine
 */
class Issuance extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'department_id' => true,
        'user_id' => true,
        'medicine_id' => true,
        'date_issuance' => true,
        'count' => true,
        'store_previous' => true,
        'store_present' => true,
        'department' => true,
        'user' => true,
        'medicine' => true,
    ];
}
