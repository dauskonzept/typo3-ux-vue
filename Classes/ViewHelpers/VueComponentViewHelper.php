<?php

declare(strict_types=1);

namespace SvenPetersen\UX\Vue\ViewHelpers;

use Ssch\Typo3Encore\ViewHelpers\Stimulus\AbstractViewHelper;

class VueComponentViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

    public function initializeArguments(): void
    {
        $this->registerArgument('name', 'string', 'Name of the Vue component to render', true);
        $this->registerArgument('props', 'array', 'Props to be passed to the component');
    }

    public function render(): string
    {
        $params = ['component' => $this->arguments['name']];

        if ($this->arguments['props']) {
            $params['props'] = $this->arguments['props'];
        }

        return $this->renderStimulusController('@symfony/ux-vue/vue', $params)->__toString();
    }
}
