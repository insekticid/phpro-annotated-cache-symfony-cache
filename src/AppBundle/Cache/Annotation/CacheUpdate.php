<?php
declare(strict_types=1);

namespace AppBundle\Cache\Annotation;

use Phpro\AnnotatedCache\Annotation\CacheAnnotation;

/**
 * @Annotation
 * @Target("METHOD")
 */
final class CacheUpdate extends CacheAnnotation
{
    /**
     * @var int
     */
    public $ttl = 0;

    /**
     * CacheUpdate constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        parent::__construct($values);

        if (isset($values['ttl'])) {
            $this->ttl = (int) $values['ttl'];
        }
    }
}
