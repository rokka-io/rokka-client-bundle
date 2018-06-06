# Rokka Symfony Bundle

[![StyleCI](https://styleci.io/repos/54386957/shield)](https://styleci.io/repos/54386957)
[![Latest Stable Version](https://poser.pugx.org/rokka/client-bundle/version.png)](https://packagist.org/packages/rokka/client-bundle)

A [Symfony](http://symfony.com/) bundle for the [Rokka](https://rokka.io/) image service.

[rokka](https://rokka.io) is digital image processing done right. Store, render and deliver images. Easy and blazingly fast. This bundle allows to upload and manage your image files to rokka and deliver them in the right format, as light and as fast as possible. And you only pay what you use, no upfront and fixed costs.

Free account plans are available. Just install the plugin, register and use it.

## Installation Symfony version <= 3

Require the bundle using composer:

`composer require rokka/client-bundle`

Add it to `app/AppKernel.php`

```
        $bundles = array(
            ...
            new Rokka\RokkaClientBundle\RokkaClientBundle(),
        );
```

Configure the bundle with the parameters below.

## Installation Symfony version >= 4

The rokka Symfony bundle comes with a flex recipe. 

Do the following.

```
composer config extra.symfony.allow-contrib true
composer require rokka/client-bundle
```

Then you can add your api key and organization to the `.env` file
or edit `config/packages/rokka.yaml`.

## Configuration

Enter your api key and organization strings.

```
rokka_client:
    api_key: 'key-here'
    organization: 'my-organization'
    
    # Optional, not needed for most users
    #base_url: https://api.rokka.io
```

base_url is to override the API location. We use this for testing mainly, so no need to change it ever.

## Usage

The bundle will create two services for you, `rokka.client.image` and `rokka.client.user`. These give you access to the
basic functionality from the [rokka/client](https://github.com/rokka-io/rokka-client-php) library, pre-configured with
your credentials.

This bundle also provides console commands to interact with rokka.io. If you only want a CLI for rokka, you can also 
install the [rokka PHP CLI tool](https://github.com/rokka-io/rokka-client-php-cli) as stand-alone phar.

See the [official documentation](https://rokka.io/documentation) for further information on how to use rokka.

## Twig

The rokka twig extension is automatically included. For the available functions see the [README of that package](https://github.com/rokka-io/rokka-client-php-twig).

## Moving from LiipImagineBundle

If you use imagine and want to switch to rokka, create a rokka stack for each imagine filter you have.
And then replace  `imagine_filter` with `rokka_stack_url` in your twig templates (maybe also state the format, if you don't want jpg).

If your images are not stored on the file system, then you need to do some further adjustments.  The twig extension readme explains how to load images from other sources.

