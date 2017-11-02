# Change Log

All notable changes to this project will be documented in this file.

This project aims to follow [Semantic Versioning](http://semver.org/).

## 1.3.0 - 2021-03-11

### Added

* Provide twig filters to generate rokka URLs.

## 1.2.1 - 2020-11-14

### Added

* Added PHP 8 support

### Removed

* Removed PHP 7.0 support

## 1.2.0 - 2020-01-28

### Added

* Added support for Symfony 5

### Security

* Updated dependencies (rokka/client, symfony/framework-bundle)
* Dropped support for Symfony 2.x
* Dropped support for PHP 5.6

## 1.1.2 - 2019-05-24

### Changed

* Fixed Symfony 4.2 tree builder deprecations

## 1.1.1 - 2018-04-23

### Changed

* Updated dependencies on the other rokka libraries

### Removed

* Don't include apiSecret anymore in instantiating underlying libraries.

## 1.1.0 - 2017-12-08

### Added

* Symfony 4 support, including a flex recipe for easy installation.

### Changed

* Made api_secret optional in configuration, since it's not used anymore.
* Dropped Symfony 3.0 and 3.1 support (Symfony 2 LTS still supported)

## 1.0.0 - 2017-11-04

* First stable release.
