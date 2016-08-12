<?php
declare(strict_types=1);

namespace LotGD\Modules\SimpleInventory;

use LotGD\Core\Game;
use LotGD\Core\Module as ModuleInterface;

class Module implements ModuleInterface {
    const WEAPON= 'lotgd/module-simple-inventory/weapon';
    const ARMOR = 'lotgd/module-simple-inventory/armor';

    public static function handleEvent(Game $g, string $event, array $context) { }
    public static function onRegister(Game $g) { }
    public static function onUnregister(Game $g) { }
}
