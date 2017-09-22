<?php
/**
 * 分页处理
 * User: suruixiang
 * Date: 2017/8/25
 * Time: 下午2:50
 */
namespace Core;

class Page
{
    private $total_num;         //总条数
    private $total_page;        //总页数
    private $page;              //当前页数
    private $page_num;          //每页条数
    private $show_num = 3;
    private $page_key = 'p';    //页码key

    public function __construct($total_num, $page_num = 2)
    {
        $this->total_num = $total_num;
        $this->page_num = $page_num;
        $this->total_page = ceil($this->total_num / $this->page_num);
        $this->page = $this->getPage() > $this->total_page ? $this->total_page : $this->getPage();
    }

    public function show()
    {
        $return = [];
        if ($this->total_page > 1) {
            if ($this->page > 1)
                $return['last'] = $this->page - 1;
            if ($this->page < $this->total_page)
                $return['next'] = $this->page + 1;
            $return['start'] = ($this->page - $this->show_num) > 0 ? $this->page - $this->show_num : 1;
            $return['end']   = ($this->total_page - $this->page) >= $this->show_num ? $this->page + $this->show_num : 	$this->total_page;
        }
        $return['page'] = $this->page;
        $return['total_num'] = $this->total_num;
        $return['total_page'] = $this->total_page;
        $return['url'] = $this->createUrl();

        return $return;
    }

    /**
     * 获取当前页码
     * @return int
     */
    private function getPage()
    {
        return \yaf\Dispatcher::getInstance()->getRequest()->getParam($this->page_key, 1);
    }

    /**
     * 生成分页链接
     * @return string
     */
    private function createUrl()
    {
        $url_string = '';
        $url_data = \yaf\Dispatcher::getInstance()->getRequest()->getParams();
        unset($url_data[$this->page_key]);
        /*if (MODULENAME)
            $url_string = MODULENAME;*/
        $url_string .= '/'.CONTROLLERNAME.'/'.ACTIONNAME.'/';
        foreach ($url_data as $key => $val) {
            $url_string .= "$key/$val/";
        }
        return $url_string;
    }
}