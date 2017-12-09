<?php return array (
  'components' => 
  array (
    'db' => 
    array (
      'class' => 'yii\\db\\Connection',
      'dsn' => 'mysql:host=localhost;dbname=humhub',
      'username' => 'root',
      'password' => '',
      'charset' => 'utf8',
    ),
    'user' => 
    array (
    ),
    'mailer' => 
    array (
      'transport' => 
      array (
        'class' => 'Swift_MailTransport',
      ),
      'view' => 
      array (
        'theme' => 
        array (
          'name' => 'Custom',
          'basePath' => 'C:/wamp/www/humhub/themes\\Custom',
          'publishResources' => false,
        ),
      ),
    ),
    'cache' => 
    array (
      'class' => 'yii\\caching\\FileCache',
      'keyPrefix' => 'humhub',
    ),
    'view' => 
    array (
      'theme' => 
      array (
        'name' => 'Custom',
        'basePath' => 'C:/wamp/www/humhub/themes\\Custom',
        'publishResources' => false,
      ),
    ),
    'formatter' => 
    array (
      'defaultTimeZone' => 'Pacific/Pago_Pago',
    ),
    'formatterApp' => 
    array (
      'defaultTimeZone' => 'Pacific/Pago_Pago',
      'timeZone' => 'Pacific/Pago_Pago',
    ),
  ),
  'params' => 
  array (
    'installer' => 
    array (
      'db' => 
      array (
        'installer_hostname' => 'localhost',
        'installer_database' => 'humhub',
      ),
    ),
    'config_created_at' => 1512818842,
    'horImageScrollOnMobile' => '1',
    'databaseInstalled' => true,
    'installed' => true,
  ),
  'name' => 'Border 1947',
  'language' => 'en',
  'timeZone' => 'Pacific/Pago_Pago',
); ?>