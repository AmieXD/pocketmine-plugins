<?php

namespace lubu;

use pocketmine\Player; 
use pocketmine\Server; 
use pocketmine\level;
use pocketmine\level\Position;
use pocketmine\event\Listener; 
use pocketmine\event\player\PlayerDropItemEvent; 
use pocketmine\entity\DroppedItem; 
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\math\Vector3;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
	 public function onEnable(){
		 $this->getServer()->getPluginManager()->registerEvents($this, $this); 
		 $this->saveDefaultConfig();
      $this->reloadConfig();
      $this->dropitemworld = $this->getConfig()->get("dropitemworld"); 
		}
		 public function onDisable(){
			} 
			 public function onDrop(PlayerDropItemEvent $event){
				 $player = $event->getPlayer(); 
				 if(!$player->isOp()){ 
					 if(in_array($player->getLevel()->getName(), $this->dropitemworld)){ 
						 $event->setCancelled();
						 $player->sendMessage("§c[Error]§f คุณไม่สามารถทิ้งไอเท็มบนโลกนี้ได้");
						 }
				  }
			}
}							
