<?php
/**
 * Created by PhpStorm.
 * User: Samuel
 * Date: 30/06/14
 * Time: 14:26
 */

namespace controller;


use application\basecontroller;
use restapi\restapi;
use wallet\wallet;

class serverInterfaceController extends basecontroller{


    public function index()
    {


        $restAPI = new restapi();
        $wallet = new wallet();
        $param = $restAPI->parseIncomingParams();

        if(isset($param['command']))
        {
            $command = $param['command'];

           if($command === "getsession" && isset($param['secretkey']))
           {
                $player = $wallet->createPlayer($param['secretkey'],$param['playerpass'], $param['playerlogin'], $param['operator']);
                //$player = $wallet->createPlayer("8d7355701b6f3760ee49852904319c1","gamer1pass", "gamer1", "");
                $result = $wallet->getSession($player);
                echo $result;
               return;
            }
       }



        if(isset($param['command']))
        {
            $command = $param['command'];
            if($command === "uid")
            {
                $player = $wallet->createPlayer($param['secretkey'],"","","");
                $player->setSession($param['sessionid']);
                $result = $wallet->getUID($player);
                echo $result;
                return;
            }
        }




        if(isset($param['command']))
        {
            $command = $param['command'];
            if($command === "balance")
            {
                $player = $wallet->createPlayer($param['secretkey'],"","","");
                $player->setSession($param['sessionid']);
                $player->setPlayerID($param['playerid']);
                $result = $wallet->getBalance($player);
                echo $result;
                return;
            }
        }

        if(isset($param['command']))
        {
            $command = $param['command'];
            if($command === "Bet")
            {
                $player = $wallet->createPlayer($param['secretkey'],"","","");
                $player->setSession($param['sessionid']);
                $player->setPlayerID($param['playerid']);

                $game = $wallet->createGame();
                $game->setCredit($param['credit']);
                $game->setGameId($param['gameid']);
                $game->setRoundId($param['roundid']);
                $game->setTransactionId($param['transactionid']);
                $game->setJackpotContr($param['jpc']);
                $game->setPlayerId($player->getPlayerID());

                $result = $wallet->Bet($game, $player);

                echo $result;
                return;
            }
        }

        if(isset($param['command']))
        {
            $command = $param['command'];
            if($command === "cancel")
            {
                $player = $wallet->createPlayer($param['secretkey'],"","","");
                $player->setSession($param['sessionid']);
                $player->setPlayerID($param['playerid']);

                $game = $wallet->createGame();
                $game->setCredit($param['credit']);
                $game->setRoundId($param['roundid']);
                $game->setTransactionId($param['transactionid']);
                $game->setJackpotContr($param['jpc']);
                $game->setJackpotWin($param['jpw']);
                $game->setPlayerId($player->getPlayerID());

                $result = $wallet->cancel($game, $player);

                echo $result;
                return;
            }
        }

        if(isset($param['command']))
        {
            $command = $param['command'];
            if($command === "end")
            {
                $player = $wallet->createPlayer($param['secretkey'],"","","");
                $player->setSession($param['sessionid']);
                $player->setPlayerID($param['playerid']);

                $result = $wallet->end($player);

                echo $result;
                return;
            }
        }


        if(isset($param['command']))
        {
                $wallet->unKnowCall();
                return;
        }
        else
        {
            $wallet->unKnowCall();
            return;
        }


    }

    public function controllerComponents(){
        return array("wallet", "restapi");
    }

} 