<?php

namespace denis909\yii;

trait ModelTrait
{

    public function getUnsafeAttributes()
    {
        if (property_exists($this, 'unsafeAttributes'))
        {
            return $this->unsafeAttributes;
        }

        return [];
    }

    public function scenarios()
    {
        $return = parent::scenarios();

        $unsafeAttributes = $this->getUnsafeAttributes();

        foreach($return as $scenario => $attributes)
        {
            foreach($unsafeAttributes as $attribute)
            {
                $index = array_search($attribute, $return[$scenario]);

                if ($index !== false)
                {
                    unset($return[$scenario][$index]);
                }
            }
        }

        return $return;
    }

    public function onUnsafeAttribute($name, $value)
    {
        $event = new OnUnsafeAttributeEvent;

        $event->name = $name;

        $event->value = $value;

        $this->trigger(self::EVENT_ON_UNSAFE_ATTRIBUTE, $event);

        parent::onUnsafeAttribute($event->name, $event->value);
    }

    public function afterSetAttributes($values, $safeOnly = true)
    {
        $event = new AfterSetAttributesEvent;

        $event->values = $values;

        $event->safeOnly = $safeOnly;

        $this->trigger(self::EVENT_AFTER_SET_ATTRIBUTES, $event);
    }

    public function setAttributes($values, $safeOnly = true)
    {
        $event = new SetAttributesEvent;

        $event->values = $values;

        $event->safeOnly = $safeOnly;

        $this->trigger(self::EVENT_SET_ATTRIBUTES, $event);

        parent::setAttributes($event->values, $event->safeOnly);

        $this->afterSetAttributes($values, $safeOnly);
    }

    public function safeAttributes()
    {
        $event = new SafeAttributesEvent;

        $event->attributes = parent::safeAttributes();

        $this->trigger(self::EVENT_SAFE_ATTRIBUTES, $event);

        return $event->attributes;
    }

    public function attributes()
    {
        $event = new AttributesEvent;

        $event->attributes = parent::attributes();

        $this->trigger(self::EVENT_ATTRIBUTES, $event);

        return $event->attributes;
    }

    public function attributeHints()
    {
        $event = new AttributeHintsEvent;

        $event->attributeHints = parent::attributeHints();

        $this->trigger(self::EVENT_ATTRIBUTE_HINTS, $event);

        return $event->attributeHints;
    }

    public function rules()
    {
        $event = new RulesEvent;

        $event->rules = parent::rules();

        $this->trigger(self::EVENT_RULES, $event);

        return $event->rules;
    }

    public function attributeLabels()
    {
        $event = new AttributeLabelsEvent;

        $event->attributeLabels = parent::attributeLabels();

        $this->trigger(self::EVENT_ATTRIBUTE_LABELS, $event);

        return $event->attributeLabels;
    }    

}