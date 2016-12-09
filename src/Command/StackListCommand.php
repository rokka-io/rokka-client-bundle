<?php

namespace Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StackListCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('rokka:stack:list');
        $this->setDescription('Lists the available Stacks in rokka.io');
    }

    public function run(InputInterface $input, OutputInterface $output)
    {
        /** @var \Rokka\Client\Image $client */
        $client = $this->getContainer()->get('rokka.client.image');

        $stacks = $client->listStacks()->getStacks();
        $output->writeln('Available stacks:');
        foreach ($stacks as $stack) {
            $output->writeln('* ' . $stack->getName());
        }

    }


}