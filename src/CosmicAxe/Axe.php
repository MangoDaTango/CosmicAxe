<?php

namespace CosmicAxe;

use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use pocketmine\item\Item;
use pocketmine\level\particle\LargeExplodeParticle;
use pocketmine\level\sound\ExplodeSound;

class Axe extends PluginBase implements Listener{
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	public function onHurt(EntityDamageEvent $event){
		if($event instanceof EntityDamageByEntityEvent){
			$damager = $event->getDamager();
			$level = $damager->getLevel();
			$x = $damager->getX();
			$y = $damager->getY();
			$z = $damager->getZ();
			if($damager instanceof Player){
				if($damager->getInventory()->getItemInHand()->getId() === 258){
				  switch(mt_rand(1, 10) == 1){
              case 1:
                $level->addParticle(new LargeExplodeParticle(new Vector3($x, $y + 1, $z)));
                $level->addSound(new ExplodeSound(new Vector3($x, $y + 1, $z)));
                $event->setKnockBack(1);
                break;
				  }
				}
			}
		}
	}
}
