<?php

namespace Whipo\Shop\UI\Command;


use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Webmozart\Assert\Assert;
use Whipo\Shop\Modules\Authentication\Application\Service\PasswordHash;
use Symfony\Component\Console\Input\InputArgument;
use Whipo\Shop\Modules\Authentication\Domain\Repository\AccountRepository;
use Whipo\Shop\Modules\Authentication\Domain\Service\AccountUpdatePassword;

#[AsCommand(
    name: 'whipo:account:update-password',
    description: 'Update account password'
)]
class UpdateAccountPassword extends Command
{
    public function __construct(
        private AccountUpdatePassword $accountUpdatePassword,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $email = $input->getArgument('email');
        Assert::email($email, 'Please provide valid email value');

        $io = new SymfonyStyle($input, $output);

        $question = new Question('Please provide password to hash: ');
        $question->setHidden(true);

        $value = $io->askQuestion($question);

        $this->accountUpdatePassword->handle($email, $value);

        $io->success('Password updated successfully for account '.$email);

        return Command::SUCCESS;
    }
}