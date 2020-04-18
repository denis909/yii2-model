<?php

namespace denis909\yii;

class ModelInterface
{

    const EVENT_ATTRIBUTE_HINTS = 'attributeHints';

    const EVENT_ATTRIBUTE_LABELS = 'attributeLabels';
    
    const EVENT_RULES = 'rules';

    const EVENT_ATTRIBUTES = 'attributes';
    
    const EVENT_SAFE_ATTRIBUTES = 'safeAttributes';

    const EVENT_ON_UNSAFE_ATTRIBUTE = 'onUnsafeAttribute';
    
    const EVENT_SET_ATTRIBUTES = 'setAttributes';

}