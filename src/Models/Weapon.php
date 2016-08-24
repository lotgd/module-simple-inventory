<?php
declare(strict_types=1);

namespace LotGD\Modules\SimpleInventory\Models;

use LotGD\Core\Game;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

/**
 * Representation of a weapon.
 * @Entity
 * @Table(name="lotgd_simple_inventory_weapons")
 */
class Weapon extends Item
{
    /** @Column(type="integer") */
    private $attack;

    /** @var array */
    private static $fillable = [
        "name",
        "level",
        "sortKey",
        "cost",
        "attack",
    ];

    /**
     * Returns the attack value for this weapon.
     * @return int
     */
    public function getAttack(): int
    {
        return $this->attack;
    }

    /**
     * Sets the attack value for this weapon.
     */
    public function setAttack(int $attack)
    {
        $this->attack = $attack;
    }
}
