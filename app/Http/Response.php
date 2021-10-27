<?php

namespace App\Http;

class Response {

    /**
     * Código do Status HTTP
     * @var integer
     */
    private $httpCode = 200;

    /**
     * Cabeçalho do Response
     * @var array
     */
    private $headers = [];

    /**
     * Tipo de conteudo que esta sendo retornado
     * @var string
     */
    private $contentType = 'text/html';

    /**
     * Conteudo do Response
     * @var mixed
     */
    private $content;

    /**
     * Metodo responsavel por iniciar a classe e definir os valores
     * @param integer $httpCode
     * @param mixed $content
     * @param string $contentType
     */
    public function __construct($httpCode, $content, $contentType = 'text/html'){
        $this->httpCode = $httpCode;
        $this->content  = $content;
        $this->setContentType($contentType);
    }

    /**
     * Metodo responsavel por alterar o content type do Response
     * @param string $contentType
     */
    public function setContentType($contentType){
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    /**
     * Metodo responsavel por adicionar um registro no cabeçalho do response
     * @param string $key
     * @param string $value
     */
    public function addHeader($key, $value){
        $this->headers[$key] = $value;
    }

    /**
     * Metodo responsavel por enviar os headers para o navegador
     */
    private function sendHeaders(){
        //Status
        http_response_code($this->httpCode);

        //Enviar Headers
        foreach($this->headers as $key=>$value){
            header($key.': '.$value);
        }
    }

    /**
     * Metodo responsavel por enviar a resposta para o usuario
     */
    public function sendResponse(){
        // Envia os Headers
        $this->sendHeaders();

        // Imprime o conteudo
        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
            exit;
        }
    }
}