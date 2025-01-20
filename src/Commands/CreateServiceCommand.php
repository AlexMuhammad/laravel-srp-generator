<?php

namespace AlexMuhammad\SrpGenerator\Commands;

use AlexMuhammad\SrpGenerator\Generator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateServiceCommand extends Command
{
    protected static $defaultName = "make:service";

    protected function configure()
    {
        $this
            ->setName('make:service') // Atur nama command di sini
            ->setDescription("Create a new service class")
            ->addArgument("name", InputArgument::REQUIRED, "The name of the service")
            ->addOption("repository", "r", InputOption::VALUE_OPTIONAL, "The name of repository");
    }

    // command execute
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $name = $input->getArgument("name");
        $repository = $input->getOption("repository") ?? str_replace("Service", "", $name) . 'Repository';
        $path = getcwd();

        $generator = new Generator();
        $generator->generateService($name, $repository, $path);
        return Command::SUCCESS;
    }
}
