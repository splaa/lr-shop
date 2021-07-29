<?php

declare(strict_types=1);

namespace App\Logging;

use Monolog\Logger;

class MySQLCustomLogger
{
    public function __invoke(array $config)
    {
        $logger = new Logger("MySQLLoggingHandler");
        return $logger->pushHandler(new MySQLLoggingHandler());
    }

}
