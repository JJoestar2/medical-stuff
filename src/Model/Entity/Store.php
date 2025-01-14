<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Store Entity
 *
 * @property int $ID
 * @property int $medicine_id
 * @property int $count
 *
 * @property \App\Model\Entity\Medicine $medicine
 */
class Store extends Entity
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
        'medicine_id' => true,
        'count' => true,
        'medicine' => true,
    ];
}
