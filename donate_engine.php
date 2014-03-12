<?php


function get_darkcoin($address) {
    $return = array();
    $data = get_request('http://explorer.darkcoin.io/address/'.$address);

    if (!empty($data))
    {

        preg_match('/Balance: ([0-9]{1,10}?\.[0-9]{0,20})/s', $data,$balance);
        preg_match('/Transactions in: ([0-9]{1,10})/s', $data,$transactionsIn);


        $return = array(
            'count' =>  $transactionsIn[1],
            'amount' => (float) $balance[1],

        );
        return $return;
    }
}
function twoDecimals($number){
    return number_format((float)$number, 2, '.', '');
}
function get_request($url,$timeout=4) {
    if (function_exists('curl_version')) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13');
        $return = curl_exec($curl);
        curl_close($curl);
        return $return;
    } else {
        return @file_get_contents($url);
    }
}


function donate_block($address,$amountWanted){


    $trans=get_darkcoin($address);
    $barWidth=100*($trans['amount']/$amountWanted);

    $html='<div class="donation_info">
    <div class="donate_bar">
        <span style="width:'.$barWidth.'%;"</span>
    </div>
    <div class="donate_specs">
        <ul>
            <li>
                Donated
                <strong>'. twoDecimals($barWidth*100).'</strong>
            </li>
            <li>
                To Go
                <strong>'.twoDecimals($amountWanted-$trans['amount']).'</strong>
            </li>
            <li>
                Goal
                <strong>'.$amountWanted.'</strong>
            </li>
        </ul>
    </div>
</div>';
return $html;
}



?>



