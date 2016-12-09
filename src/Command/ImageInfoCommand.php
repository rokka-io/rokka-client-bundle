<?php

namespace AppBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;

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

        $cloner = new VarCloner();
        $dumper = new CliDumper();

        $dumper->dump($cloner->cloneVar($client->getSourceImage($input->getArgument('id'))));
    }


}