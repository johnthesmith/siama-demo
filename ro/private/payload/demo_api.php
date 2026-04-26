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
        Методы API a
    */



    /*
        Эндпоинт возвращает собранный контент
        Передает полное состояние вызываемым компонентам
        Использует их как черные ящики формирующие данные
    */
    public function a
    (
        string $t = '?'
    )
    {
        return $this
        -> setContent( '|a-'. $t.'|' )
        -> summon( 'demo', 'aa', [ 't' => $t ] )
        -> summon( 'demo', 'ab', [ 't' => $t ] )
        -> summon( 'demo', 'ac', [ 't' => $t ] )
        ;
    }




    /*
        Метод возвращает модифицированнйы конент
    */
    public function aa
    (
        string $t = '?'
    )
    {
        return $this
        -> setContent( $this -> getContent() . '|aa-'. $t .'|' )
        -> summon( 'demo', 'aaa', [ 't' => $t ] )
        ;
    }




    /*
        Метод возвращает модифицированнйы конент
    */
    public function aaa
    (
        string $t = '?'
    )
    {
        return $this
        -> setContent( $this -> getContent() . '|aaa-'. $t .'|' )
        ;
    }



    /*
        Метод возвращает модифицированный контент
        Не передает состояние вызываемым компонентам
    */
    public function ab
    (
        string $t = '?'
    )
    {
        return $this -> setContent
        (
            $this -> getContent() . '|ab-'. $t .'|'
            . $this -> invoke( 'demo', 'aba', [ 't' => $t ] ) -> getContent()
            . $this -> invoke( 'demo', 'abb', [ 't' => $t ] ) -> getContent()
            . $this -> invoke( 'demo', 'abc', [ 't' => $t ] ) -> getContent()
        );
    }



    /*
        Метод возвращает обработанный конетнте
    */
    public function ac
    (
        string $t = '?'
    )
    {
        return $this
        -> setContent( $this -> getContent() . '|ac-' . $t . '|' );
    }



    /*
        Метод aba
    */
    public function aba
    (
        string $t = '?'
    )
    {
        $this -> setContent( '|aba-' . $t . '|' );
        return $this;
    }



    /*
        Метод abb
    */
    public function abb
    (
        string $t = '?'
    )
    {
        $this -> setContent( '|abb-' . $t . '|' );
        return $this;
    }



    /*
        Метод abc
    */
    public function abc
    (
        string $t = '?'
    )
    {
        $this -> setContent( '|abc-' . $t . '|' );
        return $this;
    }




    /**************************************************************************
        Методы API b
    */

    /*
        Эндпоинт возвращает собранные аргументы
        Передает полное состояние вызываемым компонентам
        Использует их как черные ящики формирующие данные
    */
    public function b
    (
        string $t = '?'
    )
    {
        return $this
        -> setParams([ 'b' => $t ])
        -> summon( 'demo', 'ba', [ 't' => $t ] )
        ;
    }



    /*
        Метод возвращает модифицированное состояние params
    */
    public function ba
    (
        string $t = '?'
    )
    {
        return $this
        -> setParam( 'ba', $t )
        ;
    }
}
