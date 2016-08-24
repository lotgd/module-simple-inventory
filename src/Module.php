<?php
declare(strict_types=1);

namespace LotGD\Modules\SimpleInventory;

use LotGD\Core\Game;
use LotGD\Core\Models\Character;
use LotGD\Core\Models\Module as ModuleModel;
use LotGD\Core\Module as ModuleInterface;

use LotGD\Modules\SimpleInventory\Models\Weapon;
use LotGD\Modules\SimpleInventory\Models\Armor;

class Module implements ModuleInterface {
    private $g;

    const WeaponProperty = 'lotgd/module-simple-inventory/weapon';
    const ArmorProperty  = 'lotgd/module-simple-inventory/armor';

    public static function handleEvent(Game $g, string $event, array &$context) { }
    public static function onRegister(Game $g, ModuleModel $module) { }
    public static function onUnregister(Game $g, ModuleModel $module) { }

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

    public function getWeaponForUser(Character $user)
    {
        $id = $user->getProperty(self::WeaponProperty, null);
        $w = $id ? $this->getWeaponById($id) : null;
        return $w;
    }

    public function setWeaponForUser(Character $user, Weapon $weapon)
    {
        $user->setProperty(self::WeaponProperty, $weapon->getId());
    }

    public function getArmorForUser(Character $user)
    {
        $id = $user->getProperty(self::ArmorProperty, null);
        $a = $id ? $this->getArmorById($id) : null;
        return $a;
    }

    public function setArmorForUser(Character $user, Armor $armor)
    {
        $user->setProperty(self::ArmorProperty, $armor->getId());
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
