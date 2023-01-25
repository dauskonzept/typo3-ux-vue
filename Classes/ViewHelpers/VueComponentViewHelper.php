<?php

declare(strict_types=1);

namespace SvenPetersen\UX\Vue\ViewHelpers;

use SvenPetersen\FluidStimulus\ViewHelpers\AbstractStimulusViewHelper;

class VueComponentViewHelper extends AbstractStimulusViewHelper
{
    protected $escapeOutput = false;

    private AbstractStimulusViewHelper $stimulusFluidViewHelper;

    public function __construct(AbstractStimulusViewHelper $stimulusFluidViewHelper)
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
