The created MySoft application can be deployed according to the followings

1. Requirements
- PHP 7.1 or higher (tested on PHP 7.2.2 and 7.2.4)
- MySQL community server (tested with MySQL 5.6.26 and 5.6.39)
- web server (tested on LiteSpeed 7.1)

To upload the neccessary files:
- Composer (tested with Composer 1.1.1 or 1.6.5)
- Git (tested with Git 1.7.1) 

2. Installation of the created system

on your server:
- cd <domain name's root directory>
- git clone https://zsolt1128:Kamion73@github.com/zsolt1128/soft_gen_dl.git
- cd soft_gen_dl
- composer install
- create the database with the given name, username, password

in SoftGen system (Manual site):
- click filesToServer button 


TODO
- db install új rendszerben
- ajánlás a domain name's root directory-ban lévő .htaccess fájl tartalmára vonatkozóan

apache configba
SetEnvIf Authorization "(.*)" HTTP_AUTHORIZATION=$1