<?php 

$server = $_GET['host']; //endereço sem o HTTP:// ou HTTPS://
$port = "80"; // Mude o número da porta se quiser testar outros serviços.

// Verifica o status atual do servidor.
$current_status =  ping($server, $port, 10);

if ($current_status == "down"): echo "Servidor indisponível!";
else: echo "Servidor online! ";
endif;


function ping($host, $port, $timeout)
{ 
  $tB = microtime(true); 
  $fP = fSockOpen($host, $port, $errno, $errstr, $timeout); 
  if (!$fP) { return "down"; } 
  $tA = microtime(true); 
  return round((($tA - $tB) * 1000), 0)." ms"; 
} 

?>