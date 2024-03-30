<?php

namespace Whipo\Shop\UI\Command;


use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;
use Webmozart\Assert\Assert;
use Symfony\Component\Console\Input\InputArgument;
use Whipo\Shop\Modules\Authentication\Domain\Exception\AccountNotFoundException;
use Whipo\Shop\Modules\Authentication\Domain\Service\AccountUpdatePassword;

#[AsCommand(
    name: 'whipo:account:update-password',
    description: 'Update account password'
)]
class UpdateAccountPassword extends Command
{
    public function __construct(
        private readonly AccountUpdatePassword $accountUpdatePassword,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED);
    }

    /**
     * @throws AccountNotFoundException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $email = $input->getArgument('email');
        Assert::email($email, 'Please provide valid email value');
        Assert::string($email);

        $io = new SymfonyStyle($input, $output);

        $question = new Question('Please provide password to hash: ');
        $question->setHidden(true);

        $value = $io->askQuestion($question);

        Assert::string($value, 'Please provide string password');

        $this->accountUpdatePassword->handle($email, $value);

        $io->success('Password updated successfully for account '.$email);

        return Command::SUCCESS;
    }
}