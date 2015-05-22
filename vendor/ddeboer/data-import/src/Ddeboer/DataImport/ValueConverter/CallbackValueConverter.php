<?php

namespace Ddeboer\DataImport\ValueConverter;

/**
 * Converts item values using a callback
 *
 * @author Markus Bachmann <markus.bachmann@bachi.biz>
 */
class CallbackValueConverter implements ValueConverterInterface
{
    /**
     * @var callable
     */
    private $callback;

    /**
     * Constructor
     *
     * @param callable $callback
     */
    public function __construct($callback)
    {
        if (!is_callable($callback)) {
            throw new \RuntimeException("$callback must be callable");
        }

        $this->callback = $callback;
    }

    /**
     * {@inheritDoc}
     */
    public function convert($input)
    {
        var_dump($input); echo "Hola"; exit();
        return call_user_func($this->callback, $input);
    }
}
