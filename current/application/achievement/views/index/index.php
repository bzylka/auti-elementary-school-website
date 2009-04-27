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
?>
<?php $this->headTitle($this->fileList['achievementName']) ?>
<?php $this->headLink()->appendStylesheet(CSS_URL . 'achievement.css') ?>
<?php
function printList($fileDirList, $path = null)
{
    foreach ($fileDirList as $folder => $fileDirEntry) {
        if (is_array($fileDirEntry)) {
            $listString .= '<li><span class="folder"><img title="' . $folder . '" alt="' . $folder . '" src="' . IMG_URL . 'mimeType/folder.png" class="mimeType"/>'
                         . $folder
                         . '</span></li>'
                         . '<li><ul>'
                         . printList($fileDirEntry, $path . '/' . $folder)
                         . '</ul></li>';

            
        } else {
            $listString .= '<li><a href="?file=' . urlencode($path . '/' . $fileDirEntry) . '">'
                         . getMimeTypeImage($fileDirEntry)
                         . $fileDirEntry
                         . '</a></li>';

        }
    }
    
    return $listString;
}

function getMimeTypeImage($file)
{
    $fileExtension = strtolower(pathinfo(basename($file), PATHINFO_EXTENSION));
    if (in_array($fileExtension, array('doc', 'txt'))) {
        $mimeTypeFile = 'doc.png';
    } elseif (in_array($fileExtension, array('wav', 'mp3'))) {
        $mimeTypeFile = 'sound.png';
    } else {
        $mimeTypeFile = 'unknown.png';
    }
    $html = '<img class="mimeType" src="'
          . IMG_URL
          . 'mimeType/'
          . $mimeTypeFile
          . '" alt="'
          . basename($file)
          . '" title="'
          . basename($file)
          . '" />';
    
    return $html;
}
?>
<h1><?php echo $this->escape($this->fileList['achievementName']) ?></h1>

<div id="files">
    <ul>
        <?php echo printList($this->fileList['fileList']); ?>
    </ul>
</div>