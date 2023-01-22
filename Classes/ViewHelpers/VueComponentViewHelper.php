<?php

declare(strict_types=1);

namespace DSKZPT\UX\Vue\ViewHelpers;

use DSKZPT\WebpackEncoreBridge\ViewHelpers\StimulusFluidViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class VueComponentViewHelper extends AbstractViewHelper
{
    protected $escapeOutput = false;

    private StimulusFluidViewHelper $stimulusFluidViewHelper;

    public function __construct(StimulusFluidViewHelper $stimulusFluidViewHelper)
    {
        $this->stimulusFluidViewHelper = $stimulusFluidViewHelper;
    }

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

        return $this->stimulusFluidViewHelper->renderStimulusController('@symfony/ux-vue/vue', $params)->__toString();
    }
}
