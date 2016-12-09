<?php

namespace AppBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StackRemoveCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('rokka:stack:remove')->setDescription('Removes a stack for Rokka.io');
        $this->addArgument('stack', InputArgument::REQUIRED, 'Name of the stack to remove');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $imageService = $this->getContainer()->get('rokka.client.image');
        $stackName = $input->getArgument('stack');

        $imageService->deleteStack($stackName);

        $output->writeln("Stack $stackName deleted.");


    }

}