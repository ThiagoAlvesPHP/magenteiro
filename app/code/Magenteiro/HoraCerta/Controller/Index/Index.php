<?php

namespace Magenteiro\HoraCerta\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Stdlib\DateTime\Timezone;

class Index implements HttpGetActionInterface
{
    private $timezone;
    private $resultFactory;

    public function  __construct(Timezone $timezone, ResultFactory $resultFactory)
    {
        $this->timezone = $timezone;
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        $conteudo = $this->timezone->convertConfigTimeToUtc($this->timezone->date());
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $result->setContents($conteudo);
        return $result;
    }
}
