<?php

namespace Droid\Plugin\Git\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RuntimeException;
use Gitonomy\Git\Repository;

class GitMergeCommand extends Command
{
    public function configure()
    {
        $this->setName('git:merge')
            ->setDescription('Merge branch')
            ->addOption(
                'path',
                'p',
                InputOption::VALUE_REQUIRED,
                'Path to the local git repository'
            )
        ;
    }
    
    public function execute(InputInterface $input, OutputInterface $output)
    {
        
        $path = $this->getApplication()->getProject()->getBasePath();
        $output->writeLn("BasePath: " . $path);
        
        $repository = new Repository(
            $path,
            array(
                'debug'  => true
            )
        );
        //print_r($repository);
        $res = $repository->run('merge', []);
        echo $res;
    }
}
