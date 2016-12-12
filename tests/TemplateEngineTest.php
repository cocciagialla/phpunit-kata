<?php

use TemplateEngine\TemplateEngine;
use TemplateEngine\TemplateDAO;

class TemplateEngineTest extends PHPUnit_Framework_TestCase
{
    /** @var TemplateEngine */
    private $templateEngine;

    public function setUp()
    {
        parent::setUp();
        $this->templateEngine = new TemplateEngine();
    }

    public function testSingleVariableExpression()
    {
        $expected = "Hello Cenk";
        $template = 'Hello {name}';
        $map = ['name' => 'Cenk'];

        $this->assertEquals($expected, $this->templateEngine->render($template, $map));
    }

    public function testMultipleVariablesExpression()
    {
        $expected = "Hello Cenk Civici";
        $template = 'Hello {firstName} {lastName}';
        $map = [
            'firstName' => 'Cenk',
            'lastName' => 'Civici',
        ];

        $this->assertEquals($expected, $this->templateEngine->render($template, $map));
    }

    public function testRepeatedVariableExpression()
    {
        $expected = "Hello Cenk Civici. Your name is Cenk";
        $template = 'Hello {firstName} {lastName}. Your name is {firstName}';
        $map = [
            'firstName' => 'Cenk',
            'lastName' => 'Civici',
        ];

        $this->assertEquals($expected, $this->templateEngine->render($template, $map));
    }

    /**
     * @expectedException TemplateEngine\MissingValueException
     */
    public function testRaiseMissingValueExceptionIfTemplateVariableDontExists()
    {
        $template = 'Hello {firstName} {lastName}';
        $map = [
            'firstName' => 'Cenk',
        ];

        $this->templateEngine->render($template, $map);
    }

    public function testEvaluateFromDbTemplateFile()
    {
        $expected = "Hello Cenk Civici. Your name is Cenk";
        $template = 'Hello {firstName} {lastName}. Your name is {firstName}';

        $map = [
            'firstName' => 'Cenk',
            'lastName' => 'Civici',
        ];

        $templateDAO = $this->getMockBuilder(TemplateDAO::class)
            ->setConstructorArgs([])
            ->getMock();

        $templateDAO->expects($this->once())
            ->method('findByName')
            ->will($this->returnValue($template));

        $this->templateEngine->setTemplateDAO($templateDAO);

        $this->assertEquals($expected, $this->templateEngine->renderFromDB(
            'myTemplate',
            $map
        ));
    }

}
