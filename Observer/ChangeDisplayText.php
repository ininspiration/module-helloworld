<?php

namespace Huang\HelloWorld\Observer;

use Magento\Framework\Event\ObserverInterface;

class ChangeDisplayText implements ObserverInterface
{
    public function execute(
        \Magento\Framework\Event\Observer $observer
    )
    {
        $textDisplay = $observer->getData('textDisplay');

        $time = time();
        echo "事件处理中 ...... {$time}<br/>";
        echo "事件处理后的内容：";

        if ($textDisplay) {
            //$textDisplay->setText('事件处理成功，内容已经修改。');
            $textDisplay->setText($textDisplay->getText() . "!!!");
        }

        return $this;
    }
}
