# Langkah awal mengkonfigurasi Framework CodeIgniter 3
Aplikasi yang di buat menggunakan framework dari codeigniter versi 3 dengan menggunakan bahasa program PHP versi 7, sebelum membuat sistem langkah pertama yang harus di lakukan adalah mengkonfigurasi file yang ada pada folder config.

## Step 1 (autoload.php)
- Buka file autoload.php pada application/config/autoload.php
- Isikan data pada variabel libraries

```php
$autoload['libraries'] = array('database', 'email', 'session');
```
- Kemudian isikan juga data pada variabel helper
```php
$autoload['helper'] = array('url', 'file');
```

## Step 2 (config.php)
- Buka file config.php application/config/config.php
- Isikan url aplikasi kalian seperti gambar di bawah ini
```php
$config['base_url'] = 'http://localhost/isi_dengan_nama_aplikasi_kalian/';
```
- sesuaikan namanya dengan nama aplikasi kalian 
- Hapus index.php pada variabel index_page, seperti code di bawah ini
```php
$config['index_page'] = '';
```

## Step 3 (database.php)
- Buka file database.php application/config/database.php
- Isikan bagian hostname, username, password dan database dengan data kalian
```php
$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'isi_dengan_nama_database_kalian',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
```

## Step 4 (.htaccess)
- Buat file .htaccess di luar folder application
- Isikan file tersebut dengan code di bawah ini
```htaccess
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```
## Server Requirements
PHP Version 7

Disarankan menggunakan php versi 7.* atau diatasnya
## License

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

## Sumber

-  `User Guide <https://codeigniter.com/docs>`_
-  `Contributing Guide <https://github.com/bcit-ci/CodeIgniter/blob/develop/contributing.md>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_
