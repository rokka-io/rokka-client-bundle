<?php

namespace AppBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImageInfoCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('rokka:image:info')->setDescription('Lists info about a rokka source image');
        $this->addArgument('id', InputArgument::REQUIRED, 'Id of source image');
    }

    public function run(InputInterface $input, OutputInterface $output)
    {
        $client = $this->getContainer()->get('rokka.client.image');

        var_dump($client->getSourceImage($input->getArgument('id')));
    }


}