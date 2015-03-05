@servers(['web' => 'vagrant@192.168.10.15'])

@task('update_mysql_cnf')
	sudo sed -i -e 's/127.0.0.1/0.0.0.0/g' /etc/mysql/my.cnf.030215
	sudo service mysql restart
@endtask
