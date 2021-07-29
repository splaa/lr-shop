<?php
namespace App\Logging;
// use Illuminate\Log\Logger;
use DB;
use Doctrine\DBAL\Driver\PDO\Exception;
use Illuminate\Support\Facades\Auth;
use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
class MySQLLoggingHandler extends AbstractProcessingHandler{
    /**
     *
     * Reference:
     * https://github.com/markhilton/monolog-mysql/blob/master/src/Logger/Monolog/Handler/MysqlHandler.php
     */
    public function __construct($level = Logger::DEBUG, $bubble = true) {
        $this->table = 'my_lovely_log';
        parent::__construct($level, $bubble);
    }

    /**
     * @throws Exception
     * @throws \JsonException
     */
    protected function write(array $record):void
    {
        if (!empty($record)) // dd($record);
        {
            $data = array(
                'message' => $record['message'],
                'context' => json_encode($record['context'], JSON_THROW_ON_ERROR),
                'level' => $record['level'],
                'level_name' => $record['level_name'],
                'channel' => $record['channel'],
                'record_datetime' => $record['datetime']->format('Y-m-d H:i:s'),
                'extra' => json_encode($record['extra'], JSON_THROW_ON_ERROR),
                'formatted' => $record['formatted'],
                'remote_addr' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
                'created_at' => date("Y-m-d H:i:s"),
            );
        }
        try {
            DB::connection()->table($this->table)->insert($data);
        } catch (\Exception $exception){
            throw new Exception($exception->getMessage());
    }
    }
}
