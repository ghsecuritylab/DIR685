#!/bin/sh
echo [$0] ... > /dev/console
nvram=`cat /etc/config/nvram`

# NVRAM, rgcfg.
xmldbc -x /runtime/nvram/flashspeed				"get:rgcfg getenv -n $nvram -e flashspeed"
xmldbc -x /runtime/nvram/pin					"get:rgcfg getenv -n $nvram -e pin"
xmldbc -x /runtime/nvram/wanmac					"get:rgcfg getenv -n $nvram -e wanmac"
xmldbc -x /runtime/nvram/lanmac					"get:rgcfg getenv -n $nvram -e lanmac"
xmldbc -x /runtime/nvram/wlanmac				"get:rgcfg getenv -n $nvram -e wlanmac"
xmldbc -x /runtime/nvram/hwrev					"get:rgcfg getenv -n $nvram -e hwrev"
xmldbc -x /runtime/nvram/countrycode			"get:rgcfg getenv -n $nvram -e countrycode"
# time
xmldbc -x /runtime/sys/uptime					"get:uptime seconly"
xmldbc -x /runtime/time/date					"get:date +%m/%d/%Y"
xmldbc -x /runtime/time/time					"get:date +%T"
xmldbc -x /runtime/time/rfc1123					"get:date +'%a, %d %b %Y %X %Z'"
# statistics
xmldbc -x /runtime/stats/lan/rx/bytes			"get:scut -p br0: -f 1 /proc/net/dev"
xmldbc -x /runtime/stats/lan/rx/packets			"get:scut -p br0: -f 2 /proc/net/dev"
xmldbc -x /runtime/stats/lan/tx/bytes			"get:scut -p br0: -f 9 /proc/net/dev"
xmldbc -x /runtime/stats/lan/tx/packets			"get:scut -p br0: -f 10 /proc/net/dev"
#The tx and rx for wireless stat is originally reversed for some reason
#switch them to normal form for now, but need verification.
xmldbc -x /runtime/stats/wireless/rx/bytes	"get:scut -p ra0: -f 1 /proc/net/dev"
xmldbc -x /runtime/stats/wireless/rx/packets	"get:scut -p ra0: -f 2 /proc/net/dev"
xmldbc -x /runtime/stats/wireless/tx/bytes	"get:scut -p ra0: -f 9 /proc/net/dev"
xmldbc -x /runtime/stats/wireless/tx/packets	"get:scut -p ra0: -f 10 /proc/net/dev"
#Guest Zone
xmldbc -x /runtime/stats/gzone/rx/bytes	"get:scut -p ra1: -f 1 /proc/net/dev"
xmldbc -x /runtime/stats/gzone/rx/packets	"get:scut -p ra1: -f 2 /proc/net/dev"
xmldbc -x /runtime/stats/gzone/tx/bytes	"get:scut -p ra1: -f 9 /proc/net/dev"
xmldbc -x /runtime/stats/gzone/tx/packets	"get:scut -p ra1: -f 10 /proc/net/dev"
# cable status
xmldbc -x /runtime/switch/port:1/linktype		"get:psts -i 0"
xmldbc -x /runtime/switch/port:2/linktype		"get:psts -i 1"
xmldbc -x /runtime/switch/port:3/linktype		"get:psts -i 2"
xmldbc -x /runtime/switch/port:4/linktype		"get:psts -i 3"
xmldbc -x /runtime/switch/wan_port				"get:psts -i 4"

# usb device status
xmldbc -x /runtime/stats/usb/devices/devlink 		"get:([ -c /dev/usb_modem_dialing_link ] && echo \"1\")"
xmldbc -x /runtime/stats/usb/devices/driver 		"get:([ -c /dev/usb/acm/0 ] && echo \"acm\") || ([ -c /dev/usb/tts/0 ] && echo \"serial\") || ([ -c /dev/ttyUSB0 ] && echo \"serial_tty\")"
xmldbc -x /runtime/stats/usb/devices/manufacturer 	"get:cat /proc/bus/usb/devices | scut -p \"Manufacturer=\" -n 10 | grep -v \"Linux\" | grep -n \"\" | scut -p \"1:\" -n 10"
xmldbc -x /runtime/stats/usb/devices/product 		"get:cat /proc/bus/usb/devices | scut -p \"Product=\" -n 10 | grep -v \"USB\" | grep -v \"PCI\" | grep -v \"F-EHCI\" | grep -n \"\" | scut -p \"1:\" -n 10"

