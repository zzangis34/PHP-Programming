﻿<?PHP
/* if문 예제 : 다이어트 필요 유무 판정
 * 한 행 명령문
 */

// 다이어트가 필요한지 판별 : 몸무게가 (키 - 100) * 0.9 보다
// 크면 다이어트 필요

$h = 170;
$w = 40;
$a = ($h-100)*0.9;

echo "키 : $h <br>";
echo "몸무게 : $w <br>";

if ($w>$a)
    echo "다이어트가 필요할지도 모르겠군요.<br>";
else
    echo "다이어트가 필요하지 않군요.<br>";
?>
