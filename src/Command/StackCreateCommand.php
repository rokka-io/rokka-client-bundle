<?php

namespace AppBundle\Command;


use Rokka\Client\Core\StackOperation;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StackCreateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('rokka:stack:create')->setDescription('Creates a stack for Rokka.io, at the momemnt only resize operation is supported');
        $this->addArgument('stack', InputArgument::REQUIRED, 'Name of the stack to create');
        $this->addArgument('width', InputArgument::REQUIRED, 'Width in pixels');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $imageService = $this->getContainer()->get('rokka.client.image');
        $stackName = $input->getArgument('stack');
        $width = $input->getArgument('width');

        $operations = [new StackOperation('resize', ['width' => $width, 'height' => 10000])];
        $imageService->createStack($stackName, $operations);

        $output->writeln("Stack $stackName created.");


    }

}