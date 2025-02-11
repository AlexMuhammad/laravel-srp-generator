<?php

namespace AlexMuhammad\SrpGenerator\Commands;

use AlexMuhammad\SrpGenerator\Generator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateRepositoryCommand extends Command
{
    protected static $defaultName = 'make:repository';

    protected function configure()
    {
        $this
            ->setName('make:repository') // Atur nama command di sini
            ->setDescription("Create a new repository class")
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the repository')
            ->addOption('model', 'm', InputOption::VALUE_OPTIONAL, 'The name of the model');
    }

    // command execute
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument('name');
        $model = $input->getOption('model') ?? str_replace('Repository', '', $name);
        $path = getcwd();

        $generator = new Generator();
        $generator->generateRepository($name, $model, $path);
        return Command::SUCCESS;
    }
}
