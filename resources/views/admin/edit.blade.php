@extends('layouts.admin')
{{--@section('title', 'Главная Новостройки')--}}
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Object Item</h3></div>
                    <div class="card-body">
                        <form action="{{ route('update') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id"  placeholder="Id" value="{{$data->getId()}}" />

                            <input type="hidden" name="_token"  placeholder="Id" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Title</label>
                                <input class="form-control py-4" name="title" id="inputEmailAddress" type="text" placeholder="Title" value="{{$data->getTitle()}}" />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Image</label>
                                <input style="height: 80px;margin-bottom: 20px;" class="form-control py-4" name="image" type="file" value="{{'upload/'.$data->getImage()}}"/>
                                @php $path =$data->getImage(); @endphp
                                @isset($path)
                                    <img style="width: 100px;" class="img-fluid" src="{{ asset('/storage/'. $path) }}"/>
                                    <label class="small mb-1" for="inputEmailAddress">{{str_replace('upload/','',$path)}}</label>
                                    <input type="hidden" name="image_old" value="{{$data->getImage()}}"/>
                                @endisset

                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Category</label>
                                <input class="form-control py-4" name="category" id="inputEmailAddress" type="text" placeholder="Category" value="{{$data->getCategory()}}"/>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">Description</label>
                                <input class="form-control py-4" id="inputPassword" name="description" type="text" placeholder="Description" value="{{$data->getDescription()}}"/>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                {{--<a class="btn btn-primary" href="/admin/update/">Change</a>--}}
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
