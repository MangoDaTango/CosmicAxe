<?php

namespace CosmicAxe;

use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\level\Level;
use pocketmine\item\Item;
use pocketmine\level\particle\HugeExplodeParticle;

class Axe extends PluginBase implements Listener{
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	public function onHurt(EntityDamageEvent $event){
		if($event instanceof EntityDamageByEntityEvent){
			$damager = $event->getDamager();
			$level = $damager->getLevel();
			if($damager instanceof Player){
				if($damager->getInventory()->getItemInHand()->getId() === 279){
				  switch(mt_rand(1, 3) == 1){
              case 1:
                $level->addParticle(new HugeExplodeParticle($damager->getLocation()));
                break;
				  }
				}
			}
		}
	}
}
