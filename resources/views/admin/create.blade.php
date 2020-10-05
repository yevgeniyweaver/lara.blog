@extends('layouts.admin')
{{--@section('title', 'Главная Новостройки')--}}
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create New Object</h3></div>
                    <div class="card-body">
                        <form action="{{ route('create') }}" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="_token"  placeholder="Id" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Title</label>
                                <input class="form-control py-4" name="title" id="inputEmailAddress" type="text" placeholder="Title" value="" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Image</label>
                                <input style="height: 80px;margin-bottom: 20px;" class="form-control py-4" name="image" type="file" value=""/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Category</label>
                                <input class="form-control py-4" name="category" id="inputEmailAddress" type="text" placeholder="Category" value=""/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Description</label>
                                <input class="form-control py-4" id="inputPassword" name="description" type="text" placeholder="Description" value=""/>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                <input type="submit" class="btn btn-primary" value="Change">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

