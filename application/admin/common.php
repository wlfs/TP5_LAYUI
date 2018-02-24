<?php
 function getIpInfo($ip)
{
    $url='http://ip.taobao.com/service/getIpInfo.php?ip='.$ip;
    $result = file_get_contents($url);
    $result = json_decode($result,true);
    return $result['data']['region'].' '.$result['data']['city'].'【'.$result['data']['isp'].'】';
}
