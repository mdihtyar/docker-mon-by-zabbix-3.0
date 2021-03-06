#!/bin/bash

# argument processing

CONFIG_PATH=/etc/zabbix/zabbix_agentd.d/

if [ "$#" -eq 1 ]; 
	then CONFIG_PATH=$1
fi

# Copy the files
cp -f *.py /usr/local/bin
cp -f *.conf $CONFIG_PATH
#cp -f *.xml /tmp

cat << EOF > /etc/sudoers.d/zabbix-docker
zabbix ALL = NOPASSWD: $(which docker)
zabbix ALL = NOPASSWD: /usr/local/bin/zabbix-docker*.py
EOF
#
mkdir /root/.docker
echo "{}" > /root/.docker/config.json
#
# tell the user some stuff
echo "Python scripts copied to /usr/local/bin"
echo "zabbix-agent configuration files copied to $CONFIG_PATH"
echo "Created a sudoers rule for zabbix user"
echo ""


