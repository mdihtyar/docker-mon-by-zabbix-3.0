<?php
#    http://127.0.0.1/zabbix/api.php?host_id=test.com.ua&service_id=cb926cee5f1c&key=service.key_1&value=123
    $zabbix_server="127.0.0.1";
    $zabbix_sender_path="/usr/bin/zabbix_sender";
    //
    if (isset($_GET["help"])) {
        print file_get_contents("readme.txt");
        exit;
    }
    //
    if (file_exists($zabbix_sender_path)) {
    //
    $host_id = (isset($_GET["host_id"])?addslashes($_GET["host_id"]):"");
    $service_id = (isset($_GET["service_id"])?addslashes($_GET["service_id"]):"");
    $key = (isset($_GET["key"])?addslashes($_GET["key"]):"");
    $value = (isset($_GET["value"])?addslashes($_GET["value"]):"");
    //
    if ((($host_id != "") || isset($_GET["determine"])) && ($service_id != "") && ($key != "") && ($value != "")) {
        if (isset($_GET["determine"])) {
	    $hostname = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
	    $hostname = $host_id.explode(".",$hostname)[0];
        } else {
            $hostname = $host_id;
        }
        $command = "$zabbix_sender_path -z $zabbix_server -s $hostname -k $key"."[$service_id] -o $value";
        exec($command,$output,$result);
        if ($result != 0) {
            print "<pre>Something was wrong while API script had been executed zabbix_sender app!\n</pre>";
        }
        if (isset($_GET["debug"])) {
                print "<pre>";
                print "$ ".$command."\n";
                print "Command's output:\n";
                for ($i=0;$i<count($output);$i++) {
                    print "$output[$i]\n";
                }
                print "</pre>";
        }
    } else {
        print "<pre>Error! Not enough input parameters\n<pre>";
    } 
    } else {
        print "<pre>Error! Can not find zabbix_sender. Please install it if it was not installed yet.\n</pre>";
    }
?>