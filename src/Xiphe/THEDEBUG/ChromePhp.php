<?php

namespace Xiphe\THEDEBUG;

class ChromePhp extends \ChromePhp {
	public $backtrace = '';

	private function __construct()
    {
        $this->_php_version = phpversion();
        $this->_timestamp = $this->_php_version >= 5.1 ? $_SERVER['REQUEST_TIME'] : time();
        $this->_json['request_uri'] = $_SERVER['REQUEST_URI'];
    }

	protected function _addRow(array $logs, $backtrace, $type)
    {
    	parent::_addRow($logs, $this->backtrace, $type);
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}