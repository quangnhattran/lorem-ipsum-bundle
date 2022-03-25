# Hello LoremIpsumBundle!

LoremIpsumBundle is a way for you to generate "fake text" into
your Symfony application, but with *just* a little bit more joy
than your normal lorem ipsum.

Install the package with:

```console
composer require knpuniversity/lorem-ipsum-bundle --dev
```

And... that's it! If you're *not* using Symfony Flex, you'll also
need to enable the `KnpU\LoremIpsumBundle\KnpULoremIpsumBundle`
in your `AppKernel.php` file.

## Usage

This bundle provides a single service for generating fake text, which
you can autowire by using the `KnpUIpsum` type-hint:

