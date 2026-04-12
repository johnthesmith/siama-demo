<?php
namespace catlair;


/*
    Модуль полезной нагрузки демонстрации исполнителя Worker
*/



require_once LIB . '/web/web_payload.php';
require_once LIB . '/core/web_bot.php';



class DemoApi extends WebPayload
{
    /**************************************************************************
        Методы API
    */



    /*
        Эндпоинт
    */
    public function proc
    (
        string $t = ''
    )
    {
        $this -> setContent
        (
            'proc(' . $t . ');'
            . $this -> summon( 'demo', 'subproc-begin', [ 't' => $t ] ) -> getContent()
            . $this -> summon( 'demo', 'subproc-work', [ 't' => $t ] ) -> getContent()
            . $this -> summon( 'demo', 'subproc-end' ) -> getContent()
        );
        return $this;
    }



    /*
        Метод возвращает hello
    */
    public function subproc_begin
    (
        string $t = ''
    )
    {
        $this -> setContent( 'subproc-begin(' . $t . ');' );
        return $this;
    }



    /*
        Метод возвращает hello
    */
    public function subproc_end()
    {
        $this -> setContent( 'subproc-end();' );
        return $this;
    }



    /*
        Метод возвращает hello
    */
    public function subproc_work()
    {
//        $a = $this -> summon( 'demo', 'subproc-work-a', [] ) -> getContent();
//        $b = $this -> summon( 'demo', 'subproc-work-b' ) -> getContent();
//        $c = $this -> summon( 'demo', 'subproc-work-c' ) -> getContent();
        $this -> setContent( 'subproc-work();' );
        return $this;
    }



    /*
        Метод A
    */
    public function subproc_work_a()
    {
        $this -> setContent( '|a|' );
        return $this;
    }



    /*
        Метод B
    */
    public function subproc_work_b()
    {
        $this -> setContent( 'b' );
        return $this;
    }



    /*
        Метод C
    */
    public function subproc_work_c()
    {
        $this -> setContent( 'c' );
        return $this;
    }
}
