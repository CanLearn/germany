@extends('admin.layouts.main')
@section('title')
    Create Category
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
                            <form class="form-horizontal tasi-form" action="{{ route('panel.category.update' , $categoriesId->id)  }}"
                                  method="post">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">name</label>
                                    <div class="col-sm-10">
                                        <input name="name" value="{{ old('name')  }}{{ $categoriesId->name  }}" type="text" class="form-control">
                                    </div>

                                    @error('name')
                                    <p class="">{{ $message  }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="inputSuccess">Selects</label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-bot15" name="category_id">
                                            <option value="" >not</option>
                                            @foreach($parentCategories as $parent)
                                                <option value="{{ $parent->id  }}" >{{ $parent->name  }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <p class="">{{ $message  }}</p>
                                        @enderror
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
