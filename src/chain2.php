<?php






class Request{

    private $_data ;

    private $_successor;

    public function __construct($data, $successor){
        $this->_data = $data;
        $this->_successor = $successor;
    }
}


class Handler{

    protected $_handler; //parent handler

    protected $_successor;

    public function hander(Request $r){
        if ($this->_successor == 0){
            $this->_hander->hander($r);
        }else{
            printf("end haner\r\n");
        }
    }

    protected function hasHander(){
        return $this->_successor == 1 ? true: false;
    }

    public function __construct(Handler $h = null , $_successor = 0){
        $this->_handler = $h;
        $this->_successor = $_successor;
    }
}

class Handler1 extends Handler{

    public function __construct(Handler $h = null, $s= 1){
        parent::__construct($h,$s);
    }

    public function hander(Request $r){
        if ($this->hasHander()){
            printf("handler1 \r\n");
        }else{
            $this->_handler->hander($r);
        }
    }
}

class Handler2 extends Handler{

    public function __construct(Handler $h = null, $s= 2){
        parent::__construct($h,$s);
    }

    public function hander(Request $r){
        if ($this->hasHander()){
            printf("handler2 \r\n");
        }else{
            $this->_handler->hander($r);
        }
    }
}

