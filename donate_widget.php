<?php
//below is basic example of the workings. you could play with this here if you like
//

include('donate_engine.php');
$address="Xv5xZvghgNTJKVYiHBNaacE5EfbjFD1A8K";
$amountWanted=100000;
$trans=get_darkcoin($address);
$barWidth=100*($trans['amount']/$amountWanted);


?>

    <style>
        .donate_bar{
            background: none repeat scroll 0 0 #2a2c3c;
            float: left;
            height: 8px;
            width:300px;
        }
        span{
            background: none repeat scroll 0 0 #a49c92;
            float: left;
            height: 8px;
            }
        .donate_specs{
            width:300px;
            border: 0 none;
            font: inherit;
            margin: 0;
            padding: 0;
            vertical-align: baseline;
            font-size: 12px;
        }
        ul {
            list-style: none outside none !important;
            float: inherit;
            margin: 0;
            padding: 0;
        }
        li {
            list-style: none outside none !important;
            float: left;
            margin: 0 !important;
            text-transform: uppercase;
            width: 33%;
        }
        strong{
            color:#36384d;
            display:block;
        }
    </style>

<!--
**************************
                    below is inline php which one would call to instantiate for their project
                    pass the address for the donation and the amount you wish to raise.        *******************
                -->
<?php
echo donate_block("Xv5xZvghgNTJKVYiHBNaacE5EfbjFD1A8K",2000000);

?>

