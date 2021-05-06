<?php
declare(strict_types=1);

namespace Pablobae\SimplePopupWidget\Block\Widget;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Widget\Block\BlockInterface;
use Pablobae\SimplePopupWidget\Helper\Configuration as HelperConfiguration;

/**
 * Class SimplePopup widget
 */
class SimplePopup extends Template implements BlockInterface
{
    const WIDGET_OPTION_BLOCK = 'block_id';

    protected $_template = "widget/simplepopup.phtml";
    /**
     * @var HelperConfiguration
     */
    private $helperConfiguration;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * Constructor
     *
     * @param HelperConfiguration $helperConfiguration
     * @param StoreManagerInterface $storeManager
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        HelperConfiguration $helperConfiguration,
        StoreManagerInterface $storeManager,
        Template\Context $context,
        array $data = []
    )
    {
        $this->helperConfiguration = $helperConfiguration;
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve if the extension is enabled by configuration
     *
     * @return bool
     */
    public function isExtensionEnabled(): bool
    {
        return $this->helperConfiguration->isEnabled();
    }

    /**
     * Retrieve extension config value for CustomCSS Class
     * @return string
     */
    public function getDefaultCustomCSSClass(): string
    {
        return $this->helperConfiguration->getCustomCssClass();
    }

    /**
     * Retrieve extension config value for PopupInitTime
     * @return string
     */
    public function getDefaultPopupInitTime(): string
    {
        return $this->helperConfiguration->getPopupInitTime();
    }

    /**
     * Retrieve popup cms static block content
     * @return string
     */
    public function getPopupBlockContent(): string
    {
        $blockId = $this->getWidgetPopupBlockContentId();
        if ($blockId != '') {
            try {
                return $this->getLayout()
                    ->createBlock('Magento\Cms\Block\Block')
                    ->setBlockId($blockId)
                    ->toHtml();
            } catch (LocalizedException $e) {
                $this->_logger->error(__("Popup Block not found."));
            }
        }
        return '';
    }

    /**
     * Retrieve popup Block content ID
     * @return string
     */
    protected function getWidgetPopupBlockContentId(): string
    {
        return $this->getData(self::WIDGET_OPTION_BLOCK);
    }



}
