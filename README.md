TYPO3 Extension "typo3-ux-vue"
=================================

## What does it do?
Render Vue components directly in Fluid template

This Extensions enables you to render Vue Components directly in Fluid templates.
It acts as an integration for symfony/ux-vue into TYPO3.

## Prerequsites
To use this extension you have to use Webpack Encore for bundling for frontend assets.

Before you start, make sure you have [Symfony UX configured in your project](https://symfony.com/doc/current/frontend/ux.html).

## Installation
The recommended way to install the extension is by
using [Composer](https://getcomposer.org/). In your Composer based TYPO3 project
root, just run:
<pre>composer require svenpetersen/typo3-ux-vue</pre>

## Setup
Before you start, make sure you have [EXT:typo3_encore](https://github.com/sabbelasichon/typo3_encore).
This extensions integrates [Webpack Encore](https://symfony.com/doc/current/frontend.html) into TYPO3.

Follow the [Symfony UX Vue official documentation](https://symfony.com/bundles/ux-vue/current/index.html).

Additionally:

    # Add this line to your package.json dependencies:
    "@symfony/ux-vue": "file:vendor/symfony/ux-vue/assets"

    # Install react
    $ npm i vue

    # or
    $ yarn add vue

    # Add these lines to your controllers.json:
    "@symfony/ux-vue": {
        "vue": {
            "enabled": true,
            "fetch": "eager"
        }
    }

    # run
    $ npm install --force
    $ npm run watch

    # or
    $ yarn install --force
    $ yarn watch

## Usage
In any fluid template: Just register the Namespace and use the provided ViewHelper to render your component:

    <html xmlns:ux="http://typo3.org/ns/SvenPetersen/UX/Vue/ViewHelpers">
        <div {ux:vueComponent(name:'MyComponent',props:"{'name':'John Doe'}")}></div>
    </html>

## Contributing

Please refer to the [contributing](CONTRIBUTING.md) document included in this
repository.
