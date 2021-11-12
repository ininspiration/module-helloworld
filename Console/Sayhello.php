<?php

namespace Huang\HelloWorld\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class Sayhello extends Command
{
    const NAME = 'name';

    //设置名称、描述、命令行参数
    protected function configure()
    {
        //输入的命令
        $options = [
            new InputOption(
                self::NAME,
                null,
                InputOption::VALUE_REQUIRED,
                'Name'
            )
        ];

        //命名：{group}:{具体的命令}
        $this->setName('example:sayhello');

        //显示的描述
        $this->setDescription('示例命令');

        $this->setDefinition($options);

        parent::configure();
    }

    //控制台调用命令时执行
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(
            '你好世界' .
            $input->getOption(self::NAME)
        );
    }
}

