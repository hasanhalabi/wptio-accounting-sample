<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace wptio;

/**
 * Description of wptio
 *
 * @author hasan
 */
abstract class endpoint {
    abstract public function create($params);
    abstract public function delete($params);
    abstract public function edit($params);
    abstract public function get($params);
    abstract public function getlist($params);
}