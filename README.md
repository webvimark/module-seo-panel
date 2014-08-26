SEO module for Yii 2
=====


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist webvimark/module-seo-panel "*"
```

or add

```
"webvimark/module-seo-panel": "*"
```

to the require section of your `composer.json` file.

Configuration
-------------

In your config/web.php

```php
	'modules'=>[
		...

		'seo-panel' => [
			'class' => 'webvimark\webvimark\modules\SeoPanel\SeoPanelModule',
		],

		...
	],
```


Usage
-----

1 Go to http://site.com/seo-panel/global-meta-tag/index
1 Go to http://site.com/seo-panel/page-meta-tag/index
1 Go to http://site.com/seo-panel/robots/index


In layouts/main.php (or whatever main layout) put this line before title.
For example near AppAsset::register($this);

```php

SeoPanelHelper::registerMetaTags($this);

```