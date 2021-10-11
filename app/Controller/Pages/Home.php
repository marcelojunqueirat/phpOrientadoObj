<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;

class Home extends Page {

    /**
     * Método responsável por retornar o conteúdo (view) da home.
     * @return string
     */
    public static function getHome() {
        //Organização
        $objOrganization = new Organization;

        //View da Home
        $content = View::render('pages/home', [
            'name'        => $objOrganization->name,
            'description' => $objOrganization->description,
            'site'        => $objOrganization->site
        ]);
        
        //Retorna a View da Página
        return parent::getPage('Canal do Marcelo - Home', $content);
    }
}