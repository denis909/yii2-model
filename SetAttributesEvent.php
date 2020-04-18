<?php

namespace denis909\yii;

class SetAttributesEvent extends \yii\base\Event
{

    public $values = [];

    public $safeOnly = true;

}