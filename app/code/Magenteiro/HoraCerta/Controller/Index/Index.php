<?php

namespace Magenteiro\HoraCerta\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Stdlib\DateTime\Timezone;

class Index implements HttpGetActionInterface
{
    private $timezone;

    public function  __construct(Timezone $timezone)
    {
        $this->timezone = $timezone;
    }

    public function execute()
    {
        // echo $this->timezone->getConfigTimezone();

        echo $this->timezone->convertConfigTimeToUtc($this->timezone->date());
        exit;
    }
}
