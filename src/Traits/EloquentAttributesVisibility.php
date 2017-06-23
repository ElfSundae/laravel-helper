<?php

namespace ElfSundae\Laravel\Helper\Traits;

/**
 * Add ability for Eloquent to hide or visible attributes via static methods.
 */
trait EloquentAttributesVisibility
{
    /**
     * Set the hidden attributes for the model.
     *
     * @param  array  $hidden
     * @return $this
     */
    abstract public function setHidden(array $hidden);

    /**
     * Set the visible attributes for the model.
     *
     * @param  array  $visible
     * @return $this
     */
    abstract public function setVisible(array $visible);

    /**
     * The shared attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected static $sharedHidden;

    /**
     * The shared attributes that should be visible in serialization.
     *
     * @var array
     */
    protected static $sharedVisible;

    /**
     * Get the shared hidden attributes.
     *
     * @return array|null
     */
    public static function getSharedHidden()
    {
        return static::$sharedHidden;
    }

    /**
     * Set the shared hidden attributes.
     *
     * @param  array|null  $hidden
     * @return void
     */
    public static function setSharedHidden($hidden)
    {
        static::$sharedHidden = $hidden;
    }

    /**
     * Get the shared visible attributes.
     *
     * @return array|null
     */
    public static function getSharedVisible()
    {
        return static::$sharedVisible;
    }

    /**
     * Set the shared visible attributes.
     *
     * @param  array|null  $visible
     * @return void
     */
    public static function setSharedVisible($visible)
    {
        static::$sharedVisible = $visible;
    }

    /**
     * Make all attributes visible.
     *
     * @return void
     */
    public static function makeAllVisible()
    {
        static::setSharedHidden([]);
        static::setSharedVisible([]);
    }

    /**
     * Restore attributes visibility.
     *
     * @return void
     */
    public static function restoreAttributesVisibility()
    {
        static::setSharedHidden(null);
        static::setSharedVisible(null);
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        if (is_array(static::$sharedHidden)) {
            $this->setHidden(static::$sharedHidden);
        }

        if (is_array(static::$sharedVisible)) {
            $this->setVisible(static::$sharedVisible);
        }

        return parent::toArray();
    }
}
