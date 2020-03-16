<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Cts\Common\Command;

use Cts\Common\Aws\AwsSsm;
use Swoft\Apollo\Config;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\BeanFactory;
use Swoft\Co;
use Swoft\Console\Annotation\Mapping\Command;
use Swoft\Console\Annotation\Mapping\CommandMapping;
use Swoft\Exception\SwoftException;
use Swoft\Log\Helper\CLog;
use Swoft\WebSocket\Server\WebSocketServer;
use Throwable;

/**
 * Class ConfigCommand
 *
 * @since 2.0
 *
 * @Command("config", desc="this is an agent for Aws params store")
 */
class AwsConfigCommand
{
    /**
     * @Inject()
     *
     * @var Config
     */
    private $config;

    /**
     * @CommandMapping(name="import")
     */
    public function index(): void
    {
        /** @var AwsSsm $AwsSsm */
        $AwsSsm = BeanFactory::getBean("AwsSsm");
        $data = $AwsSsm->getParmas(config("aws_params_name").config("service"), true);
        CLog::info($data[0]["Value"]);
        $configArrData=\GuzzleHttp\json_decode($data[0]['Value'],true);
        $this->updateConfigFile($configArrData);
    }

    /**
     * @param array $data
     *
     * @throws SwoftException
     */
    public function updateConfigFile(array $data): void
    {
        $namespace = "aws_params";
        $configFile = sprintf('@config/%s.php', $namespace);

        $content = '<?php return ' . var_export($data, true) . ';';
        Co::writeFile(alias($configFile), $content, FILE_NO_DEFAULT_CONTEXT);

        CLog::info('Aws Parmas update success！');

        /** @var HttpServer $server */
//        $server = bean('httpServer');
//        $server->restart();

        //            /** @var ServiceServer $server */
        //            $server = bean('rpcServer');
        //            $server->restart();

//        /** @var WebSocketServer $server */
//        $server = bean('wsServer');
//        $server->restart();

    }
}
