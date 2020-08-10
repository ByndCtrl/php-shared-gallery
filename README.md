# php-shared-gallery

An MVC App from scratch in PHP.

## Installation

##### Install Apache, MySQL and PHP. (LAMP Stack)

##### Set up permissions
```
sudo chown -R $USER:$USER /var/www
sudo chmod -R 755 /var/www
```

##### Download the project
```
cd /var/www/
git clone https://github.com/ByndCtrl/php-shared-gallery
```

##### Create virtual host
```
sudo nano /etc/apache2/sites-available/php-shared-gallery.conf
```

```
<VirtualHost *:80>

        ServerAdmin webmaster@localhost
        ServerName php-shared-gallery.com
        ServerAlias www.php-shared-gallery.com
        
# 	Server has to point to the "/public" directory.
#	DocumentRoot /path/to/app/php-shared-gallery/public
	
	DocumentRoot /var/www/php-shared-gallery/public

        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined

</VirtualHost>
```

```
sudo a2ensite php-shared-gallery.conf
```

##### Allow local address recognition
 ```
sudo nano /etc/hosts
```

```
127.0.0.1 php-shared-gallery.com
```

##### Allow override for .htaccess files
```
sudo nano /etc/apache2/apache2.conf
```

```
<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>
```

##### Restart apache
```
sudo systemctl restart apache2
```

##### Set up database
```
cd /var/www/php-shared-gallery/App
cp Credentials.example.php Credentials.php

Enter your database username and password
```

##### Run installation script
```
cd ..
php install.php
```

## Directory Structure

```
php-shared-gallery/
    App/                # Application Files
        Controllers/        # Controller classes
        Models/             # Model classes
        Validation/         # Input validation classes
        Views/              # Views and templates
    Core/               # MVC Files
        Util/               # Utility classes
    public/             # Publicly accessible files
        assets/             # Uploaded images and thumbnails
        css/                # CSS Files
        js/                 # JS Files
        index.php           # Main entry point
    SampleImages/       # Images to upload
    .gitignore          # Ignored files
    install.php         # Database setup script
    README.md           # Documentation
```

## Possible Issues

##### 1. PHP isn't being parsed.
###### Copy & paste the following:
```
sudo a2dismod mpm_event && sudo a2enmod mpm_prefork && sudo a2enmod php7.4
systemctl restart apache2
```

##### 2. Routing isn't working.
###### Enable mod rewriting for .htaccess files:
```
a2enmod rewrite
systemctl restart apache2
```
