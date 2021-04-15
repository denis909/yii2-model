<?php

namespace denis909\yii;

use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;

class Model extends \yii\base\Model implements ModelInterface
{

    use ModelTrait;
    
    use LoggerAwareTrait;

    public function __construct($config = [])
    {
        parent::__construct($config);

        $this->setLogger(new NullLogger);
    }
    
}