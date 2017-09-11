<?php

//v means the propobility of winning the prize(if it is 1, the propobility is 1%)
$prize_arr = array(
    '0' => array('id' => 1, 'prize' => '1st Prize', 'v' => 0.5),
    '1' => array('id' => 2, 'prize' => '2nd Prize', 'v' => 1),
    '2' => array('id' => 3, 'prize' => '3rd Prize', 'v' => 1.5),
    '3' => array('id' => 4, 'prize' => 'Sorry Try Again', 'v' => 31),
    '4' => array('id' => 5, 'prize' => '5th Prize', 'v' => 3),
    '5' => array('id' => 6, 'prize' => '6th Prize', 'v' => 4),
    '6' => array('id' => 7, 'prize' => '7th Prize', 'v' => 5),
    '7' => array('id' => 8, 'prize' => '8th Prize', 'v' => 6),
    '8' => array('id' => 9, 'prize' => '9th Prize', 'v' => 7),
    '9' => array('id' => 10, 'prize' => 'Sorry Try Again', 'v' => 31),
    '10' => array('id' => 11, 'prize' => '10th Prize', 'v' => 8),
    '11' => array('id' => 12, 'prize' => '4th Prize', 'v' => 2),
);
foreach ($prize_arr as $k=>$v) {
    $arr[$v['id']] = $v['v'];

}

$prize_id = getRand($arr); //get id
foreach($prize_arr as $k=>$v){ //get position
    if($v['id'] == $prize_id){
     $prize_site = $k;
     break;
    }
}
$res = $prize_arr[$prize_id - 1]; //prize

$data['prize_name'] = $res['prize'];
$data['prize_site'] = $prize_site;//prize site from -1
$data['prize_id'] = $prize_id;
echo json_encode($data);

function getRand($proArr) {
    $data = '';
    $proSum = array_sum($proArr); //total propobility

    foreach ($proArr as $k => $v) { //loop the arr
        $randNum = mt_rand(1, $proSum);
        if ($randNum <= $v) {
            $data = $k;
            break;
        } else {
            $proSum -= $v;
        }
    }
    unset($proArr);

    return $data;
}