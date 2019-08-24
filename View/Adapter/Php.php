<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 *
 */


namespace houphp\View\Adapter;

use houphp;
use houphp\View\Base;
use houphp\Core\Config;
use houphp\Protocol\Response;
use houphp\Protocol\Request;

class Php extends Base
{
    private $tplFile;

    public function setTpl($tpl)
    {
        $this->tplFile = $tpl;
    }

    public function display()
    {
        Response::sendHttpHeader();
        $tplPath = houphp\Core\Config::getField('project', 'tpl_path', houphp\houphp::getRootPath() . DS . 'template' . DS . 'default' . DS);
        $fileName = $tplPath . $this->tplFile;
        if (!\is_file($fileName)) {
            throw new \Exception("no file {$fileName}");
        }
        if (!empty($this->model) && is_array($this->model)) {
            \extract($this->model);
        }
        if (Request::isLongServer()) {
            \ob_start();
            include "{$fileName}";
            $content = ob_get_contents();
            \ob_end_clean();
            return $content;
        }
        include "{$fileName}";
        return null;
    }


}
