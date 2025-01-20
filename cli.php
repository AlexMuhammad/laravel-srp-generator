#!/usr/bin/env php
<?php
require __DIR__ . '/vendor/autoload.php';

use AlexMuhammad\SrpGenerator\Commands\CreateRepositoryCommand;
use AlexMuhammad\SrpGenerator\Commands\CreateServiceCommand;
use Symfony\Component\Console\Application;

$app = new Application();
$app->add(new CreateServiceCommand());
$app->add(new CreateRepositoryCommand());
$app->run();
