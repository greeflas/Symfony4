<?php

namespace App\Event;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * The admin.dashboard-accessed event is dispatched each time when
 * admin dashboard was accessed.
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class AdminDashboardAccessedEvent extends Event
{
    /**
     * The event name.
     */
    const NAME = 'admin.dashboard-accessed';

    /**
     * SiteTranslateEvent constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $logger->info(self::NAME . ' event was dispatched.');
    }
}