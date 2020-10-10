<?php

$url = 'https://www.bsmarkets.com/cs/Satellite?c=Page&cid=1191411509498&pagename=BSMarkets2%2FPage%2FPage_Interna_WFG_Template&WEB=0&seccion=resultado_buscador_acciones&busquedaAcc=' . $value . '&IDM_Debe_introducir_un_criterio_de_busqueda=Debe+introducir+un+criterio+de+b%C3%BAsqueda+correcto';
$data = file_get_contents($url);

$pattern = '/wfg_textoTabla">([0-9,]*)<\/td>/s';

preg_match($pattern, $data, $matches);

if (isset($matches[1])) {
    $result = $matches[1];
    $result = str_replace(',', '.', $result);
}
