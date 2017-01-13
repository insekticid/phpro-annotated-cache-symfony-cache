<?php
declare(strict_types=1);

namespace AppBundle\Cache\Annotation;

use Phpro\AnnotatedCache\Annotation\CacheAnnotation;

/**
 * @Annotation
 * @Target("METHOD")
 */
final class CacheEvict extends CacheAnnotation
{
}
