#!/bin/bash
mysql -e 'DELETE FROM `mysql`.`user` WHERE `user`.`Host` = "%" AND `user`.`User` = "root";';
mysql -e 'DELETE FROM `mysql`.`user` WHERE `user`.`user` NOT IN("root","mysql.sys","mysql.session","mysql.infoschema");';
mysql -e 'DELETE FROM `mysql`.`db` WHERE `db`.`host` NOT IN("localhost");';
mysql -e 'FLUSH PRIVILEGES;';
mysql -e "CREATE USER '$MYSQL_USER'@'%' IDENTIFIED BY '$MYSQL_PASSWORD';"
mysql -e "GRANT ALL PRIVILEGES ON $MYSQL_DATABASE.* TO '$MYSQL_USER'@'%';"
mysql -e 'FLUSH PRIVILEGES;';