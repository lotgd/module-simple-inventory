<?php
declare(strict_types=1);

namespace LotGD\Modules\SimpleInventory;

use LotGD\Core\Game;
use LotGD\Core\Module as ModuleInterface;

class Module implements ModuleInterface {
    private $g;

    const WeaponProperty = 'lotgd/module-simple-inventory/weapon';
    const ArmorProperty  = 'lotgd/module-simple-inventory/armor';

    public static function handleEvent(Game $g, string $event, array $context) { }
    public static function onRegister(Game $g) { }
    public static function onUnregister(Game $g) { }

    public function __construct(Game $g)
    {
        $this->g = $g;
    }

    public function getWeaponById($id)
    {
        return $this->g->getEntityManager()->getRepository(Weapon::class)->find($id);
    }

    public function getArmorById($id)
    {
        return $this->g->getEntityManager()->getRepository(Armor::class)->find($id);
    }

    public function getWeaponForUser(User $user)
    {
        $id = $user->getProperty(self::WeaponProperty, null);
        $w = $id ? $this->g->getEntityManager()->getRepository(Weapon::class)->find($id) : null;
        return $w;
    }

    public function getArmorForUser(User $user)
    {
        $id = $user->getProperty(self::ArmorProperty, null);
        $a = $id ? $this->g->getEntityManager()->getRepository(Armor::class)->find($id) : null;
        return $a;
    }

    public function getWeaponsForLevel(int $level): array
    {
        return $this->g->getEntityManager()->getRepository(Weapon::class)->findby([ 'level' => $level ]);
    }

    public function getArmorsForLevel(int $level): array
    {
        return $this->g->getEntityManager()->getRepository(Armor::class)->findby([ 'level' => $level ]);
    }
}
