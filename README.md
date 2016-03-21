# Rokka Symfony Bundle

A [Symfony](http://symfony.com/) bundle for the [Rokka](https://rokka.io/) image service.

## Installation

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

## Configuration

Enter your key, secret and organization strings.

```
rokka_client:
    api_key: 'key-here'
    api_secret: 'secret-here'
    organization: 'my-organization'
    
    # Optional, not needed for most users
    #base_url: https://api.rokka.io
```

base_url is to override the API location. We use this for testing mainly, so no need to change it ever.

## Usage

The bundle will create two services for you, `rokka.client.image` and `rokka.client.user`. These give you access to the
basic functionality from the [rokka/client](https://gitlab.liip.ch/rokka/rokka-client-php) library, pre-configured with
your credentials.

See the [official documentation](https://rokka.io/documentation) on how to use the calls.
