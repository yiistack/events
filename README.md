<p align="center">
    <a href="https://github.com/yiistack" target="_blank">
        <img src="https://github.com/yiistack.png" height="100px">
    </a>
    <h1 align="center">YiiStack Events</h1>
    <br>
</p>

[![Latest Stable Version](https://poser.pugx.org/yiistack/events/v/stable.png)](https://packagist.org/packages/yiistack/events)
[![Total Downloads](https://poser.pugx.org/yiistack/events/downloads.png)](https://packagist.org/packages/yiistack/events)
[![Build status](https://github.com/yiistack/events/workflows/build/badge.svg)](https://github.com/yiistack/events/actions?query=workflow%3Abuild)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yiistack/events/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/yiistack/events/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/yiistack/events/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/yiistack/events/?branch=master)
[![Mutation testing badge](https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fyiistack%2Fevents%2Fmaster)](https://dashboard.stryker-mutator.io/reports/github.com/yiistack/events/master)
[![static analysis](https://github.com/yiistack/events/workflows/static%20analysis/badge.svg)](https://github.com/yiistack/events/actions?query=workflow%3A%22static+analysis%22)
[![type-coverage](https://shepherd.dev/github/yiistack/events/coverage.svg)](https://shepherd.dev/github/yiistack/events)

The package provides PHP Attributes for [yiisoft/event-dispatcher](https://github.com/yiisoft/event-dispatcher) that can be used to listen events.

## Requirements

- PHP 8.0 or higher.

## Installation

The package could be installed with composer:

```
composer require yiistack/events --prefer-dist
```

## General usage

### Unit testing

The package is tested with [PHPUnit](https://phpunit.de/). To run tests:

```shell
./vendor/bin/phpunit
```

### Mutation testing

The package tests are checked with [Infection](https://infection.github.io/) mutation framework. To run it:

```shell
./vendor/bin/roave-infection-static-analysis-plugin
```

### Static analysis

The code is statically analyzed with [Psalm](https://psalm.dev/). To run static analysis:

```shell
./vendor/bin/psalm
```
