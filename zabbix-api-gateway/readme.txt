<pre>
This API interface is used for interconnection your application with Zabbix \
using an additional Zabbix tool as zabbix_sender.
This script receives the next list of paramaters:
* host_id    - host of Zabbix, where are stored item, that should be modified
* service_id - an unique id of service, by default it is docker container ID
* key        - an item where user want to put any value
* value      - a value that API gataway must put into key item of host
+
* help       - show this help
* debug      - using this mode user can see what happend while API gataway was running
* determine  - if this flag is present then API gateway will try determine clients hostname using its REMOTE_ADDR

Usage:
$ curl "http://127.0.0.1/zabbix/api.php?host_id=&service_id=fa39bbf210cd&key=service.test_key_1&value=2
$ curl "http://127.0.0.1/zabbix/api.php?host_id=&service_id=fa39bbf210cd&key=service.test_key_1&value=2&debug&determine"
$ 
</pre>