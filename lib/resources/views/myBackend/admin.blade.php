@extends('myBackend.master')
@section('title','Admin User')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
    </div><!--/.row-->
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách Admin</div>
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped">
                    <tr id="tbl-first-row">
                        <td width="5%">ID</td>
                        <td width="25%">Username</td>
                        <td width="25%">Email</td>
                        <td width="5%">Level</td>
                        <td width="5%">Edit</td>
                        <td width="5%">Delete</td>
                    </tr>
                    @foreach ($admin as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->level}}</td>
                        <td><a href="#">Edit</a></td>
                        <td><a href="#">Delete</a></td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Danh sách User</div>
            <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped">
                    <tr id="tbl-first-row">
                        <td width="5%">ID</td>
                        <td width="25%">Username</td>
                        <td width="25%">Email</td>
                        <td width="5%">Level</td>
                        <td width="5%">Edit</td>
                        <td width="5%">Delete</td>
                    </tr>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->level}}</td>
                        <td><a href="#">Edit</a></td>
                        <td><a href="#">Delete</a></td>
                    </tr>
                    @endforeach
                </table>
                </div>
                {{$user->links()}}
            </div>
        </div>
    </div>
</div>
@endsection


