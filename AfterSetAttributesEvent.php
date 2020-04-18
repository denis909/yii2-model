<?php

namespace denis909\yii;

class AfterSetAttributesEvent extends \yii\base\Event
{

    public $values = [];

    public $safeOnly = true;

}