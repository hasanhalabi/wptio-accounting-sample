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
class chart_of_accounts {

    public function create($params) {
        return (object) array(
                    endpoint_type => 'create'
        );
    }

    public function delete($params) {
        return (object) array(
                    endpoint_type => 'delete'
        );
    }

    public function edit($params) {
        return (object) array(
                    endpoint_type => 'edit'
        );
    }

    public function get($params) {
        return (object) array(
                    endpoint_type => 'get'
        );
    }

    public function getlist($params) {
        return (object) array(
                    endpoint_type => 'getlist'
        );
    }

}
