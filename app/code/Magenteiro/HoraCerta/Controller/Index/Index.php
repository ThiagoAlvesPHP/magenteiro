<?php

namespace Magenteiro\HoraCerta\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Stdlib\DateTime\Timezone;

class Index extends Action
{
    private $timezone;

    public function  __construct(Timezone $timezone, Context $context)
    {
        parent::__construct($context);
        $this->timezone = $timezone;
    }

    public function execute()
    {
        $conteudo = $this->timezone->convertConfigTimeToUtc($this->timezone->date());
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents($conteudo);
        return $result;
    }
}
