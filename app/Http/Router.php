<?php

namespace App\Http;

use \Closure;

class Router {

    /**
     * URL completa do projeto (raiz)
     * @var string
     */
    private $url = '';

    /**
     * Prefixo de todas as rotas
     * @var string
     */
    private $prefix = '';

    /**
     * Indice de rotas
     * @var array
     */
    private $routes = [];

    /**
     * Instancia de Request
     * @var Request
     */
    private $request;

    /**
     * Metodo responsavel por iniciar a classe
     * @param string $url
     */
    public function __construct($url){
        $this->request = new Request();
        $this->url     = $url;
        $this->setPrefix();
    }

    /**
     * Metodo responsavel por definir os prefixos das rotas
     */
    private function setPrefix(){
        //Informações da URL atual
        $parseUrl = parse_url($this->url);

        //Define o prefixo
        $this->prefix = $parseUrl['path'] ?? '';
    }
    /**
     * Metodo responsavel por adicionar uma rota na classe
     * @param string $method
     * @param string $route
     * @param array $params
     * 
     */
    private function addRoute($method, $route, $params = []){
        //Validação dos Parametros
        foreach($params as $key=>$value){
            if($value instanceof Closure){
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        //Padrão de Validação da URL
        $patternRoute = '/^'.str_replace('/', '\/', $route).'$/';

        //Adiciona a rota dentro da classe
        $this->routes[$patternRoute][$method] = $params;
    }

    /**
     * Metodo responsavel por definir uma rota de GET
     * @param string $route
     * @param array $params 
     */
    public function get($route, $params = []){
        $this->addRoute('GET', $route, $params);
    }
}