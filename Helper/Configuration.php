<?php
declare(strict_types=1);

namespace Pablobae\SimplePopupWidget\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class Configuration provided  methods to retrieve the configuration of the extension
 */
class Configuration extends AbstractHelper
{
    const XML_PATH_SECTION = 'simplepopupwidget/';
    const XML_PATH_GROUP_STATUS = 'pablobae_simplepopupwidget_status/';
    const XML_PATH_GROUP_DESIGN = 'pablobae_simplepopupwidget_design/';
    const XML_PATH_GROUP_BEHAVIOR = 'pablobae_simplepopupwidget_behavior/';
    const XML_PATH_FIELD_STATUS_STATUS = 'pablobae_simplepopupwidget_status_status';
    const XML_PATH_FIELD_DESIGN_CSS_CUSTOM_CLASS = 'pablobae_simplepopupwidget_design_customcssclass';
    const XML_PATH_GROUP_BEHAVIOR_POPUPINITTIME = 'pablobae_simplepopupwidget_behavior_popupinittime';

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * Configuration constructor.
     * @param StoreManagerInterface $storeManager
     * @param Context $context
     */
    public function __construct(
        StoreManagerInterface $storeManager,
        Context $context
    )
    {
        parent::__construct($context);
        $this->storeManager = $storeManager;
    }

    /**
     * Retrieve config value
     *
     * @param string $fieldPath
     * @param int|null $storeId
     * @return mixed
     */
    public function getConfigValue(string $fieldPath, int $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $fieldPath,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Retrieve if the extension is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        $isEnabled = false;
        $fieldPath = self::XML_PATH_SECTION . self::XML_PATH_GROUP_STATUS . self::XML_PATH_FIELD_STATUS_STATUS;

        try {
            $storeId = $this->storeManager->getStore()->getId();
            $value = $this->getConfigValue($fieldPath, (int)$storeId);
            if ($value !== null) {
                $isEnabled = (bool)$value;
            }
        } catch (NoSuchEntityException $e) {
            $this->_logger->critical($e->getMessage());
        }
        return $isEnabled;
    }

    /**
     * Retrieve custom CSS class
     *
     * @return string
     */
    public function getCustomCssClass(): string
    {
        $customCssClass = '';
        $fieldPath = self::XML_PATH_SECTION . self::XML_PATH_GROUP_DESIGN .
            self::XML_PATH_FIELD_DESIGN_CSS_CUSTOM_CLASS;

        try {
            $storeId = $this->storeManager->getStore()->getId();
            $value = $this->getConfigValue($fieldPath, (int)$storeId);
            if ($value !== null) {
                $customCssClass = $value;
            }
        } catch (NoSuchEntityException $e) {
            $this->_logger->critical($e->getMessage());
        }

        return $customCssClass;
    }

    /**
     * Retrieve popup init time
     *
     * @return string
     */
    public function getPopupInitTime(): string
    {
        $time = '';
        $fieldPath = self::XML_PATH_SECTION . self::XML_PATH_GROUP_BEHAVIOR
            . self::XML_PATH_GROUP_BEHAVIOR_POPUPINITTIME;

        try {
            $value = $this->getConfigValue($fieldPath, (int)$this->storeManager->getStore()->getId());
            if ($value !== null) {
                $time = $value;
            }
        } catch (NoSuchEntityException $e) {
            $this->_logger->critical($e->getMessage());
        }

        return $time;
    }
}
