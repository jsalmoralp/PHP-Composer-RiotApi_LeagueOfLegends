<?php
use jsalmoralp\RiotAPI\RiotAPI\Calls\Summoner_V4;

include_once __DIR__ . "/main.php";

$summoner1 = new Summoner_V4();

$info_summoner1 = $summoner1->get_byAccountId("99L5GQVrUbuVe2WdOf5ROldHRqD3u-7tmH37XA__MXGNAA");

echo "\n**=** [Start] INFO QUERYS **=**\n";
echo $info_summoner1;
echo "\n**=** [Final] INFO QUERYS **=**\n";

echo "\n";

if ($summoner1->get_summonerDTO()) {
    echo "\n**=** [Start] INFO SUMMONER **=**\n";
    echo "\nSummoner (Region)          = " . $summoner1->get_summonerDTO()->get_region() . "\n";
    echo "Summoner (Id)              = " . $summoner1->get_summonerDTO()->get_id() . "\n";
    echo "Summoner (Account Id)      = " . $summoner1->get_summonerDTO()->get_accountId() . "\n";
    echo "Summoner (PUUID)           = " . $summoner1->get_summonerDTO()->get_puuid() . "\n";
    echo "Summoner (Name)            = " . $summoner1->get_summonerDTO()->get_name() . "\n";
    echo "Summoner (Profile Icon Id) = " . $summoner1->get_summonerDTO()->get_profileIconId() . "\n";
    echo "Summoner (Revision Date)   = " . $summoner1->get_summonerDTO()->get_revisionDate() . "\n";
    echo "Summoner (Summoner Level)  = " . $summoner1->get_summonerDTO()->get_summonerLevel() . "\n";
    echo "\n**=** [Final] INFO SUMMONER **=**\n";
} else {
    echo "\n**=** NO EXISTE INFO DEL SUMMONER **=**\n";
}

echo "\n\n\n";

$summoner2 = new Summoner_V4();

$info_summoner2 = $summoner2->get_byName("raskan");

echo "\n**=** [Start] INFO QUERYS **=**\n";
echo $info_summoner2;
echo "\n**=** [Final] INFO QUERYS **=**\n";

echo "\n";

if ($summoner2->get_summonerDTO()) {
    echo "\n**=** [Start] INFO SUMMONER **=**\n";
    echo "\nSummoner (Region)          = " . $summoner2->get_summonerDTO()->get_region() . "\n";
    echo "Summoner (Id)              = " . $summoner2->get_summonerDTO()->get_id() . "\n";
    echo "Summoner (Account Id)      = " . $summoner2->get_summonerDTO()->get_accountId() . "\n";
    echo "Summoner (PUUID)           = " . $summoner2->get_summonerDTO()->get_puuid() . "\n";
    echo "Summoner (Name)            = " . $summoner2->get_summonerDTO()->get_name() . "\n";
    echo "Summoner (Profile Icon Id) = " . $summoner2->get_summonerDTO()->get_profileIconId() . "\n";
    echo "Summoner (Revision Date)   = " . $summoner2->get_summonerDTO()->get_revisionDate() . "\n";
    echo "Summoner (Summoner Level)  = " . $summoner2->get_summonerDTO()->get_summonerLevel() . "\n";
    echo "\n**=** [Final] INFO SUMMONER **=**\n";
} else {
    echo "\n**=** NO EXISTE INFO DEL SUMMONER **=**\n";
}

echo "\n\n\n";

$summoner3 = new Summoner_V4();

$info_summoner3 = $summoner3->get_byPuuid("fP6i5yBSg1rRCTA0ATjzm93q0SZD4cbhMYyPVZ_247d3z53HU2IT8X9Jusnq5xoshwmGaUOqekiSWw");

echo "\n**=** [Start] INFO QUERYS **=**\n";
echo $info_summoner3;
echo "\n**=** [Final] INFO QUERYS **=**\n";

echo "\n";

if ($summoner3->get_summonerDTO()) {
    echo "\n**=** [Start] INFO SUMMONER **=**\n";
    echo "\nSummoner (Region)          = " . $summoner3->get_summonerDTO()->get_region() . "\n";
    echo "Summoner (Id)              = " . $summoner3->get_summonerDTO()->get_id() . "\n";
    echo "Summoner (Account Id)      = " . $summoner3->get_summonerDTO()->get_accountId() . "\n";
    echo "Summoner (PUUID)           = " . $summoner3->get_summonerDTO()->get_puuid() . "\n";
    echo "Summoner (Name)            = " . $summoner3->get_summonerDTO()->get_name() . "\n";
    echo "Summoner (Profile Icon Id) = " . $summoner3->get_summonerDTO()->get_profileIconId() . "\n";
    echo "Summoner (Revision Date)   = " . $summoner3->get_summonerDTO()->get_revisionDate() . "\n";
    echo "Summoner (Summoner Level)  = " . $summoner3->get_summonerDTO()->get_summonerLevel() . "\n";
    echo "\n**=** [Final] INFO SUMMONER **=**\n";
} else {
    echo "\n**=** NO EXISTE INFO DEL SUMMONER **=**\n";
}

echo "\n\n\n";

$summoner4 = new Summoner_V4();

$info_summoner4 = $summoner4->get_byId("7TqNXcEhEIWercpsSSxrEwQmVIEI3TLhTePBMKRafk1kp5w");

echo "\n**=** [Start] INFO QUERYS **=**\n";
echo $info_summoner4;
echo "\n**=** [Final] INFO QUERYS **=**\n";

echo "\n";

if ($summoner4->get_summonerDTO()) {
    echo "\n**=** [Start] INFO SUMMONER **=**\n";
    echo "\nSummoner (Region)          = " . $summoner4->get_summonerDTO()->get_region() . "\n";
    echo "Summoner (Id)              = " . $summoner4->get_summonerDTO()->get_id() . "\n";
    echo "Summoner (Account Id)      = " . $summoner4->get_summonerDTO()->get_accountId() . "\n";
    echo "Summoner (PUUID)           = " . $summoner4->get_summonerDTO()->get_puuid() . "\n";
    echo "Summoner (Name)            = " . $summoner4->get_summonerDTO()->get_name() . "\n";
    echo "Summoner (Profile Icon Id) = " . $summoner4->get_summonerDTO()->get_profileIconId() . "\n";
    echo "Summoner (Revision Date)   = " . $summoner4->get_summonerDTO()->get_revisionDate() . "\n";
    echo "Summoner (Summoner Level)  = " . $summoner4->get_summonerDTO()->get_summonerLevel() . "\n";
    echo "\n**=** [Final] INFO SUMMONER **=**\n";
} else {
    echo "\n**=** NO EXISTE INFO DEL SUMMONER **=**\n";
}

echo "\n\n\n";

$summoner5 = new Summoner_V4();

$info_summoner5 = $summoner5->get_byName("cacatua");

echo "\n**=** [Start] INFO QUERYS **=**\n";
echo $info_summoner5;
echo "\n**=** [Final] INFO QUERYS **=**\n";

echo "\n";

if ($summoner5->get_summonerDTO()) {
    echo "\n**=** [Start] INFO SUMMONER **=**\n";
    echo "\nSummoner (Region)          = " . $summoner5->get_summonerDTO()->get_region() . "\n";
    echo "Summoner (Id)              = " . $summoner5->get_summonerDTO()->get_id() . "\n";
    echo "Summoner (Account Id)      = " . $summoner5->get_summonerDTO()->get_accountId() . "\n";
    echo "Summoner (PUUID)           = " . $summoner5->get_summonerDTO()->get_puuid() . "\n";
    echo "Summoner (Name)            = " . $summoner5->get_summonerDTO()->get_name() . "\n";
    echo "Summoner (Profile Icon Id) = " . $summoner5->get_summonerDTO()->get_profileIconId() . "\n";
    echo "Summoner (Revision Date)   = " . $summoner5->get_summonerDTO()->get_revisionDate() . "\n";
    echo "Summoner (Summoner Level)  = " . $summoner5->get_summonerDTO()->get_summonerLevel() . "\n";
    echo "\n**=** [Final] INFO SUMMONER **=**\n";
} else {
    echo "\n**=** NO EXISTE INFO DEL SUMMONER **=**\n";
}
