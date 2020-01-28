# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased](https://github.com/rokka-io/rokka-client-bundle/compare/1.1.2...master)
### Added
### Changed
### Deprecated
### Fixed
### Removed
### Security

## [1.2.0](https://github.com/rokka-io/rokka-client-bundle/releases/tag/1.2.0) - 2020-01-28
### Changed
- Added support for Symfony 5
### Security
- Updated dependencies (rokka/client, symfony/framework-bundle)
- Dropped support for Symfony 2.x
- Dropped support for PHP 5.6

## [1.1.2](https://github.com/rokka-io/rokka-client-bundle/releases/tag/1.1.2) - 2019-05-19
### Fixed
- Fix Symfony 4.2 TreeBuilder deprecations

## [1.1.1](https://github.com/rokka-io/rokka-client-bundle/releases/tag/1.1.1) - 2018-04-23
### Changed
- Updated dependencies on the other rokka libraries
### Removed
- Don't include apiSecret anymore in instantiating underlying libraries.

## [1.1.0](https://github.com/rokka-io/rokka-client-bundle/releases/tag/1.1.0) - 2017-12-08
### Added
- Symfony 4 support, including a flex recipe for easy installation.
### Changed
- Made api_secret optional in configuration, since it's not used anymore.
- Dropped Symfony 3.0 and 3.1 support (Symfony 2 LTS still supported)

## [1.0.1](https://github.com/rokka-io/rokka-client-bundle/releases/tag/1.0.1) - 2017-11-29
### Fixed
- Fixed wrong argument in configuration dependency injection.

## [1.0.0](https://github.com/rokka-io/rokka-client-bundle/releases/tag/1.0.0) - 2017-11-04
First stable release 
### Added
- [PR-7](https://github.com/rokka-io/rokka-client-bundle/pull/7) The bundle now provides all CLI commands contained in the Rokka CLI
### Removed
- Removed PHP 5.5 support

## [0.3.1](https://github.com/rokka-io/rokka-client-bundle/releases/tag/0.3.1) - 2017-08-02
### Updated
 - Updated Rokka Client to v0.8. Adds overwrite parameter to `Rokka\Client\Image::createStack()`. No BC breaks.

## [0.3.0](https://github.com/rokka-io/rokka-client-bundle/releases/tag/0.3.0) - 2017-06-27
### Added
 - Add aliases to allow autowiring services [PR-#6](https://github.com/rokka-io/rokka-client-bundle/pull/6)
### Changed
 - Updated Rokka Client to v0.7 [PR-#5](https://github.com/rokka-io/rokka-client-bundle/pull/5).
   Check the [Rokka PHP Client changelog](https://github.com/rokka-io/rokka-client-php/blob/master/CHANGELOG.md)
   for BC changes!
