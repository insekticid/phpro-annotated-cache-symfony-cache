# How to interact Symfony Cache Component with PhPro Annotation Cache

## Installation

```sh
composer require phpro/annotated-cache-bundle
```

```php
# AppKernel.php
public function registerBundles()
{
    $bundles = [
        // Bundles ....
        new Phpro\AnnotatedCacheBundle\AnnotatedCacheBundle(),
    ];

    return $bundles;
}
```

### Copy my AppBundle to your Symfony project and initialize it
```php
# AppKernel.php
public function registerBundles()
{
    $bundles = [
        // Bundles ....
        new AppBundle\AppBundle(),
    ];

    return $bundles;
}
```

### Copy my services.yml from app/config/services.yml and merge it with yours

```yaml
framework:
    cache:
        app: cache.adapter.filesystem
        default_redis_provider: "redis://localhost"
        default_psr6_provider: ~
        pools:
            app.cache.soap:
                adapter: cache.app
                default_lifetime: 6000

annotated_cache:
    key_generator: phpro.annotated_cache.keygenerator.expressions
    proxy_config:
        cache_dir: '%kernel.cache_dir%/annotated_cache'
        namespace: AnnotatedCacheGeneratedProxy
        #register_autoloader: true
    pools:
        soapClient:
            service: app.cache.soap

services:
    app.soap_client.service:
        class: AppBundle\Repository\ClientRepository
        tags:
          - { name: 'annotated_cache.eligable' }

    phpro.cache.interceptor:
        class: AppBundle\Cache\CacheableInterceptor
        arguments: ['@phpro.annotation_cache.cache.pool_manager', '@phpro.annotated_cache.keygenerator.default']
        tags:
            - { name: 'annotated_cache.interceptor' }

```