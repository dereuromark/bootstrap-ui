<?php
declare(strict_types=1);

namespace BootstrapUI\View\Widget;

use BootstrapUI\View\Helper\OptionsAwareTrait;
use Cake\View\Form\ContextInterface;
use Cake\View\Widget\ButtonWidget as CoreButtonWidget;

class ButtonWidget extends CoreButtonWidget
{
    use OptionsAwareTrait;

    /**
     * @var array
     * @deprecated This property is no longer used.
     * @see OptionsAwareTrait::applyButtonStyles
     */
    protected array $_styles = [
        'primary',
        'secondary',
        'success',
        'warning',
        'danger',
        'info',
        'light',
        'dark',
        'link',
    ];

    /**
     * Renders a button.
     *
     * @param array $data The data to build a button with.
     * @param \Cake\View\Form\ContextInterface $context The current form context.
     * @return string
     */
    public function render(array $data, ContextInterface $context): string
    {
        $data = $this->applyButtonClasses($data);

        return parent::render($data, $context);
    }
}
