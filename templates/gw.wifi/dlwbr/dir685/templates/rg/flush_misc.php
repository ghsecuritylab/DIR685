# flush_misc.php >>>
iptables -t nat -F PRE_MISC
<? /* vi: set sw=4 ts=4: */
if ($wanif != "")
{
	$cmd_head="iptables -t nat -A PRE_MISC -i ".$wanif." -p ";
	$cmd_reply="icmp --icmp-type echo-reply ";
	$cmd_request="icmp --icmp-type echo-request ";

    $dnsrelay=query("/dnsrelay/mode");
    if($dnsrelay==2)
    {
        $lan_ip=query("/lan/ethernet/ip");
        $primarydns=query("/runtime/wan/inf:1/primarydns");
        if($primarydns== "")
        {
            $primarydns=query("/dnsrelay/server/primarydns");
        }
        if($primarydns!="")
        {
            echo "iptables -t nat -A PRE_MISC -p tcp -d ".$lan_ip." --dport 53 -j DNAT --to-destination ".$primarydns."\n";
        }
    }

	$enable_wol	= query("/wol/enable");
	
	if($enable_wol==1)
	{			
		$udp_port	= query("/wol/udp/port");
		$tcp_port	= query("/wol/tcp/port");
		
		if($udp_port!="")
		{
			echo "iptables -t nat -I PRE_MISC -p udp --dport ".$udp_port." -j ACCEPT\n";
		}
		if($tcp_port!="")
		{
			echo "iptables -t nat -I PRE_MISC -p tcp --dport ".$tcp_port." -j ACCEPT\n";			
		}
	}
		
	echo $cmd_head.$cmd_reply."-j ACCEPT\n";

	if (query("/security/firewall/pingallow") == 1)
	{
		echo "iptables -t nat -A PRE_MISC -d ".$wanip." -p ".$cmd_request."-j ACCEPT\n";
		echo "logger -p 192.0 \"SYS:023\"\n";
	}
	else
	{
		$log = query("/security/log/droppacketinfo");
		if ($log == 1)
		{
			$logstr = "--log-level info --log-prefix 'DRP:003:'";
			echo $cmd_head.$cmd_request."-j LOG ".$logstr."\n";	
		}
		echo $cmd_head.$cmd_request."-j DROP\n";
		echo "logger -p 192.0 \"SYS:022\"\n";
	}

	if (query("/security/firewall/httpallow") == 1)
	{
		$httpremoteip = query("/security/firewall/httpremoteip");
		$httpremoteport = query("/security/firewall/httpremoteport");
		if ($httpremoteip == "0.0.0.0" || $httpremoteip == "")
		{$ip_args="";}
		else
		{$ip_args=" -s ".$httpremoteip;}
		echo $cmd_head."tcp --dport ".$httpremoteport.$ip_args." -j ACCEPT\n";
		echo "logger -p 192.0 \"SYS:020[".$httpremoteport."]\"\n";
	}
	else
	{  
		echo "logger -p 192.0 \"SYS:021\"\n";
	}

	echo "iptables -t nat -A PRE_MISC -i ".$wanif." -d 224.0.0.1 -j ACCEPT\n";
	for ("/runtime/igmpproxy/group")
	{
		echo "iptables -t nat -A PRE_MISC -i ".$wanif." -d ".query("ipaddr")." -j ACCEPT\n";
	}
	$ftp_mode=query("/nas/ftp/mode");
	$ftp_enable = query("/nas/ftp/enable");
	if($ftp_mode!="1" && $ftp_enable=="1")//not lan mode, so we need to set iptables
	{
		$ftp_port=query("/nas/ftp/port");
		$interface=query("/runtime/wan/inf:1/interface");
		if($interface=="")
		{
			$wan_ip=query("/runtime/wan/inf:1/ip");
		}
		if($interface=="")
		{
			if($wan_ip!="")
			{
				echo "iptables -t nat -A PRE_MISC -d ".$wan_ip." -p tcp --dport ".$ftp_port." -j ACCEPT > /dev/console\n";//jana added
				$tmp_iptables_command="iptables -t nat -D PRE_MISC -d ".$wan_ip." -p tcp --dport ".$ftp_port." -j ACCEPT > /dev/console\n";
			}
		}			
		else
		{
			echo "iptables -t nat -A PRE_MISC -i ".$interface." -p tcp --dport ".$ftp_port." -j ACCEPT > /dev/console\n";//jana added
			$tmp_iptables_command="iptables -t nat -D PRE_MISC -i ".$interface." -p tcp --dport ".$ftp_port." -j ACCEPT > /dev/console\n";
		}			
		
		set("/runtime/ftp/iptables_rules",$tmp_iptables_command);
	}
} 
if($wan2if != "")
{
	$cmd_head="iptables -t nat -A PRE_MISC -i ".$wan2if." -p ";
	$cmd_reply="icmp --icmp-type echo-reply ";
	$cmd_request="icmp --icmp-type echo-request ";

	echo $cmd_head.$cmd_reply."-j ACCEPT\n";

	if (query("/security/firewall/pingallow") == 1)
	{
		echo "iptables -t nat -A PRE_MISC -d ".$wan2ip." -p ".$cmd_request."-j ACCEPT\n";
	}
	else
	{
		$log = query("/security/log/droppacketinfo");
		if ($log == 1)
		{
			$logstr = "--log-level info --log-prefix 'DRP:003:'";
			echo $cmd_head.$cmd_request."-j LOG ".$logstr."\n";	
		}
		echo $cmd_head.$cmd_request."-j DROP\n";
	}

	if (query("/security/firewall/httpallow") == 1)
	{
		$httpremoteip = query("/security/firewall/httpremoteip");
		$httpremoteport = query("/security/firewall/httpremoteport");
		if ($httpremoteip == "0.0.0.0" || $httpremoteip == "")
		{$ip_args="";}
		else
		{$ip_args=" -s ".$httpremoteip;}
		echo $cmd_head."tcp --dport ".$httpremoteport.$ip_args." -j ACCEPT\n";
	}

	echo "iptables -t nat -A PRE_MISC -i ".$wan2if." -d 224.0.0.1 -j ACCEPT\n";
	for ("/runtime/igmpproxy/group")
	{
		echo "iptables -t nat -A PRE_MISC -i ".$wan2if." -d ".query("ipaddr")." -j ACCEPT\n";
	}
}
if($lanif != "" && $lan2if != "")
{
	if(query("/gzone/enable") == 1 && query("/gzone/route2host") != 1)
	{
		echo "iptables -t nat -A PRE_MISC -i ".$lanif." -d ".$lan2ip."/".$lan2mask." -j DROP\n";
		echo "iptables -t nat -A PRE_MISC -i ".$lan2if." -d ".$lanip."/".$lanmask." -j DROP\n";
	}
}
?>
# flush_misc.php <<<
