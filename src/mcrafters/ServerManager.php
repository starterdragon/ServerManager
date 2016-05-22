<?php
/*
 *       _____                          __  __
 *     / ____|                        |  \/  |
 *    | (___   ___ _ ____   _____ _ __| \  / | __ _ _ __   __ _  __ _  ___ _ __
 *     \___ \ / _ \ '__\ \ / / _ \ '__| |\/| |/ _` | '_ \ / _` |/ _` |/ _ \ '__|
 *     ____) |  __/ |   \ V /  __/ |  | |  | | (_| | | | | (_| | (_| |  __/ |
 *    |_____/ \___|_|    \_/ \___|_|  |_|  |_|\__,_|_| |_|\__,_|\__, |\___|_|
 *                                                          /  |
 *                                                        |____|
 */

namespace mcrafters;

use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as SM;
use pocketmine\command\PluginCommand;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\Server;
use pocketmine\IPlayer;
use pocketmine\Player;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerGameModeChangeEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\player\PlayerBucketEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\event\player\PlayerKickEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerToggleSneakEvent;
use pocketmine\event\player\PlayerAchievementAwardedEvent;
use pocketmine\event\entity\ExplosionPrimeEvent;
use pocketmine\event\entity\ItemDespawnEvent;
use pocketmine\event\inventory\InventoryOpenEvent;
use pocketmine\event\inventory\FurnaceBurnEvent;
use pocketmine\event\inventory\FurnaceSmeltEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\event\inventory\CraftItemEvent;

class ServerManager extends PluginBase implements Listener
{
    public $cfg;

    public $cfgm;

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getLogger()->info(SM::GRAY . "[" . SM::BOLD . SM::AQUA . "Server" . SM::GRAY . "-" . SM::YELLOW . "Manager" . SM::GRAY . "] " . SM::GREEN . " has enabled");
        $this->getServer()->getLogger()->info(SM::GRAY . "[" . SM::BOLD . SM::AQUA . "Server" . SM::GRAY . "-" . SM::YELLOW . "Manager" . SM::GRAY . "] " . SM::DARK_PURPLE . " The Plugin Is Still In Development So for now it is not working check back later");
        @mkdir($this->getDataFolder());
        $this->saveResource("config.yml");
        $this->saveResource("messages.yml");
        $this->cfg = new Config ($this->getDataFolder() . "config.yml", Config::YAML);
        $this->cfgm = new Config ($this->getDataFolder() . "messages.yml", Config::YAML);
    }

    public function onPlace(BlockPlaceEvent $bpe)
    {
        if($this->cfg->get("BlockPlacing") == false or $this->cfg->get("BlockPlacing") == disabled){
        if(!$bbe->getPlayer()->hasPermission('servermanager.bypass')){
            $bbe->getPlayer()->sendMessage(SM::GRAY . "[" . SM::AQUA . "Server-" . SM::YELLOW . "Manager" . SM::GRAY . "] " . $this->cfgm->get("BlockPlacing"));
        $bbe->setCancelled();
    }
	}
}
    public function onBreak(BlockBreakEvent $bbe)
    {
        if($this->cfg->get("BlockBreaking") == false or $this->cfg->get("BlockBreaking") == disabled){
            if(!$bbe->getPlayer()->hasPermission('servermanager.bypass')){
                $bbe->getPlayer()->sendMessage(SM::GRAY . "[" . SM::AQUA . "Server-" . SM::YELLOW . "Manager" . SM::GRAY . "] " . $this->cfgm->get("BlockBreaking"));
                $bbe->setCancelled();
            }
        }
    }
    public function onChat(PlayerChatEvent $pce)
    {
        if($this->cfg->get("Chating") == false or $this->cfg->get("Chating") == disabled){
            if(!$bbe->getPlayer()->hasPermission('servermanager.bypass')){
                $bbe->getPlayer()->sendMessage(SM::GRAY . "[" . SM::AQUA . "Server-" . SM::YELLOW . "Manager" . SM::GRAY . "] " . $this->cfgm->get("Chating"));
                $bbe->setCancelled();
            }
        }
    }
    public function onDropItem(PlayerDropItemEvent $pdie)
    {
        if($this->cfg->get("BlockBreaking") == false or $this->cfg->get("BlockBreaking") == disabled){
            if(!$bbe->getPlayer()->hasPermission('servermanager.bypass')){
               $bbe->getPlayer()->sendMessage(SM::GRAY . "[" . SM::AQUA . "Server-" . SM::YELLOW . "Manager" . SM::GRAY . "] " . $this->cfgm->get("ItemDrop"));
                $bbe->setCancelled();
            }
        }
    }
    public function onDeath(PlayerDeathEvent $pde)
    {
        if($this->cfg->get("Death") == false or $this->cfg->get("Death") == disabled){
            if(!$bbe->getPlayer()->hasPermission('servermanager.bypass')){
                $bbe->getPlayer()->sendMessage(SM::GRAY . "[" . SM::AQUA . "Server-" . SM::YELLOW . "Manager" . SM::GRAY . "] " . $this->cfgm->get("Death"));
                $bbe->setCancelled();
            }
        }
    }
    public function onDisable()
	{
		$this->getLogger()->info(SM::GRAY . "[" . SM::BOLD . SM::GREEN . "Server - " . SM::YELLOW . "Manager" . SM::GRAY . "] " . SM::RED . " has disabled");
	}
}
