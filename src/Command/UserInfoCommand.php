<?php

namespace AppBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;

class UserInfoCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('rokka:organization:info')->setDescription('Resturns information about the rokka organization');
        $this->addArgument('name', InputArgument::OPTIONAL, "Name of the Rokka organization", "srf");
    }

    public function run(InputInterface $input, OutputInterface $output)
    {
        $user = $this->getContainer()->get('rokka.client.user');
        $key = $this->getContainer()->getParameter('rokka_client.api_key');
        $secret = $this->getContainer()->getParameter('rokka_client.api_secret');
        $user->setCredentials($key, $secret);

        $cloner = new VarCloner();
        $dumper = new CliDumper();
        $dumper->dump($cloner->cloneVar($user->getOrganization($input->getArgument('name'))));
    }

}