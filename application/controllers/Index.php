<?php
/**
 * @name IndexController
 * @author root
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
use Yaf\Controller_Abstract;
use Yaf\Dispatcher;
use zookeeper\ZookeeperClient;
use Yaf\Application;
use Sample\SampleModel;
use Log\Log;
class IndexController extends Yaf\Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/newYaf/index/index/index/name/root 的时候, 你就会发现不同
     */
	public function indexAction($name = "Stranger") {
		//1. fetch query
		$get = $this->getRequest()->getQuery("get", "default value");
		//2. fetch model
        $log = new Log();
        $log->hello();
       // return false;
		$model = new SampleModel();
        $model->selectSample();
		$this->getView()->assign("content", $model->selectSample());
		$this->getView()->assign("name", $name);

		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
	}
    public function oneAction(){
        Yaf\Dispatcher::getInstance()->autoRender(FALSE);
    }
}