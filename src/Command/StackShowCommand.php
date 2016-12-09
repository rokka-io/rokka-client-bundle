<?php

namespace AppBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StackShowCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('rokka:stack:show')->setDescription('Sets up a stack for Rokka.io');
        $this->addArgument('stack', InputArgument::REQUIRED, 'Name of the stack to show');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $imageService = $this->getContainer()->get('rokka.client.image');
        $stackName = $input->getArgument('stack');

        $stack = $imageService->getStack($stackName);

        $output->writeln("Stack $stackName operations:");

        foreach ($stack->getStackOperations() as $operation) {
            $output->writeln($operation->name);
            foreach ($operation->options as $key => $value) {
                $output->writeln('  ' . $key . ': ' . $value);
            }
        }


    }

}