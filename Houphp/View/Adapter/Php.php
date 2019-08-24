<?php
/**
 * User: shenzhe
 * Date: 13-6-17
 *
 */


namespace Houphp\View\Adapter;

use Houphp;
use Houphp\View\Base;
use Houphp\Core\Config;
use Houphp\Protocol\Response;
use Houphp\Protocol\Request;

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
        $tplPath = Houphp\Core\Config::getField('project', 'tpl_path', Houphp\Houphp::getRootPath() . DS . 'template' . DS . 'default' . DS);
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
