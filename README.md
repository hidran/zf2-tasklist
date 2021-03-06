ZendSkeletonApplication
=======================

Introduction
------------
This is a tasklist project using zendframework2 skeleton application using the ZF2 MVC layer and module
systems. This application is meant to be used as studying purposes.
Installation
------------


    cd my/project/dir
    git https://github.com/hidran/zf2-tasklist.git
    cd zf2-tasklist
    php composer.phar self-update
    php composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)



### PHP CLI Server

The simplest way to get started if you are using PHP 5.4 or above is to start the internal PHP cli-server in the root directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network
interfaces.

**Note: ** The built-in CLI server is *for development only*.

### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName zf2-tasklist.localhost
        DocumentRoot /path/to/zf2-tasklist/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/zf2-tasklist/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
