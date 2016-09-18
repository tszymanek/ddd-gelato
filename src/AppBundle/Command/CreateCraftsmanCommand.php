<?php

namespace AppBundle\Command;

use Gelato\Production\Application\Service\Craftsman\CreateCraftsmanRequest;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCraftsmanCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('craftsman:create')
            ->setDescription('Create a Craftsman')
            ->addArgument('firstName', InputArgument::REQUIRED)
            ->addArgument('lastName', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $firstName = $input->getArgument('firstName');
        $lastName = $input->getArgument('lastName');

        $CreateCraftsmanService = $this->getContainer()->get('create_craftsman_service');
        $response = $CreateCraftsmanService->execute(
            new CreateCraftsmanRequest($firstName, $lastName)
        );

        $output->writeln('Done!');
    }
}
