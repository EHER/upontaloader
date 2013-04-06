<?php

namespace Eher\UpOntaLoader\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Eher\UpOntaLoader\Model\Uploader;

class UploadCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName("upload")
            ->setDescription('Upload image to Apontador')
            ->addArgument(
                'file',
                InputArgument::REQUIRED,
                'path of the image'
            )
            ->addArgument(
                'placeId',
                InputArgument::REQUIRED,
                'id of the place which image will be uploaded'
            )
            ->addOption(
                'baseUrl',
                null,
                InputOption::VALUE_NONE,
                'Apontador Base Url'
            )
            ->addOption(
                'token',
                null,
                InputOption::VALUE_NONE,
                'Apontador Access Token'
            )
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');
        $placeId = $input->getArgument('placeId');
        $token = $input->getOption('token');
        $baseUrl = $input->getOption('baseUrl');
        $baseUrl = empty($baseUrl) ?
            null : $baseUrl;

        $uploader = new Uploader($token, $baseUrl);
        $response = $uploader->upload($file, $placeId);

        $output->writeln("Response status code: {$response}");
    }
}
