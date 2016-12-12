<?php

namespace TemplateEngine;

class TemplateEngine
{

    /** @var  TemplateDAO */
    private $templateDAO;

    /**
     * @param TemplateDAO $templateDAO
     * @return TemplateEngine
     */
    public function setTemplateDAO($templateDAO)
    {
        $this->templateDAO = $templateDAO;

        return $this;
    }


    public function render($template, array $map)
    {
        $matches = [];
        preg_match_all('/\{([^}]+)\}/', $template, $matches);

        $matches = array_unique($matches[1]);

        foreach ($matches as $match) {
            if (!isset($map[$match])){
                throw new MissingValueException(sprintf("Variable %s is not defined", $match));
            }
            $template = str_ireplace('{' . $match . '}', $map[$match], $template);
        }

        return $template;
    }

    public function renderFromDB_not_use_DI($templateName, $map)
    {
        $templateDAO = new TemplateDAO('nome_tabella');
        $template = $templateDAO->findByName($templateName);

        return $this->render($template, $map);
    }

    public function renderFromDB($templateName, $map)
    {
        $template = $this->templateDAO->findByName($templateName);

        return $this->render($template, $map);
    }
}