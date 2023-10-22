# Changelog

All notable changes to this project will be documented in this file.

## [Unreleased](https://github.com/figuren-theater/ft-platform/compare/3.2.1...HEAD)

## [3.2.1](https://github.com/figuren-theater/ft-platform/compare/3.2.0...3.2.1) - 2023-10-22

### 🐛 Fixed

- Downgrade PRODUCTION requirement for php-version to last stable ([#26](https://github.com/figuren-theater/ft-platform/pull/26))

## [3.2.0](https://github.com/figuren-theater/ft-platform/compare/3.1.6...3.2.0) - 2023-10-22

- Update required php-version to be 8.1 (matching PRODUCTION) ([#25](https://github.com/figuren-theater/ft-platform/pull/25))
- And bring to live: https://github.com/figuren-theater/ft-platform-collection/releases/tag/0.2.0

## [3.1.6](https://github.com/figuren-theater/ft-platform/compare/3.1.5...3.1.6) - 2023-10-13

- Deploy with https://github.com/figuren-theater/ft-platform-collection/releases/tag/0.1.7

## [3.1.5](https://github.com/figuren-theater/ft-platform/compare/3.1.4...3.1.5) - 2023-10-13

- Require the platform-collection the same way for dry-run and deploy

## [3.1.4](https://github.com/figuren-theater/ft-platform/compare/3.1.3...3.1.4) - 2023-10-13

### Security

- Update figuren-theater/ft-platform-collection from 0.1.5 to 0.1.6, which includes the WP 6.3.2 security-update.

### Dependency Updates & Maintenance

- Update dev dependencies ([#24](https://github.com/figuren-theater/ft-platform/pull/24))
- Bump actions/checkout from 2 to 4 ([#16](https://github.com/figuren-theater/ft-platform/pull/16))
- Bump figuren-theater/code-quality from 0.7.1 to 0.8.1 ([#23](https://github.com/figuren-theater/ft-platform/pull/23))

## [3.1.3](https://github.com/figuren-theater/ft-platform/compare/3.1.2...3.1.3) - 2023-09-14

### 🐛 Fixed

- Fix missing SUBDOMAIN_INSTALL constant not being set for websites.fuer.figuren.theater|.test ([#21](https://github.com/figuren-theater/ft-platform/pull/21))

### Dependency Updates & Maintenance

- Upgrading figuren-theater/code-quality (0.7.0 => 0.7.1) AND its deps ([#22](https://github.com/figuren-theater/ft-platform/pull/22))

## [3.1.2](https://github.com/figuren-theater/ft-platform/compare/3.1.1...3.1.2) - 2023-09-13

### 🐛 Fixed

- Cleanup ([#20](https://github.com/figuren-theater/ft-platform/pull/20))
- Deprecate FT_PLATTFORM_VERSION constant ([#19](https://github.com/figuren-theater/ft-platform/pull/19))
- NEW Moved the ft-options bootstrap into ft-platform (like all others) ([#18](https://github.com/figuren-theater/ft-platform/pull/18))

## [3.1.1](https://github.com/figuren-theater/ft-platform/compare/3.1.0...3.1.1) - 2023-09-08

- Cleanup ([#17](https://github.com/figuren-theater/ft-platform/pull/17))

## [3.1.0](https://github.com/figuren-theater/ft-platform/compare/0.1.0...3.1.0) - 2023-09-05

- Remove explicit repository-entries because we are using packagist now ([#9](https://github.com/figuren-theater/ft-platform/pull/9))

### 🚀 Added

- Prepare for code-quality checks ([#6](https://github.com/figuren-theater/ft-platform/pull/6))
