<?php/** * 澳底國小網站程式 * * LICENSE * * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt * * @copyright  2008 ottokang * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3 *///設定程式路徑define('ROOT_DIR', dirname(__FILE__) . '/');define('DATA_DIR', ROOT_DIR . 'data/');define('PHOTO_DIR', ROOT_DIR . 'photos/');// 設定網頁Urldefine('BASE_URL', str_replace('\\', '/', dirname($_SERVER['PHP_SELF'])));define('PHOTO_URL', BASE_URL . 'photos/');define('CSS_URL', BASE_URL . 'template/css/');define('IMG_URL', BASE_URL . 'template/img/');define('JAVASCRIPT_URL', BASE_URL . 'template/javascript/');// 設定除錯模式//define('DEBUG_MODE', true);// 設定超級管理者模式//define('ADMIN_MODE', true);// 設定引入路徑set_include_path(ROOT_DIR . 'library/' . PATH_SEPARATOR .                 get_include_path() . PATH_SEPARATOR);// 引入Zend_Loader，設定自動載入需要的類別require_once 'Zend/Loader.php';Zend_Loader::registerAutoload();// 設定時區date_default_timezone_set('Asia/Taipei');// 設定語言環境為UTF-8iconv_set_encoding('internal_encoding', 'UTF-8');mb_internal_encoding('UTF-8');// 設定資料庫Zend_Db_Table::setDefaultAdapter(Zend_Db::factory('PDO_SQLITE',                                                  array('host'   => '127.0.0.1',                                                        'dbname' => DATA_DIR . '2d6b98c0e417a6593a6e26b998f9b07eabca6a83.db')));// 設定LayoutZend_Layout::startMvc(array (    'layoutPath' => ROOT_DIR . 'template/layouts/',    'layout'     => 'default',    'viewSuffix' => 'php'));// 設定Controller$frontController = Zend_Controller_Front::getInstance();$frontController->setBaseUrl(BASE_URL)                ->addModuleDirectory(ROOT_DIR . 'application/')                ->throwExceptions(defined('DEBUG_MODE'))                ->setParam('useDefaultControllerAlways', false);// 設定View$view = new Zend_View();$view->setHelperPath('ViewHelper', 'ViewHelper')     ->setEncoding('UTF-8')     ->doctype('XHTML1_TRANSITIONAL');$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');$viewRenderer->setView($view)             ->setNeverRender()             ->setViewSuffix('php');// dispatch$frontController->dispatch();?>