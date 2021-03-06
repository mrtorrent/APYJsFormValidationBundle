Installation
============

## Step 1: Install BazingaExposeTranslationBundle

Please follow the steps given [here](https://github.com/Bazinga/BazingaExposeTranslationBundle/blob/master/README.markdown) to install this bundle.

## Step 2: Download JsFormValidationBundle

Ultimately, the JsFormValidationBundle files should be downloaded to the
`vendor/bundles/APY/JsFormValidationBundle` directory.

This can be done in several ways, depending on your preference. The first
method is the standard Symfony2 method.

**Using the vendors script**

Add the following lines in your `deps` file:

```
[JsFormValidationBundle]
    git=git://github.com/APY/APYJsFormValidationBundle.git
    target=bundles/APY/JsFormValidationBundle
```

Now, run the vendors script to download the bundle:

```bash
$ php bin/vendors install
```

**Using submodules**

If you prefer instead to use git submodules, the run the following:

```bash
$ git submodule add git://github.com/APY/APYJsFormValidationBundle.git vendor/bundles/APY/JsFormValidationBundle
$ git submodule update --init
```

## Step 2: Configure the Autoloader

Add the `APY` namespace to your autoloader:

```php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...
    'APY' => __DIR__.'/../vendor/bundles',
));
```

## Step 3: Enable the bundles

Finally, enable the bundles in the kernel:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new APY\JsFormValidationBundle\APYJsFormValidationBundle(),
    );
}
```

## Next Steps

Now that you have completed the basic installation, you are ready to learn about more advanced features and usages
of the bundle.

The following documents are available:

[Simple Example](https://github.com/APY/APYJsFormValidationBundle/blob/master/Resources/doc/simple_example.md)
