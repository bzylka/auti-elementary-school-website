<?php
/**
 * 澳底國小網站程式
 *
 * LICENSE
 *
 * 本程式遵循GNU/GPL v3規範，詳情請見http://www.gnu.org/licenses/gpl.txt
 *
 * @copyright  2008 ottokang
 * @license    http://www.gnu.org/licenses/gpl.txt   GNU/GPL License 3
 */

/**
 * Model_Login
 *
 * 登入處理
 */
class Model_Login extends Model_Abstract
{
    /**
     * @var string 資料庫Table類別
     * @access protected
     */
    protected $_tableClass = 'User';
    
    /**
     * @var string 表單類別
     * @access protected
     */
    protected $_formClass = 'Login';
    
    /**
     * 執行登入動作，寫入登入結果和訊息
     * @return bool 結果
     */
    public function login()
    {
        //建立資料庫連線，設定登入檢查欄位
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table_Abstract::getDefaultAdapter());
        $authAdapter->setTableName('user')
                    ->setIdentityColumn('account')
                    ->setCredentialColumn('password');

        //設定登入資料
        $salt = $this->getTable()->columns('salt')
                     ->where('account = ' . Zend_Db_Table_Abstract::getDefaultAdapter()->quote($this->_form->getValue('account')))
                     ->getRowset()->current()->salt;

        $authAdapter->setIdentity($this->_form->getValue('account'))
                    ->setCredential(Hash::generate($this->_form->getValue('password') . $salt));

        //執行登入檢查
        $auth   = Zend_Auth::getInstance();
        $result = $auth->authenticate($authAdapter);
        if ($result->isValid()) {
            //登入成功，寫入登入資料
            $userData = $authAdapter->getResultRowObject(array('userId', 'userName', 'titleId', 'privilegeId'));
            $user = new Table_User();
            $userRow = $user->find($userData->userId)->current();
            $userData->privilegeName = $userRow->findParentRow('Table_Privilege')->privilegeName;
            if ($titleRow = $userRow->findParentRow('Table_Title')) {
                $userData->titleName  = $titleRow->titleName;
                $userData->officeId   = $titleRow->findParentRow('Table_Office')->officeId;
                $userData->officeName = $titleRow->findParentRow('Table_Office')->officeName;
            }
            
            $auth->getStorage()->write($userData);
            return true;
        } else {
            //登入失敗，發出錯誤訊息
            switch ($result->getCode()) {
                case -1:
                    $this->setMessage('帳號/密碼錯誤，請重新輸入');
                    break;
                case -2:
                    $this->setMessage('帳號不存在，請重新輸入');
                    break;
                case -3:
                    $this->setMessage('密碼錯誤，請重新輸入');
                    break;
                case -4:
                    $this->setMessage('無法預期的錯誤，請重新輸入');
                    break;
                case 0:
                    $this->setMessage('一般錯誤，請重新輸入');
                    break;
                }
            return false;
        }
    }
}
?>
