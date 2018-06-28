<?php

namespace Onepcs\SubCategoryRenderer\Block;

use \Magento\Framework\App\ObjectManager;

class SubCategoryRenderer extends \Magento\Framework\View\Element\Template
{

    protected $customerSession;
    protected $_categoryHelper;
    protected $_context;

    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Catalog\Model\Product\Visibility $visibility,
        \Magento\Reports\Model\Product\Index\Factory $factory,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Catalog\Model\CategoryRepository $categoryRepository,
        array $data = []
    )
    {
        $om = ObjectManager::getInstance();
        $this->_context = $context;
        $this->_categoryHelper = $categoryHelper;
        $this->_categoryRepository = $categoryRepository;
        parent::__construct($context, $data);
    }

    /**
     * Get category object
     * Using $_categoryRepository
     *
     * @return \Magento\Catalog\Model\Category
     */
    public function getCategoryById($categoryId)
    {
        return $this->_categoryRepository->get($categoryId);
    }

    public function getCurrentCategory()
    {
        return $this->_context->getRegistry()->registry('current_category');
    }

    public function getSubCats()
    {
        return $this->getCurrentCategory()->getChildren();
    }

}
