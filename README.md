# laravel-opensearch
OpenSearch implementation for Laravel

Installation
------------

First, install the package:

```bash
composer require matthewbdaly/laravel-opensearch
```

Then publish the config:

```bash
php artisan vendor:publish
```

Then, update `config/opensearch.php` to match your requirements. You also need to add something like the following to the HTML header for your site to tell the browser where to find the OpenSearch XML file:

```html
<link href="/opensearch.xml" rel="search" title="Search title" type="application/opensearchdescription+xml">
```
