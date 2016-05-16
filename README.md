Bonus cards system, based on Yii 2
============================

The application includes the admin panel to manage and code generation, and also a simple api controller to get the data in json/xml format.

INFo
---

**DEMO** [http://bonuscards.byethost18.com/](http://bonuscards.byethost18.com/)
**API** : [http://bonuscards.byethost18.com/web/index.php/api](http://bonuscards.byethost18.com/web/index.php/api) 

Based on Yii2  ActiveController. 

You can remove  web and index.php  by .htacces or nginx.conf

INSTALLATION
------------

~~~
git clone https://github.com/ifonetwork/bonus_cards.git
composer self-update
composer install
~~~

REQUIREMENTS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.






DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

