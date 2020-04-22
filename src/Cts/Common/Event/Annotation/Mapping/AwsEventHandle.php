<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Cts\Common\Event\Annotation\Mapping;

use Doctrine\Common\Annotations\Annotation\Attribute;
use Doctrine\Common\Annotations\Annotation\Attributes;
use Doctrine\Common\Annotations\Annotation\Target;
use Swoft\Log\Helper\CLog;

/**
 * Class AwsEventHandle
 *
 * @since 2.0
 *
 * @Annotation
 * @Target("METHOD")
 * @Attributes({
 *     @Attribute("service_name",type="string"),
 *     @Attribute("event_type",type="string")
 * })
 */
class AwsEventHandle
{
    /**
     * @var string
     */
    private $service_name = '';

    /**
     * @var string
     */
    private $event_type = '';

    /**
     * StringType constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        if (isset($values['event_type'])) {
            $this->event_type = $values['event_type'];
        }
        if (isset($values['service_name'])) {
            $this->service_name = $values['service_name'];
        }
    }

    /**
     * @return string
     */
    public function getEventType(): string
    {
        return $this->event_type;
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->service_name;
    }
}
