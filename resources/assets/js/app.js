require('./bootstrap');
import 'angular';

// Angular App Initialize
var app = angular.module('PostCRUD', []
    ,['$httpProvider', function($httpProvider) {
        $httpProvider.defaults.headers.post['X-CSRF-TOKEN'] = $('meta[name=csrf-token]').attr('content');
    }]);


// Post Controller
app.controller('PostController', ['$scope', '$http', function($scope, $http){
    // List posts
    $scope.posts = [];
    $scope.loadPosts = function() {
        $http.get('/post')
            .then(function success(e) {
                $scope.posts = e.data.posts;
            })
    };
    $scope.loadPosts();

    $scope.errors = [];
    $scope.post = {
        title: '',
        description: ''
    };
    // Open add post modal
    $scope.initPost = function() {
        $scope.resetForm();
        $('#add_new_post').modal('show');
    };

    // Save new post
    $scope.addPost = function() {
        $http.post('/post', {
            title: $scope.post.title,
            description: $scope.post.description
        }).then(
            function success(e) {
                $scope.resetForm();
                $scope.posts.push(e.data.post);
                $('add_new_post').modal('hide');
            }, function error(error) {
                $scope.recordErrors(error);
            }
        )
    };

    // Error description to return
    $scope.recordErrors = function (error) {
        $scope.errors = [];
        if (error.data.errors.title) {
            $scope.errors.push(error.data.errors.title[0]);
        }

        if (error.data.errors.description) {
            $scope.errors.push(error.data.errors.description[0]);
        }
    };

    // Form Reset
    $scope.resetForm = function() {
        $scope.post.title = '';
        $scope.post.description = '';
        $scope.errors = [];
    }

    $scope.edit_post = {};
    // Edit Post form showing
    $scope.initEdit = function(index) {
        $scope.errors = [];
        $scope.edit_post = $scope.posts[index];
        $('#edit_post').modal('show');
    }

    // Update post by id
    $scope.updatePost = function() {
        $http.patch('/post/' + $scope.edit_post.id, {
            title: $scope.edit_post.title,
            description: $scope.edit_post.description
        }).then(
            function success(e) {
                $scope.errors = [];
                $('#edit_post').modal('hide');
            }, function error(error) {
                $scope.recordErrors(error);
            }
        );

    }

    // Delete Post
    $scope.deletePost = function(index) {
        var conf = confirm("Do you really want to delete this post?");

        if (conf === true) {
            $http.delete('/post/' + $scope.posts[index].id)
                .then(function success(e) {
                    $scope.posts.splice(index, 1);
                });
        }
    }
}]);