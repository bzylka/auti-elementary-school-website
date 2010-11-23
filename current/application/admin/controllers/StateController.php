<?php
/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2010 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */

/**
 * Admin_SlideshowController
 *
 * 管理介面/系統狀態檢查
 */
class Admin_StateController extends Controller
{
    /**
     * 初始Controller
     */
    public function init()
    {
        // 初始Controller
        parent::init();

        // 設定Layout
        $this->_helper->layout->setLayout('admin');
        
        // 檢查權限
        $this->isAllowed('管理介面', true);
    }
    
    /**
     * 顯示系統狀態
     */
    public function indexAction()
    {
        $state = State::getInstance();

        // 設定資料庫路徑
        $table    = new Table_Title();
        $dbConfig = $table->getAdapter()->getConfig();
        $dbFile   = $dbConfig['dbname'];
        unset($table);

        // 設定系統狀態檢查項目
        $state->addValidator('Filesystem', DATA_DIR, State::IS_WRITABLE, 'data資料夾是否可以寫入')
              ->addValidator('Filesystem', PHOTO_DIR, State::IS_WRITABLE, 'photos資料夾是否可以寫入')
              ->addValidator('Filesystem', ROOT_DIR . 'cache/', State::IS_WRITABLE, 'cache資料夾是否可以寫入')
              ->addValidator('Filesystem', $dbFile, State::IS_WRITABLE, '資料庫檔案是否可以寫入')
              ->addValidator('Extension', 'mbstring', State::IS_LOADED, 'mbstring是否載入')
              ->addValidator('Extension', 'iconv', State::IS_LOADED, 'iconv是否載入')
              ->addValidator('Extension', 'pdo_sqlite', State::IS_LOADED, 'pdo_sqlite是否載入')
              ->addValidator('Extension', 'imagick', State::IS_LOADED, 'imagick是否載入')
              ->addValidator('Extension', 'zip', State::IS_LOADED, 'zip是否載入')
              ->addValidator('Ini', 'memory_limit', array(State::BIGGER, '1099M'), 'memory_limit是否大於1100M')
              ->addValidator('Ini', 'post_max_size', array(State::BIGGER, '1049M'), 'post_max_size是否大於1050M')
              ->addValidator('Ini', 'upload_max_filesize', array(State::BIGGER, '1023M'), 'upload_max_filesize是否大於1024M')
              ->addValidator('Ini', 'date.timezone', array(State::EQUAL, 'Asia/Taipei'), 'date.timezone是否設定為Asia/Taipei', State::SUGGESTION)
              ->addValidator('Ini', 'magic_quotes_gpc', array(State::EQUAL, false), 'magic_quotes_gpc是否關閉', State::SUGGESTION)
              ->addValidator('Ini', 'display_errors', array(State::EQUAL, false), 'display_errors是否關閉', State::SUGGESTION);

        if (!$state->isValid()) {
            $this->view->message = '系統狀態有錯誤，請檢查伺服器上PHP的設定';
        }
        
        $this->view->stateMessage = $state->getMessage();
        $this->render('index');
    }
}
?>
