@extends('admin.layouts.main')
@section('title')
    Create User
@endsection
@section('main')
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            create user
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal tasi-form" action="{{ route('panel.users.store')  }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">name</label>
                                    <div class="col-sm-10">
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">create user</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
@endsection
