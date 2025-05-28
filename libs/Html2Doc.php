<?php
/** 
 * Download HTML content as Word document 
 * Please note this just force the browser to download the html content as a .doc file
 * 
 */
class Html2Doc
{
	var $docFile  = '';
	var $title    = '';
	var $htmlHead = '';
	var $htmlBody = '';

	/** 
	 * Constructor 
	 * 
	 * @return void 
	 */
	function __construct()
	{
		$this->title = '';
		$this->htmlHead = '';
		$this->htmlBody = '';
	}

	/** 
	 * Set the document file name 
	 * 
	 * @param String $docfile  
	 */
	function setDocFileName($docfile)
	{
		$this->docFile = $docfile;
		if (!preg_match("/\.doc$/i", $this->docFile) && !preg_match("/\.docx$/i", $this->docFile)) {
			$this->docFile .= '.doc';
		}
		return;
	}

	/** 
	 * Set the document title 
	 * 
	 * @param String $title  
	 */
	function setTitle($title)
	{
		$this->title = $title;
	}

	/** 
	 * Create The MS Word Document from given HTML 
	 * 
	 * @param String $html :: HTML Content or HTML File Name like path/to/html/file.html 
	 * @param String $file :: Document File Name 
	 * @param Boolean $download :: Wheather to download the file or save the file 
	 * @return boolean  
	 */
	function createDoc($html, $file, $download = true)
{
    $this->setDocFileName($file);

    // CHUYỂN HTML về UTF-8 đúng cách nếu chưa chắc chắn
    $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

    // THÊM META ENCODING (nếu bị thiếu)
    if (stripos($html, '<meta charset=') === false) {
        $html = '<meta charset="UTF-8">' . $html;
    }

    if ($download) {
        @header("Cache-Control: "); // tránh lỗi IE
        @header("Pragma: ");
        @header("Content-Type: application/msword; charset=UTF-8"); // ✅ MIME type chuẩn cho .doc
        @header("Content-Disposition: attachment; filename=\"$this->docFile\"");
        echo $html;
        return true;
    } else {
        return $this->write_file($this->docFile, $html);
    }
}


	/** 
	 * Write the content in the file 
	 * 
	 * @param String $file :: File name to be save 
	 * @param String $content :: Content to be write 
	 * @param [Optional] String $mode :: Write Mode 
	 * @return void 
	 * @access boolean True on success else false 
	 */
	function write_file($file, $content, $mode = "w")
	{
		$fp = @fopen($file, $mode);
		if (!is_resource($fp)) {
			return false;
		}
		fwrite($fp, $content);
		fclose($fp);
		return true;
	}
}