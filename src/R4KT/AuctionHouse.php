<?php

/**
* © R4KT, Skull3x and Muqsit.
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU Lesser General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version. Additional permission of
* the authors may be required.
*
*/

namespace R4KT;

use pocketmine\utils\TextFormat as TF;
use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender};

class AuctionHouse extends PluginBase {

    public function onLoad() {
       @mkdir($this->getDataFolder());
        $fileExistancy = array('config.yml');
        foreach ($fileExistancy as $file) {
            if (!file_exists($this->getDataFolder() . $file)) {
                file_put_contents($this->getDataFolder() . $file, $this->getResource($file));
            }
        }
    }

    public static function sendHelp($player) {
        $border = str_repeat(TF::GOLD.'='.TF::GRAY.'-', 7).TF::GOLD.'=';
        $helps = [
        "/ah list" => "List current auctions.",
        ];
        $player->sendMessage($border);
        foreach ($helps as $cmd => $desc) {
            $player->sendMessage(TF::AQUA.$cmd.' '.TF::WHITE.$desc);
        }
        $player->sendMessage($border);
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
        if (strtolower($cmd->getName()) == 'ah') {
            switch (count($args)) {
                default:
                case 0:
                    self::sendHelp($sender);
                    break;
                case 1:
                    switch (strtolower($args[0])) {
                        case 'help':
                            self::sendHelp($sender);
                            break;
                    }
                    break;
            }
        }
    }
}
