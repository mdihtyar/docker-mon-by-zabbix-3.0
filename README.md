# docker-mon-by-zabbix-3.0
This is a copy of repository *https://github.com/rpsedlak/zabbix-docker* with some modification for working with Zabbix 3.0

The original repository is https://github.com/rpsedlak/zabbix-docker

###Usage
It is used for monitoring docker host, all created docker containers, how much resources they retrieve for their work. 

###How you can install this project to your Zabbix

I tested this project using Zabbix 3.0 and Ubuntu 14.04.

To use you should:

1. Clone this project
1. Launch install.sh that is located inside this project's folder
1. Restart zabbix-agent using the command, for example: 
```/etc/init.d/zabbix-agent restart```
1. Import **ZabbixDockerTemplate.xml** template into your Zabbix server
1. Assing your docker host with this template and afterwards Zabbix will be gather all statistics data from your docker host, including docker conatiners

