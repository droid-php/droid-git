<?php

namespace Droid\Plugin\Git\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use RuntimeException;
use Gitonomy\Git\Repository;

class GitPullCommand extends Command
{
    public function configure()
    {
        $this->setName('git:pull')
            ->setDescription('Pull (Fetch+Merge) commits from remote')
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
        $res = $repository->run('fetch', array('--all'));
        echo $res;
        $res = $repository->run('merge', []);
        echo $res;
        
        
    }
}
