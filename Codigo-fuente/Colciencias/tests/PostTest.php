<?php

class PostTest extends PHPUnit_Framework_TestCase
{
    private $CI;

    public function setUp()
    {
        $this->CI = &get_instance();
        $this->CI->load->database('testing');
    }

    public function testGetsAllPosts()
    {

        $this->load->model('Propuesta_model');
        $this->CI->load->model('propuesta_model');
        $array = $this->CI->propuesta_model->listarPropuesta();
        $this->assertEquals(1, count($array));
    }
}