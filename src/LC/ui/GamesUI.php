<?php

namespace LC\ui;

use pocketmine\command\Command;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\utils\SingletonTrait;
use pocketmine\utils\TextFormat as MG;

use Forms\FormAPI\SimpleForm;

use LC\LobbyCore;

class GamesUI {

    public $plugin;

    use SingletonTrait;

    public function __construct(){
        $this->plugin = LobbyCore::getInstance();
        self::setInstance($this);
    }

    public function getGamesUI(Player $player){
        $form = new SimpleForm(function(Player $player, int $data = null){
            if($data === null){
                return true;
            }
            switch($data){
                case 0:
                    $this->plugin->getServer()->getCommandMap()->dispatch($player, "sendto economy");
                    break;
                case 1:
                    $player->sendMessage("§l§cERROR»§r §fServer Offline !!");
                    break;
                case 2:
                    $player->sendMessage("§l§cERROR»§r §fServer Offline !!");
                    break;
                case 3:
                    $this->plugin->getServer()->getCommandMap()->dispatch($player, "Succes");
                    break;
            }
        });
        $form->setTitle("Nichiwa - Teleporter");
        $form->setContent("Click button below to teleport");
        $form->addButton("Survival Economy\n§eStats §0: §aONLINE");
        $form->addButton("Duels/PvP\n§eStats §0: §cOFFLINE");
        $form->addButton("Parkour\n§eStats §0: §cOFFLINE");
        $form->addButton("§cClose", 0, "textures/blocks/barrier");
        $form->sendToPlayer($player);
    }
}
