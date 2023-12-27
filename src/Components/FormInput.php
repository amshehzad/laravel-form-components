<?php

namespace ProtoneMedia\LaravelFormComponents\Components;

class FormInput extends Component
{
    use HandlesValidationErrors;
    use HandlesDefaultAndOldValue;

    public string $name;
    public string $label;
    public string $type;
    public bool $floating;
    public string $wrapperClass;
    public bool $autoresize;

    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $name,
        string $label = '',
        string $type = 'text',
        $bind = null,
        $default = null,
        $language = null,
        bool $showErrors = true,
        bool $floating = false,
        string $wrapperClass = '',
        bool $autoresize = true,
    ) {
        $this->name       = self::convertDotToArray($name);
        $this->label      = $label;
        $this->type       = $type;
        $this->showErrors = $showErrors;
        $this->floating   = $floating && $type !== 'hidden';
        $this->wrapperClass   = $wrapperClass;
        $this->autoresize   = $autoresize;

        if ($language) {
            $this->name = "{$name}[{$language}]";
        }

        $this->setValue($name, $bind, $default, $language);
    }
}
