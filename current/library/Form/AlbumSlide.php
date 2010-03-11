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
 * Form_AlbumSlide
 *
 * 隨機相簿展示表單
 */
class Form_AlbumSlide extends Form_Abstract
{
    /**
     * @var object 相簿年份對照
     * access private
     */
    private $_albumYears;
    
    /**
     * @var object checkBox
     * access private
     */
    private $_checkBoxes;
    
    public function init()
    {
        $this->setMethod('post');

        $album = new Table_Album();
        $albumRowset = $album->order('createDate DESC')->getRowset();
        
        foreach ($albumRowset as $albumRow) {
            $this->_checkBoxes[$albumRow->albumYearId][] = new Form_Components_Checkbox('album_' . $albumRow->albumId,
                                                                                        array('label' => $albumRow->albumName . "...[$albumRow->createDate]",
                                                                                              'value' => (int)$albumRow->isSlideShow));
        }

        $albumYear = new Table_AlbumYear();
        $albumYearRowset = $albumYear->getRowset();
        foreach ($albumYearRowset as $albumYearRow) {
            $this->_albumYears[$albumYearRow->albumYearId] = $albumYearRow->albumYearName;
        }
        
        $this->_albumYears[0] = '無年份';
    }
    
    /**
     * 覆載__toString()
     */
    public function __toString()
    {
        if (is_array($this->_checkBoxes)) {
            foreach ($this->_checkBoxes as $yearId => &$checkBoxs) {
                $string .= '<h2>' . $this->_albumYears[$yearId] . '</h2>';
                $string .= '<fieldset><dl>';
                foreach ($checkBoxs as $checkBox) {
                    $string .= $checkBox->render();
                }
                $string .= '</dl></fieldset>';
            }
        } else {
            $string = '目前沒有相簿';
        }
        
        return $string;
    }
}
?>