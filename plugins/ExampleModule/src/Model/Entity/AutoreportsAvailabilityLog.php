<?php
declare(strict_types=1);

namespace ExampleModule\Model\Entity;

use Cake\ORM\Entity;

/**
 * AutoreportsAvailabilityLog Entity
 *
 * @property int $id
 * @property int $autoreport_id
 * @property string $report_interval
 * @property int $last_update
 * @property int $evaluation_start
 * @property int $evaluation_end
 * @property int $availability_total_time
 * @property int $minimal_availability_time
 * @property int $determined_availability_time
 * @property int $determined_outage_time
 * @property float|null $minimal_availability_percent
 * @property float $determined_availability_percent
 * @property int|null $maximal_number_outages
 * @property int|null $determined_number_outages
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \ExampleModule\Model\Entity\Autoreport $autoreport
 */
class AutoreportsAvailabilityLog extends Entity
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
        'autoreport_id' => true,
        'report_interval' => true,
        'last_update' => true,
        'evaluation_start' => true,
        'evaluation_end' => true,
        'availability_total_time' => true,
        'minimal_availability_time' => true,
        'determined_availability_time' => true,
        'determined_outage_time' => true,
        'minimal_availability_percent' => true,
        'determined_availability_percent' => true,
        'maximal_number_outages' => true,
        'determined_number_outages' => true,
        'created' => true,
        'autoreport' => true,
    ];
}
