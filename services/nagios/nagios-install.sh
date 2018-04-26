#!/bin/bash

sshpass -p $1 ssh -o StrictHostKeyChecking=no $2@$3 -p $4 'if [ "$UID" -ne "0" ] ;\
then echo -e "return1:0";\
exit 1;\
else echo -e "return1:1";\
fi;\
file_conf='/var/opt/nagios';\
file_nrpe='/etc/nagios';\
dir_pluggin='/etc/nagios-plugins';\
newip='$3';\
newhost='$7';\
ip_server='$5';\
pass_server='$6';\
if [ -d $dir_pluggin ] && [ -f $file_nrpe/nrpe.cfg ];\
then echo -e "return2:8001";\
else apt-get update;\
 apt-get -y install nagios-plugins nagios-nrpe-server;\
 cp /etc/nagios/nrpe.cfg /etc/nagios/nrpe.cfg.backup;\
 sed -i "/server_address/cserver_address=$ip_server" /etc/nagios/nrpe.cfg;\
 sed -i "s|allowed_hosts=127.0.0.1|allowed_hosts=127.0.0.1,$ip_server|" /etc/nagios/nrpe.cfg;\
 sed -i "s|^command*|#command|" /etc/nagios/nrpe.cfg;\
 service nagios-nrpe-server restart;\
 echo -e "return3:6002";\
fi;\
if [ -f $file_conf/$newhost.cfg ];\
then echo -e "return3:8003";\
 exit 0;\
else mkdir -p $file_conf;\
 echo "define host {" > $file_conf/$newhost.cfg;\
 echo "        use                             generic-host" >> $file_conf/$newhost.cfg;\
 echo "        host_name                       $newhost" >> $file_conf/$newhost.cfg;\
 echo "        alias                           $newalias" >> $file_conf/$newhost.cfg;\
 echo "        address                         $newip" >> $file_conf/$newhost.cfg;\
 echo "        max_check_attempts              5" >> $file_conf/$newhost.cfg;\
 echo "        check_period                    24x7" >> $file_conf/$newhost.cfg;\
 echo "        notification_interval           30" >> $file_conf/$newhost.cfg;\
 echo "        notification_period             24x7" >> $file_conf/$newhost.cfg;\
 echo "        check_interval                  0.05" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 echo "define service{" >> $file_conf/$newhost.cfg;\
 echo "    use generic-service" >> $file_conf/$newhost.cfg;\
 echo "    host_name $newhost" >> $file_conf/$newhost.cfg;\
 echo "    service_description PING" >> $file_conf/$newhost.cfg;\
 echo "    check_command check_ping!100.0,20%!500.0,60%" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 q="";\
 echo "define service{" >> $file_conf/$newhost.cfg;\
 echo "    use generic-service" >> $file_conf/$newhost.cfg;\
 echo "    host_name $newhost" >> $file_conf/$newhost.cfg;\
 echo "    service_description SSH" >> $file_conf/$newhost.cfg;\
 echo "    check_command check_ssh$variable" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 q="";\
 echo "define command{" >> $file_conf/$newhost.cfg;\
 echo "    command_name check_users_$newhost" >> $file_conf/$newhost.cfg;\
 echo "    command_line \$USER1\$/check_users -w1 -c2" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 echo "define service{" >> $file_conf/$newhost.cfg;\
 echo "    use generic-service" >> $file_conf/$newhost.cfg;\
 echo "    host_name $newhost" >> $file_conf/$newhost.cfg;\
 echo "    service_description USERS" >> $file_conf/$newhost.cfg;\
 echo "    check_command check_users_$newhost" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 q="";\
 echo "define command{" >> $file_conf/$newhost.cfg;\
 echo "    command_name check_load_$newhost" >> $file_conf/$newhost.cfg;\
 echo "    command_line \$USER1\$/check_load -w 15,10,5 -c 30,25,20" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 echo "define service{" >> $file_conf/$newhost.cfg;\
 echo "    use generic-service" >> $file_conf/$newhost.cfg;\
 echo "    host_name $newhost" >> $file_conf/$newhost.cfg;\
 echo "    service_description LOAD" >> $file_conf/$newhost.cfg;\
 echo "    check_command check_load_$newhost" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 q="";\
 echo "define command{" >> $file_conf/$newhost.cfg;\
 echo "    command_name check_disk_$newhost" >> $file_conf/$newhost.cfg;\
 echo "    command_line \$USER1\$/check_disk -w 20% -c 10% -p /" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 echo "define service{" >> $file_conf/$newhost.cfg;\
 echo "    use generic-service" >> $file_conf/$newhost.cfg;\
 echo "    host_name $newhost" >> $file_conf/$newhost.cfg;\
 echo "    service_description ROOT" >> $file_conf/$newhost.cfg;\
 echo "    check_command check_disk_$newhost" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 q="";\
 echo "define command{" >> $file_conf/$newhost.cfg;\
 echo "    command_name check_swap_$newhost" >> $file_conf/$newhost.cfg;\
 echo "    command_line \$USER1\$/check_swap -a -w 50% -c 10%" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 echo "define service{" >> $file_conf/$newhost.cfg;\
 echo "    use generic-service" >> $file_conf/$newhost.cfg;\
 echo "    host_name $newhost" >> $file_conf/$newhost.cfg;\
 echo "    service_description SWAP" >> $file_conf/$newhost.cfg;\
 echo "    check_command check_swap_$newhost" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 q="";\
 echo "define command{" >> $file_conf/$newhost.cfg;\
 echo "    command_name check_procs_$newhost" >> $file_conf/$newhost.cfg;\
 echo "    command_line \$USER1\$/check_procs -w 150 -c 200" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 echo "define service{" >> $file_conf/$newhost.cfg;\
 echo "    use generic-service" >> $file_conf/$newhost.cfg;\
 echo "    host_name $newhost" >> $file_conf/$newhost.cfg;\
 echo "    service_description PROCESS" >> $file_conf/$newhost.cfg;\
 echo "    check_command check_procs_$newhost" >> $file_conf/$newhost.cfg;\
 echo "}" >> $file_conf/$newhost.cfg;\
 echo -e "return4:8005";\
 if [ -f /usr/bin/sshpass ];\
 then apt-get -y install sshpass;\
 echo -e "return8:6";\
 else echo -e "return5:5";\
 fi;\
 sshpass -p $pass_server scp -oStrictHostKeyChecking=no $file_conf/$newhost.cfg root@$ip_server:/etc/nagios3/conf.d/$newhost.cfg > /dev/null 2>&1;\	
 echo "return6:8006";\
 sshpass -p $pass_server ssh -o StrictHostKeyChecking=no root@$ip_server "service nagios3 restart";\
 if [[ $? != 0 ]];\
 then echo "return11:8011";\
 rm $file_conf/$newhost.cfg;\
 exit 0;\
 else echo "return12:8012";\
 fi;\
fi;\
echo -e "return9:8010";\
exit 0'

