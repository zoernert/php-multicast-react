<?php

include_once("shm.php");

/**
 * Simple receiving example socket server that prints a hexdump of every message received
 *
 * Accepts a single argument socket address (defaults to 224.10.20.30:12345)
 */

use Clue\React\Multicast\Factory;
use Clue\Hexdump\Hexdump;

require __DIR__ . '/../vendor/autoload.php';

$address = '239.12.255.254:9522'; // random test address
//$address = '239.255.255.250:1900'; // UPNP SSDP (simple service discovery protocol)

// use either above default address or the one given as first argument to this script
if (isset($argv[1])) {
    $address = $argv[1];
}

$loop = React\EventLoop\Factory::create();
$factory = new Factory($loop);
$socket = $factory->createReceiver($address);
$hex = new Hexdump();

;

$socket->on('message', function ($data, $remote) use ($hex) {  
    $hex->dump($data);
	$v=array();
	$v["serial"]=hexdec(substr(bin2hex($data),40,8));
	
	$v["sum_pregard"]=hexdec(substr(bin2hex($data),64,8))/10;
	$v["sum_pregardcnt"]=hexdec(substr(bin2hex($data),80,16))/3600000;
	$v["sum_psurplus"]=hexdec(substr(bin2hex($data),104,8))/10;
	$v["sum_psurpluscnt"]=hexdec(substr(bin2hex($data),120,16))/3600000;
	$v["sum_qregard"]=hexdec(substr(bin2hex($data),144,8))/10;
	$v["sum_qregardcnt"]=hexdec(substr(bin2hex($data),160,16))/3600000;
	$v["sum_qsurplus"]=hexdec(substr(bin2hex($data),184,8))/10;
	$v["sum_qsurpluscnt"]=hexdec(substr(bin2hex($data),200,16))/3600000;
	$v["sum_sregard"]=hexdec(substr(bin2hex($data),224,8))/10;
	$v["sum_sregardcnt"]=hexdec(substr(bin2hex($data),240,16))/3600000;
	$v["sum_ssurplus"]=hexdec(substr(bin2hex($data),264,8))/10;
	$v["sum_ssurpluscnt"]=hexdec(substr(bin2hex($data),280,16))/3600000;
	$v["sum_cosphi"]=hexdec(substr(bin2hex($data),304,8))/1000;
	
	$x=256;
	$v["l1_pregard"]=hexdec(substr(bin2hex($data),$x+64,8))/10;
	$v["l1_pregardcnt"]=hexdec(substr(bin2hex($data),$x+80,16))/3600000;
	$v["l1_psurplus"]=hexdec(substr(bin2hex($data),$x+104,8))/10;
	$v["l1_psurpluscnt"]=hexdec(substr(bin2hex($data),$x+120,16))/3600000;
	$v["l1_qregard"]=hexdec(substr(bin2hex($data),$x+144,8))/10;
	$v["l1_qregardcnt"]=hexdec(substr(bin2hex($data),$x+160,16))/3600000;
	$v["l1_qsurplus"]=hexdec(substr(bin2hex($data),$x+184,8))/10;
	$v["l1_qsurpluscnt"]=hexdec(substr(bin2hex($data),$x+200,16))/3600000;
	$v["l1_sregard"]=hexdec(substr(bin2hex($data),$x+224,8))/10;
	$v["l1_sregardcnt"]=hexdec(substr(bin2hex($data),$x+240,16))/3600000;
	$v["l1_ssurplus"]=hexdec(substr(bin2hex($data),$x+264,8))/10;
	$v["l1_ssurpluscnt"]=hexdec(substr(bin2hex($data),$x+280,16))/3600000;
	$v["l1_cosphi"]=hexdec(substr(bin2hex($data),$x+304,8))/1000;
	
	$x=544;
	$v["l2_pregard"]=hexdec(substr(bin2hex($data),$x+64,8))/10;
	$v["l2_pregardcnt"]=hexdec(substr(bin2hex($data),$x+80,16))/3600000;
	$v["l2_psurplus"]=hexdec(substr(bin2hex($data),$x+104,8))/10;
	$v["l2_psurpluscnt"]=hexdec(substr(bin2hex($data),$x+120,16))/3600000;
	$v["l2_qregard"]=hexdec(substr(bin2hex($data),$x+144,8))/10;
	$v["l2_qregardcnt"]=hexdec(substr(bin2hex($data),$x+160,16))/3600000;
	$v["l2_qsurplus"]=hexdec(substr(bin2hex($data),$x+184,8))/10;
	$v["l2_qsurpluscnt"]=hexdec(substr(bin2hex($data),$x+200,16))/3600000;
	$v["l2_sregard"]=hexdec(substr(bin2hex($data),$x+224,8))/10;
	$v["l2_sregardcnt"]=hexdec(substr(bin2hex($data),$x+240,16))/3600000;
	$v["l2_ssurplus"]=hexdec(substr(bin2hex($data),$x+264,8))/10;
	$v["l2_ssurpluscnt"]=hexdec(substr(bin2hex($data),$x+280,16))/3600000;
	$v["l2_cosphi"]=hexdec(substr(bin2hex($data),$x+304,8))/1000;
	
	$x=832;
	$v["l3_pregard"]=hexdec(substr(bin2hex($data),$x+64,8))/10;
	$v["l3_pregardcnt"]=hexdec(substr(bin2hex($data),$x+80,16))/3600000;
	$v["l3_psurplus"]=hexdec(substr(bin2hex($data),$x+104,8))/10;
	$v["l3_psurpluscnt"]=hexdec(substr(bin2hex($data),$x+120,16))/3600000;
	$v["l3_qregard"]=hexdec(substr(bin2hex($data),$x+144,8))/10;
	$v["l3_qregardcnt"]=hexdec(substr(bin2hex($data),$x+160,16))/3600000;
	$v["l3_qsurplus"]=hexdec(substr(bin2hex($data),$x+184,8))/10;
	$v["l3_qsurpluscnt"]=hexdec(substr(bin2hex($data),$x+200,16))/3600000;
	$v["l3_sregard"]=hexdec(substr(bin2hex($data),$x+224,8))/10;
	$v["l3_sregardcnt"]=hexdec(substr(bin2hex($data),$x+240,16))/3600000;
	$v["l3_ssurplus"]=hexdec(substr(bin2hex($data),$x+264,8))/10;
	$v["l3_ssurpluscnt"]=hexdec(substr(bin2hex($data),$x+280,16))/3600000;
	$v["l3_cosphi"]=hexdec(substr(bin2hex($data),$x+304,8))/1000;
	save_cache(json_encode($v),"em1",3600);
	//print_r($v);
});

$loop->run();
