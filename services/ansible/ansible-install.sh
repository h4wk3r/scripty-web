#!/bin/bash

sshpass -p $1 ssh -o StrictHostKeyChecking=no $2@$3 -p $4 'if [ "$UID" -ne "0" ] ;\
then echo -e "no";\
 exit 1;\
 else echo -e "yes";\
 fi'
