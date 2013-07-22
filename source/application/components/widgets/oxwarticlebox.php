<?php

/**
 *    This file is part of OXID eShop Community Edition.
 *
 *    OXID eShop Community Edition is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    OXID eShop Community Edition is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @package   views
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eShop CE
 */

/**
 * Article box widget
 */
class oxwArticleBox extends oxWidget
{
    /**
     * Names of components (classes) that are initiated and executed
     * before any other regular operation.
     * User component used in template.
     * @var array
     */
    protected $_aComponentNames = array( 'oxcmp_cur' => 1, 'oxcmp_user' => 1, 'oxcmp_lang' => 1 );

    /**
     * Current class template name.
     * @var string
     */
    protected $_sTemplate = 'widget/product/boxproduct.tpl';


    /**
     * Renders template based on widget type or just use directly passed path of template
     *
     * @return string
     */
    public function render()
    {
        parent::render();

        $sWidgetType = $this->getViewParameter('sWidgetType');
        $sListType   = $this->getViewParameter('sListType');

        if ($sWidgetType && $sListType) {
            $this->_sTemplate = "widget/" . $sWidgetType . "/" . $sListType . ".tpl";
        }

        $sForceTemplate = $this->getViewParameter('oxwtemplate');
        if ($sForceTemplate) {
            $this->_sTemplate = $sForceTemplate;
        }

        return $this->_sTemplate;
    }

    /**
     * Get product article
     *
     * @return oxArticle
     */
    public function getBoxProduct()
    {
        $sId = $this->getViewParameter('sProductId');

        $oArticle = oxNew( 'oxArticle' );
        $oArticle->load($sId);

        return $oArticle;
    }

    /**
     * Get link of current view
     *
     * @return string
     */
    public function getParentLink()
    {
        $sTopActiveClassName = $this->getViewConfig()->getTopActiveClassName();
        return oxNew($sTopActiveClassName)->getLink($iLang);
    }
}