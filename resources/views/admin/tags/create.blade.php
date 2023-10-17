@extends('admin.layouts.main')
@section('title')
    Create Tag
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
                            <form class="form-horizontal tasi-form" action="{{ route('panel.tags.store')  }}"
                                  method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">name</label>
                                    <div class="col-sm-10">
                                        <input name="title" type="text" class="form-control">
                                    </div>
                                    @error('name')
                                    <p class="">{{ $message  }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">create tags</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
@endsection
