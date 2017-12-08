# Rokka Symfony Bundle

[![StyleCI](https://styleci.io/repos/54386957/shield)](https://styleci.io/repos/54386957)
[![Latest Stable Version](https://poser.pugx.org/rokka/client-bundle/version.png)](https://packagist.org/packages/rokka/client-bundle)

A [Symfony](http://symfony.com/) bundle for the [Rokka](https://rokka.io/) image service.

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
