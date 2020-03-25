<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Cts\Common\Event\Annotation\Parser;

use Cts\Common\Event\Annotation\Mapping\AwsEventHandle;
use Cts\Common\Event\EventRegister;
use ReflectionException;
use Swoft\Annotation\Annotation\Mapping\AnnotationParser;
use Swoft\Annotation\Annotation\Parser\Parser;
use Swoft\Log\Helper\CLog;
use Swoft\Validator\Exception\ValidatorException;
use Swoft\Validator\ValidatorRegister;

/**
 * Class AwsEventHandleParser
 *
 * @AnnotationParser(AwsEventHandle::class)
 */
class AwsEventHandleParser extends Parser
{
    /**
     * @param int $type
     * @param AwsEventHandle $annotationObject
     *
     * @return array
     * @throws ReflectionException
     * @throws ValidatorException
     */
    public function parse(int $type, $annotationObject): array
    {

        if ($type != self::TYPE_METHOD) {
            return [];
        }
        $servoce_name=$annotationObject->getServiceName();
        $event_type=$annotationObject->getEventType();

        if(empty($servoce_name)||empty($event_type)){
            return [];
        }
        EventRegister::registerEventListen($servoce_name,$event_type,[$this->className,$this->methodName]);

        return [];
    }
}
