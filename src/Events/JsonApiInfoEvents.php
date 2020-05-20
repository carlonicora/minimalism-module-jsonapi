<?php
namespace CarloNicora\Minimalism\Modules\JsonApi\Events;

use CarloNicora\Minimalism\Services\Logger\Interfaces\LogMessageInterface;
use CarloNicora\Minimalism\Services\Logger\LogMessages\InfoLogMessage;

class JsonApiInfoEvents extends InfoLogMessage
{
    /** @var string  */
    protected string $serviceName = 'module-jsonapi';

    public static function TWIG_ENGINE_INITIALISED() : LogMessageInterface
    {
        return new self(1, 'Twig engine initialised');
    }

    public static function PRE_RENDER_COMPLETED() : LogMessageInterface
    {
        return new self(2, 'Pre render completed successfully');
    }

    public static function DATA_GENERATED() : LogMessageInterface
    {
        return new self(3, 'Data generated successfully');
    }
}