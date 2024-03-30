<?php

namespace Whipo\Shop\UI\Command;


use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Whipo\Shop\Modules\Authentication\Domain\Service\PasswordHash;

#[AsCommand(
    name: 'whipo:hash-password',
    description: 'Hash bcrypt password'
)]
class HashPassword extends Command
{
    public function __construct(
        private PasswordHash $passwordHash,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $question = new Question('Please provide password to hash: ');
        $question->setHidden(true);

        $value = $io->askQuestion($question);

        $io->success('Password hashed successfully');
        $output->writeln('----- Value of hashed password:');
        $output->writeln($this->passwordHash->handle($value));
        $output->writeln('');

        return Command::SUCCESS;
    }
}