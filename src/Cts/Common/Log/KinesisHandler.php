<?php declare(strict_types=1);


namespace Cts\Common\Log;



use Swoft\Bean\BeanFactory;
use Swoft\Redis\Redis;
use Swoft\Stdlib\Helper\JsonHelper;
use function array_column;
use function implode;
use InvalidArgumentException;
use Monolog\Handler\AbstractProcessingHandler;
use ReflectionException;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Co;
use Swoft\Log\Helper\Log;
use Swoft\Log\Helper\CLog;
use Swoft\Log\Logger as SwoftLogger;

/**
 * Class KinesisHandler
 *
 * @since 2.0
 */
class KinesisHandler extends AbstractProcessingHandler
{
    /**
     * Write log levels
     *
     * @var string
     */
    protected $levels = '';

    /**
     * @var array
     */
    protected $levelValues = [];


    /**
     * Will exec on construct
     */
    public function init(): void
    {
        if (is_array($this->levels)) {
            $this->levelValues = $this->levels;
            return;
        }

        // Levels like 'notice,error'
        if (is_string($this->levels)) {
            $levelNames        = explode(',', $this->levels);
            $this->levelValues = SwoftLogger::getLevelByNames($levelNames);
        }
    }

    /**
     * Write log by batch
     *
     * @param array $records
     *
     * @return void
     * @throws ReflectionException
     * @throws ContainerException
     */
    public function handleBatch(array $records): void
    {
        $records = $this->recordFilter($records);
        if (!$records) {
            return;
        }

        $this->write($records);
    }

    /**
     * Write file
     *
     * @param array $records
     *
     * @throws ReflectionException
     * @throws ContainerException
     */
    protected function write(array $records): void
    {
        if (Log::getLogger()->isJson()) {
            $records = array_map([$this, 'formatJson'], $records);
        } else {
            $records = array_column($records, 'formatted');
        }

        $messageText = implode("\n", $records) . "\n";

        if (Co::id() <= 0) {
            throw new InvalidArgumentException('Write log file must be under Coroutine!');
        }
		
		if(mb_strlen($messageText)<5000){
                CLog::info($messageText);
        }else{
                CLog::info(mb_substr($messageText, 0, 5000));
        }
    }

    /**
     * Filter record
     *
     * @param array $records
     *
     * @return array
     */
    private function recordFilter(array $records): array
    {
        $messages = [];
        foreach ($records as $record) {
            if (!isset($record['level'])) {
                continue;
            }
            if (!$this->isHandling($record)) {
                continue;
            }

            $record              = $this->processRecord($record);
            $record['formatted'] = $this->getFormatter()->format($record);

            $messages[] = $record;
        }
        return $messages;
    }

    /**
     * @param array $record
     *
     * @return string
     */
    public function formatJson(array $record): string
    {
        unset($record['formatted'], $record['context'], $record['extra']);

        if ($record['datetime'] instanceof \DateTime) {
            $record['datetime'] = $record['datetime']->format('Y-m-d H:i:s.u');
        }

        $record["memory"]=memory_get_usage();
        $record["params"]=serialize($record["params"]);
        //太大参数，影响性能，暂不记录
        if(strlen($record["params"])>1000){
            $params = [
                'query' => [],
            ];
            context()->set('params', $params);
        }

        $s=json_encode($record, JSON_UNESCAPED_UNICODE);
        
        return !empty($s)?$s:"json_encode fail";
    }

    /**
     * Whether to handler log
     *
     * @param array $record
     *
     * @return bool
     */
    public function isHandling(array $record): bool
    {
        if (empty($this->levelValues)) {
            return true;
        }

        return in_array($record['level'], $this->levelValues, true);
    }
}
