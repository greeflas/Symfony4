<?php

namespace App\Service;

use Psr\Log\LoggerInterface;

/**
 * Service for generating messages.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class MessageGenerator
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * MessageGenerator constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    
    /**
     * Generates happy message.
     *
     * @return string
     */
    public function getHappyMessage()
    {
        $this->logger->info('Generating of happy message...');

        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];

        return $messages[array_rand($messages)];
    }
}