<?php
declare(strict_types=1);

namespace BootstrapUI\Test\TestCase\View\Helper\FormHelper\HorizontalAlign;

use BootstrapUI\Test\TestCase\View\Helper\FormHelper\AbstractFormHelperTest;
use DateTime;

class DateTimeControlTest extends AbstractFormHelperTest
{
    public function testHorizontalAlignDateTimeControl()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = new DateTime('now');

        $result = $this->Form->control('created', [
            'type' => 'datetime-local',
            'value' => $now->format('Y-m-d H:i:s'),
        ]);
        $expected = [
            ['div' => ['class' => 'form-group row datetime-local']],
                ['label' => ['class' => 'col-form-label col-sm-5', 'for' => 'created']],
                    'Created',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                    'input' => [
                        'type' => 'datetime-local',
                        'name' => 'created',
                        'id' => 'created',
                        'class' => 'form-control',
                        'value' => $now->format('Y-m-d H:i:s'),
                    ],
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlWithDisabledLabel()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = new DateTime('now');

        $result = $this->Form->control('created', [
            'type' => 'datetime-local',
            'value' => $now->format('Y-m-d H:i:s'),
            'label' => false,
        ]);
        $expected = [
            ['div' => ['class' => 'form-group row datetime-local']],
                ['div' => ['class' => 'col-sm-7']],
                    'input' => [
                        'type' => 'datetime-local',
                        'name' => 'created',
                        'id' => 'created',
                        'class' => 'form-control',
                        'value' => $now->format('Y-m-d H:i:s'),
                    ],
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlWithCustomLabel()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = new DateTime('now');

        $result = $this->Form->control('created', [
            'type' => 'datetime-local',
            'value' => $now->format('Y-m-d H:i:s'),
            'label' => 'Custom Label',
        ]);
        $expected = [
            ['div' => ['class' => 'form-group row datetime-local']],
                ['label' => ['class' => 'col-form-label col-sm-5', 'for' => 'created']],
                    'Custom Label',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                    'input' => [
                        'type' => 'datetime-local',
                        'name' => 'created',
                        'id' => 'created',
                        'class' => 'form-control',
                        'value' => $now->format('Y-m-d H:i:s'),
                    ],
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlWithCustomLabelOptions()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = new DateTime('now');

        $result = $this->Form->control('created', [
            'type' => 'datetime-local',
            'value' => $now->format('Y-m-d H:i:s'),
            'label' => [
                'class' => 'custom-label-class',
                'foo' => 'bar',
                'text' => 'Custom Label',
            ],
        ]);
        $expected = [
            ['div' => ['class' => 'form-group row datetime-local']],
                ['label' => ['class' => 'custom-label-class col-form-label col-sm-5', 'foo' => 'bar', 'for' => 'created']],
                    'Custom Label',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                    'input' => [
                        'type' => 'datetime-local',
                        'name' => 'created',
                        'id' => 'created',
                        'class' => 'form-control',
                        'value' => $now->format('Y-m-d H:i:s'),
                    ],
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlWithCustomLabelTemplateIsBackwardsCompatible()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = new DateTime('now');

        $result = $this->Form->control('created', [
            'type' => 'datetime-local',
            'value' => $now->format('Y-m-d H:i:s'),
            'templates' => [
                'datetimeContainer' =>
                    '<div{{containerAttrs}} class="{{containerClass}}form-group row {{type}}{{required}}" role="group" ' .
                        'aria-labelledby="{{groupId}}">{{content}}</div>',
                'datetimeLabel' =>
                    '<label id="{{groupId}}" class="col-form-label %s" back="compat">{{text}}{{tooltip}}</label>',
            ],
        ]);
        $expected = [
            ['div' => [
                'class' => 'form-group row datetime-local',
                'role' => 'group',
                'aria-labelledby' => 'created-group-label',
            ]],
                ['label' => [
                    'id' => 'created-group-label',
                    'class' => 'col-form-label %s',
                    'back' => 'compat',
                ]],
                    'Created',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                    'input' => [
                        'type' => 'datetime-local',
                        'name' => 'created',
                        'id' => 'created',
                        'class' => 'form-control',
                        'value' => $now->format('Y-m-d H:i:s'),
                    ],
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlWithHelp()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = time();

        $result = $this->Form->control('created', [
            'type' => 'time',
            'value' => $now,
            'help' => 'Help text',
        ]);
        $expected = [
            ['div' => ['class' => 'form-group row time']],
                ['label' => ['class' => 'col-form-label col-sm-5', 'for' => 'created']],
                    'Created',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                    'input' => [
                        'type' => 'time',
                        'name' => 'created',
                        'id' => 'created',
                        'class' => 'form-control',
                        'step' => '1',
                        'value' => date('H:i:s', $now),
                    ],
                    ['small' => ['class' => 'form-text text-muted']],
                        'Help text',
                    '/small',
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlWithHelpOptions()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = time();

        $result = $this->Form->control('created', [
            'type' => 'time',
            'value' => $now,
            'help' => [
                'foo' => 'bar',
                'content' => 'Help text',
            ],
        ]);
        $expected = [
            ['div' => ['class' => 'form-group row time']],
                ['label' => ['class' => 'col-form-label col-sm-5', 'for' => 'created']],
                    'Created',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                    'input' => [
                        'type' => 'time',
                        'name' => 'created',
                        'id' => 'created',
                        'class' => 'form-control',
                        'step' => '1',
                        'value' => date('H:i:s', $now),
                    ],
                    ['small' => ['foo' => 'bar', 'class' => 'form-text text-muted']],
                        'Help text',
                    '/small',
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlWithTooltip()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = time();

        $result = $this->Form->control('created', [
            'type' => 'time',
            'value' => $now,
            'tooltip' => 'Tooltip text',
        ]);
        $expected = [
            ['div' => ['class' => 'form-group row time']],
                ['label' => ['class' => 'col-form-label col-sm-5', 'for' => 'created']],
                    'Created ',
                    'span' => [
                        'data-toggle' => 'tooltip',
                        'title' => 'Tooltip text',
                        'class' => 'fas fa-info-circle',
                    ],
                    '/span',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                'input' => [
                    'type' => 'time',
                    'name' => 'created',
                    'id' => 'created',
                    'class' => 'form-control',
                    'step' => '1',
                    'value' => date('H:i:s', $now),
                ],
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlWithError()
    {
        $this->article['errors'] = [
            'created' => ['error message'],
        ];
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = new DateTime('now');

        $result = $this->Form->control('created', [
            'type' => 'datetime-local',
            'value' => $now->format('Y-m-d H:i:s'),
        ]);
        $expected = [
            ['div' => [
                'class' => 'form-group row datetime-local is-invalid',
            ]],
                ['label' => ['class' => 'col-form-label col-sm-5', 'for' => 'created']],
                    'Created',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                    'input' => [
                        'type' => 'datetime-local',
                        'name' => 'created',
                        'id' => 'created',
                        'aria-invalid' => 'true',
                        'class' => 'is-invalid form-control',
                        'value' => $now->format('Y-m-d H:i:s'),
                    ],
                    ['div' => ['class' => 'invalid-feedback']],
                        'error message',
                    '/div',
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlContainerOptions()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = new DateTime('now');

        $result = $this->Form->control('created', [
            'type' => 'datetime-local',
            'value' => $now->format('Y-m-d H:i:s'),
            'container' => [
                'class' => 'container-class',
                'attribute' => 'container-attribute',
            ],
        ]);
        $expected = [
            ['div' => [
                'attribute' => 'container-attribute',
                'class' => 'container-class form-group row datetime-local',
            ]],
                ['label' => ['class' => 'col-form-label col-sm-5', 'for' => 'created']],
                    'Created',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                    'input' => [
                        'type' => 'datetime-local',
                        'name' => 'created',
                        'id' => 'created',
                        'class' => 'form-control',
                        'value' => $now->format('Y-m-d H:i:s'),
                    ],
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlContainerOptionsWithError()
    {
        $this->article['errors'] = [
            'created' => ['error message'],
        ];
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = new DateTime('now');

        $result = $this->Form->control('created', [
            'type' => 'datetime-local',
            'value' => $now->format('Y-m-d H:i:s'),
            'container' => [
                'class' => 'container-class',
                'attribute' => 'container-attribute',
            ],
        ]);
        $expected = [
            ['div' => [
                'attribute' => 'container-attribute',
                'class' => 'container-class form-group row datetime-local is-invalid',
            ]],
                ['label' => ['class' => 'col-form-label col-sm-5', 'for' => 'created']],
                    'Created',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                    'input' => [
                        'type' => 'datetime-local',
                        'name' => 'created',
                        'id' => 'created',
                        'aria-invalid' => 'true',
                        'class' => 'is-invalid form-control',
                        'value' => $now->format('Y-m-d H:i:s'),
                    ],
                    ['div' => ['class' => 'invalid-feedback']],
                        'error message',
                    '/div',
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlDate()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = time();

        $result = $this->Form->control('created', [
            'type' => 'date',
            'value' => $now,
        ]);
        $expected = [
            ['div' => ['class' => 'form-group row date']],
                ['label' => ['class' => 'col-form-label col-sm-5', 'for' => 'created']],
                    'Created',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                'input' => [
                    'type' => 'date',
                    'name' => 'created',
                    'id' => 'created',
                    'class' => 'form-control',
                    'value' => date('Y-m-d', $now),
                ],
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlTime()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $now = time();

        $result = $this->Form->control('created', [
            'type' => 'time',
            'value' => $now,
        ]);
        $expected = [
            ['div' => ['class' => 'form-group row time']],
                ['label' => ['class' => 'col-form-label col-sm-5', 'for' => 'created']],
                    'Created',
                '/label',
                ['div' => ['class' => 'col-sm-7']],
                'input' => [
                    'type' => 'time',
                    'name' => 'created',
                    'id' => 'created',
                    'class' => 'form-control',
                    'step' => '1',
                    'value' => date('H:i:s', $now),
                ],
                '/div',
            '/div',
        ];
        $this->assertHtml($expected, $result);
    }

    public function testHorizontalAlignDateTimeControlCustomContainerTemplateViaTemplater()
    {
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $result = $this->Form->control('created', [
            'type' => 'datetime',
        ]);
        $this->assertStringContainsString('<div class="form-group row datetime">', $result);

        $result = $this->Form->control('created', [
            'type' => 'date',
        ]);
        $this->assertStringContainsString('<div class="form-group row date">', $result);

        $result = $this->Form->control('created', [
            'type' => 'time',
        ]);
        $this->assertStringContainsString('<div class="form-group row time">', $result);

        $this->Form->setTemplates([
            'datetimeContainer' => '<div class="custom datetimeContainer {{type}}{{required}}" role="group" aria-labelledby="{{groupId}}">{{content}}</div>',
            'dateContainer' => '<div class="custom dateContainer {{type}}{{required}}" role="group" aria-labelledby="{{groupId}}">{{content}}</div>',
            'timeContainer' => '<div class="custom timeContainer {{type}}{{required}}" role="group" aria-labelledby="{{groupId}}">{{content}}</div>',
        ]);
        $result = $this->Form->control('created', [
            'type' => 'datetime',
        ]);
        $this->assertStringContainsString('<div class="custom datetimeContainer datetime" role="group" aria-labelledby="created-group-label">', $result);

        $result = $this->Form->control('created', [
            'type' => 'date',
        ]);
        $this->assertStringContainsString('<div class="custom dateContainer date" role="group" aria-labelledby="created-group-label">', $result);

        $result = $this->Form->control('created', [
            'type' => 'time',
        ]);
        $this->assertStringContainsString('<div class="custom timeContainer time" role="group" aria-labelledby="created-group-label">', $result);
    }

    public function testHorizontalAlignDateTimeControlCustomContainerErrorTemplateViaOptions()
    {
        $this->article['errors'] = [
            'created' => [
                'foo' => 'bar',
            ],
        ];
        $this->Form->create($this->article, [
            'align' => [
                'sm' => [
                    'left' => 5,
                    'middle' => 7,
                ],
            ],
        ]);

        $result = $this->Form->control('created', [
            'type' => 'datetime',
        ]);
        $this->assertStringContainsString('<div class="form-group row datetime is-invalid">', $result);

        $result = $this->Form->control('created', [
            'type' => 'date',
        ]);
        $this->assertStringContainsString('<div class="form-group row date is-invalid">', $result);

        $result = $this->Form->control('created', [
            'type' => 'time',
        ]);
        $this->assertStringContainsString('<div class="form-group row time is-invalid">', $result);

        $result = $this->Form->control('created', [
            'type' => 'datetime',
            'templates' => [
                'datetimeContainerError' => '<div class="custom datetimeContainerError {{type}}{{required}}" role="group" aria-labelledby="{{groupId}}">{{content}}</div>',
            ],
        ]);
        $this->assertStringContainsString('<div class="custom datetimeContainerError datetime" role="group" aria-labelledby="created-group-label">', $result);

        $result = $this->Form->control('created', [
            'type' => 'date',
            'templates' => [
                'dateContainerError' => '<div class="custom dateContainerError {{type}}{{required}}" role="group" aria-labelledby="{{groupId}}">{{content}}</div>',
            ],
        ]);
        $this->assertStringContainsString('<div class="custom dateContainerError date" role="group" aria-labelledby="created-group-label">', $result);

        $result = $this->Form->control('created', [
            'type' => 'time',
            'templates' => [
                'timeContainerError' => '<div class="custom timeContainerError {{type}}{{required}}" role="group" aria-labelledby="{{groupId}}">{{content}}</div>',
            ],
        ]);
        $this->assertStringContainsString('<div class="custom timeContainerError time" role="group" aria-labelledby="created-group-label">', $result);
    }
}
