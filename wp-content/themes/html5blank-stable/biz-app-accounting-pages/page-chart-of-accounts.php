<?php
/*
 * Template Name: Biz App Accounting - Chart of Accounts
 */

get_header();
?>
<div class="page-container">
    <div class="row" ng-app="wptioApp">
        <div class="col-lg-12" ng-controller="wptioController" ng-init='pageData.init(<?php echo json_encode(get_page_endpoint()) ?>)'>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="#">Chart of Accounts</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#" role="button" ng-click="pageData.create()">Create</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" role="button" ng-click="pageData.edit()">Edit</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" role="button" ng-click="pageData.delete()">Delete</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" role="button" ng-click="pageData.get()">Get</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" role="button" ng-click="pageData.getlist()">Get List</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<?php
get_footer();

function get_page_endpoint() {
    return (object) array(
                domain => 'wptio',
                datasource => 'chart_of_accounts'
    );
}
?>