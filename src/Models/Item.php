<?php
declare(strict_types=1);

namespace LotGD\Modules\SimpleInventory\Models;

use LotGD\Core\Game;
use LotGD\Core\Tools\Model\Creator;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;

/**
 * Representation of a buyable item.
 * @MappedSuperclass
 */
class Item
{
    use Creator;

    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string") */
    private $name;

    /** @Column(type="integer") */
    private $level;

    /** @Column(type="integer") */
    private $sortKey;

    /** @Column(type="integer") */
    private $cost;

    /**
     * Returns the database identifier for this item.
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Returns the name of this item.
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the name of this item.
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the level of this item.
     * @return string
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * Sets the level of this item.
     */
    public function setLevel(int $level)
    {
        $this->level = $level;
    }

    /**
     * Returns the sort key for this item. This controls where, in a list of 
     * items, this item will appear.
     * @return int
     */
    public function getSortKey(): int
    {
        return $this->sortKey;
    }
    
    /**
     * Sets the sort key of this item.
     */
    public function setSortKey(int $sortKey)
    {
        $this->sortKey = $sortKey;
    }

    /**
     * Returns the cost for this item.
     * @return int
     */
    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * Sets the cost of this item.
     */
    public function setCost(int $cost)
    {
        $this->cost = $cost;
    }
}

