<?php/** * 澳底國小網站程式 * * LICENSE * * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt * * @copyright  2010 ottokang * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3 *//** * Bootstrap * * 啟動程式 */class Bootstrap extends Zend_Application_Bootstrap_Bootstrap{    /**     * 設定view     */    protected function _initView()    {        $view = new Zend_View();        $view->setHelperPath('ViewHelper', 'ViewHelper')             ->setEncoding('UTF-8')             ->doctype('XHTML1_TRANSITIONAL');        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');        $viewRenderer->setView($view)                     ->setNeverRender()                     ->setViewSuffix('php');        return $view;    }}?>