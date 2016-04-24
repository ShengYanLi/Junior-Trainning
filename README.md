# Junior-Trainning
- [VMware Workstation Player](https://www.vmware.com/products/player) - Virtual Machine Monitor (VMM)
- [Xshell](https://www.netsarang.com/products/xsh_overview.html) -  Terminal Emulator
- [Debian (Linux)](www.debian.org) - Operating System with Linux distribution (OS)
- [git](https://git-scm.com/) - Version Control System (VCS)
- [PHP](http://php.net/) -  Server-side Scripting Language
- [MySQL](https://www.mysql.com/) - Relational Database Management System (RDBMS)
- [nginx](http://nginx.org/) - Web Server
- [Composer](https://getcomposer.org/) - A Tool for dependency management in PHP
- [Doctrine](http://www.doctrine-project.org/) -  A library of Object-Relational Mapper (ORM) for PHP
- [Symfony](https://symfony.com/) - A PHP web application Framework for MVC

### PHP
```sudo apt-get install php5-common php5-cli php5-fpm php5-mysql```

### MySQL
```sudo apt-get install mysql-server```

### nginx
```
wget http://nginx.org/keys/nginx_signing.key
sudo apt-key add nginx_signing.key
```
```vi /etc/apt/sources.list```
最後面加上這兩行codename=wheezy(7.x), =jessie:(8.x)
```
deb http://nginx.org/packages/debian/ codename nginx
deb-src http://nginx.org/packages/debian/ codename nginx
```
```
sudo apt-get update
sudo apt-get install nginx
```
```
cd /etc/nginx/conf.d
sudo cp default.conf default.conf.default
sudo mv default.conf jason
```
```sudo vi jason```
主要更動地方：root, index, PHP-FPM, server_name
```
server {
    listen       80;
    server_name  jason.messageboard;

    #charset koi8-r;
    #access_log  /var/log/nginx/log/host.access.log  main;

    root   /home/jason/www;
    location / {
        index  index.html index.htm index.php;
    }

    #error_page  404              /404.html;

    # redirect server error pages to the static page /50x.html
    #
    error_page   500 502 503 504  /50x.html;
    location = /50x.html {
        root   /usr/share/nginx/html;
    }

    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
    #
    location ~ \.php$ {
    #    root           www;
    #    fastcgi_pass   127.0.0.1:9000;
        fastcgi_pass   unix:/var/run/php5-fpm.sock;
        fastcgi_index  index.php;
    #    fastcgi_param  SCRIPT_FILENAME  /scripts$fastcgi_script_name;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
    }
}
```
```sudo nginx -s reload```

### Composer
1.Command-line installation
```
php -r "readfile('https://getcomposer.org/installer');" > composer-setup.php
php -r "if (hash_file('SHA384', 'composer-setup.php') === '7228c001f88bee97506740ef0888240bd8a760b046ee16db8f4095c0d8d525f2367663f22a46b48d072c816e7fe19959') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
2.Move composer.phar to a directory that is in your path:
```
mv composer.phar /usr/local/bin/composer
```
Now just run `composer` in order to run Composer instead of `php composer.phar`
