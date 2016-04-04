<?php

namespace Droid\Plugin\Git;

class DroidPlugin
{
    public function __construct($droid)
    {
        $this->droid = $droid;
    }
    
    public function getCommands()
    {
        $commands = [];
        $commands[] = new \Droid\Plugin\Git\Command\GitFetchCommand();
        $commands[] = new \Droid\Plugin\Git\Command\GitMergeCommand();
        $commands[] = new \Droid\Plugin\Git\Command\GitPullCommand();
        return $commands;
    }
}
