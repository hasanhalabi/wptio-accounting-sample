/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */angular.module('wptioApp', [])
        .controller('wptioController', ['$rootScope', '$scope', '$http', function ($rootScope, $scope, $http) {
                $rootScope.talkToAPI = {
                    request_in_process: false,
                    send_request: function (domain, datasource, datasegment, params, successCallback, errorCallback) {
                        if ($rootScope.talkToAPI.request_in_process) {
                            alert('Please wait, there is a request under process');
                            return false;
                        }
                        console.log(['fuck all', ajaxurl]);
                        var requestData = {
                            domain: domain,
                            datasource: datasource,
                            datasegment: datasegment,
                            params: params
                        };
                        $rootScope.talkToAPI.request_in_process = true;
//                        ajaxurl,
//                                {
//                                    action: 'wptio_api'
//                                },
//                                {}
                        $http(
                                {
                                    method: 'POST',
                                    url: ajaxurl,
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded'
                                    },
                                    data: "action=wptio_api&type=json&data=" + angular.toJson(requestData)
                                }
                        ).then(
                                function (response) {
                                    // Success
                                    $rootScope.talkToAPI.request_in_process = false;
                                    successCallback(response);
                                },
                                function (response) {
                                    // Failed
                                    $rootScope.talkToAPI.request_in_process = false;
                                    errorCallback(response);
                                });
                        return true;
                    }
                };

                $rootScope.pageData = {
                    page_domain: '',
                    page_datasource: '',
                    objData: {
                        id: -1
                    },
                    formData: {

                    },
                    listData: {
                        data: [],
                        total_count: 0,
                        total_pages: 1,
                        current_page: 1
                    },
                    init: function (page_info) {
                        $rootScope.pageData.page_domain = page_info.domain;
                        $rootScope.pageData.page_datasource = page_info.datasource;
                    },
                    create: function () {
                        $rootScope.talkToAPI.send_request(
                                $rootScope.pageData.page_domain,
                                $rootScope.pageData.page_datasource,
                                'create',
                                $rootScope.pageData.objData,
                                function (response) {
                                    $rootScope.pageData.show_notification(response.data);
                                    console.log(['ok', response.data]);
                                },
                                function (response) {
                                    console.log(['not ok', response]);
                                });
                    },
                    delete: function () {
                        $rootScope.talkToAPI.send_request(
                                $rootScope.pageData.page_domain,
                                $rootScope.pageData.page_datasource,
                                'delete',
                                $rootScope.pageData.objData,
                                function (response) {
                                    $rootScope.pageData.show_notification(response.data);
                                    console.log(['ok', response.data]);
                                },
                                function (response) {
                                    console.log(['not ok', response]);
                                });
                    },
                    edit: function () {
                        $rootScope.talkToAPI.send_request(
                                $rootScope.pageData.page_domain,
                                $rootScope.pageData.page_datasource,
                                'edit',
                                $rootScope.pageData.objData,
                                function (response) {
                                    $rootScope.pageData.show_notification(response.data);
                                    console.log(['ok', response.data]);
                                },
                                function (response) {
                                    console.log(['not ok', response]);
                                });
                    },
                    get: function () {
                        $rootScope.talkToAPI.send_request(
                                $rootScope.pageData.page_domain,
                                $rootScope.pageData.page_datasource,
                                'get',
                                $rootScope.pageData.objData,
                                function (response) {
                                    $rootScope.pageData.show_notification(response.data);
                                    console.log(['ok', response.data]);
                                },
                                function (response) {
                                    console.log(['not ok', response]);
                                });
                    },
                    getlist: function () {
                        $rootScope.talkToAPI.send_request(
                                $rootScope.pageData.page_domain,
                                $rootScope.pageData.page_datasource,
                                'getlist',
                                $rootScope.pageData.objData,
                                function (response) {
                                    $rootScope.pageData.show_notification(response.data);
                                    console.log(['ok', response.data]);
                                },
                                function (response) {
                                    console.log(['not ok', response]);
                                });
                    },
                    show_notification: function (data) {
                        var message = data;

                        if (typeof data == 'object') {
                            message = angular.toJson(data);
                        }
                        if (data.theData != undefined) {
                            message = angular.toJson(data.theData);
                        }

                        var html = '<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>Notification!</strong> ' + message + '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">    <span aria-hidden="true">&times;</span>  </button></div>'

                        jQuery("#notification-panel").append(html);
                    }
                };
            }]);