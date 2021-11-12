<?php

namespace Huang\HelloWorld\Model\Indexer;

class Test implements \Magento\Framework\Indexer\ActionInterface, \Magento\Framework\Mview\ActionInterface
{
    protected $_logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->_logger = $logger;
    }

    /*
     * Used by mview, allows process indexer in the "Update on schedule" mode
     *
     * 数据表更新时会运行这个方法
     */
    public function execute($ids)
    {
        $this->_logger->warning("============================== execute ==============================");
        $this->_logger->warning(json_encode(func_get_args()));
        $this->_logger->warning("============================== execute ==============================");

        //code here!
    }

    /*
     * Will take all of the data and reindex
     * Will run when reindex via command line
     *
     * 手动运行命令时会执行这个方法
     */
    public function executeFull()
    {
        $this->_logger->warning("============================== executeFull ==============================");
        $this->_logger->warning(json_encode(func_get_args()));
        $this->_logger->warning("============================== executeFull ==============================");

        //code here!
    }

    /*
     * Works with a set of entity changed (may be massaction)
     */
    public function executeList(array $ids)
    {
        $this->_logger->warning("============================== executeList ==============================");
        $this->_logger->warning(json_encode(func_get_args()));
        $this->_logger->warning("============================== executeList ==============================");

        //code here!
    }

    /*
     * Works in runtime for a single entity using plugins
     */
    public function executeRow($id)
    {
        $this->_logger->warning("============================== executeRow ==============================");
        $this->_logger->warning(json_encode(func_get_args()));
        $this->_logger->warning("============================== executeRow ==============================");

        //code here!
    }
}