@extends('layouts.app')

@section('content')
<div class="container" ng-controller="PostController">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <button class="btn btn-primary btn-xs pull-right" ng-click="initPost()">New Post</button>
                </div>
                <div class="panel-body" style="margin-top:20px;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped" ng-if="posts.length>0">
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        <tr ng-repeat="(index, post) in posts">
                            <td>
                                @{{ index+1}}
                            </td>
                            <td>@{{ post.title }}</td>
                            <td>@{{ post.description }}</td>
                            <td>
                                <button class="btn btn-success btn-xs" ng-click="initEdit(index)">Edit</button>
                                <button class="btn btn-danger btn-xs" ng-click="deletePost(index)">Delete</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="add_new_post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger" ng-if="errors.length > 0">
                        <ul>
                            <li ng-repeat="error in errors">@{{ error }}</li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="title" class="form-control" ng-model="post.title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" rows="5" class="form-control"
                                    ng-model="post.description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="addPost()">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit_post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Post</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger" ng-if="errors.length > 0">
                        <ul>
                            <li ng-repeat="error in errors">@{{ error }}</li>
                        </ul>
                    </div>

                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="title" class="form-control" ng-model="edit_post.title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" rows="5" class="form-control"
                                    ng-model="edit_post.description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="updatePost()">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection