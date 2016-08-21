<?php
declare(strict_types=1);

namespace LotGD\Modules\SimpleInventory\Models;

use LotGD\Core\Game;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

/**
 * Representation of a piece of armor.
 * @Entity
 * @Table(name="lotgd_simple_inventory_armors")
 */
class Armor extends Item
{
    /** @Column(type="integer") */
    private $defense;

    /** @var array */
    private static $fillable = [
        "name",
        "level",
        "sortKey",
        "cost",
        "defense",
    ];

    /**
     * Returns the defense value for this armor.
     * @return int
     */
    public function getDefense(): int
    {
        return $this->defense;
    }

    /**
     * Sets the defense value for this weapon.
     */
    public function setDefense:(int $defense)
    {
        $this->defense = $defense;
    }
}

