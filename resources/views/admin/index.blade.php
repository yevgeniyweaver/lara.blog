@extends('layouts.admin')
{{--@section('title', 'Главная Новостройки')--}}
@section('content')



    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Objects
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a style="margin: 0 0 20px 0" class="btn btn-primary" href="{{ route('form.new') }}">
                            Create new Object
                        </a>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach ($objects as $object)
                                @if (!empty($object))
                                    <tr>
                                        <td>{{$object->getId()}}</td>
                                        <td>{{$object->getTitle()}}</td>
                                        <td>@php $path =$object->getImage();
                                            $exists = Storage::disk('public')->exists($path);@endphp

                                            @if($exists)
                                                <img style="width: 50px;" class="img-fluid" src="{{ asset('/storage/'. $path) }}"/>
                                            @else
                                                <img style="width: 50px;" class="img-fluid" src="{{ '/none.png' }}"/>
                                            @endif

                                        </td>
                                        <td>{{$object->getCategory()}}</td>
                                        <td> {{$object->getDescription()}}</td>
                                        <td>
                                            <a class="btn btn-success" href="/admin/edit/{{$object->getId()}}">
                                                <svg class="svg-inline--fa fa-arrow-left fa-w-14 mr-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path></svg><!-- <i class="fas fa-arrow-left mr-1"></i> -->
                                                Edit
                                            </a>
                                            <a class="btn btn-danger" href="/admin/delete/{{$object->getId()}}">
                                                Remove
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach


                            {{--<tr>--}}
                                {{--<td>Garrett Winters</td>--}}
                                {{--<td>Accountant</td>--}}
                                {{--<td>Tokyo</td>--}}
                                {{--<td>63</td>--}}
                                {{--<td>2011/07/25</td>--}}
                                {{--<td>$170,750</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td>Ashton Cox</td>--}}
                                {{--<td>Junior Technical Author</td>--}}
                                {{--<td>San Francisco</td>--}}
                                {{--<td>66</td>--}}
                                {{--<td>2009/01/12</td>--}}
                                {{--<td>$86,000</td>--}}
                            {{--</tr>--}}



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>


<style>
    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto auto auto;
        background-color: #2196F3;
        padding: 10px;
    }
    .grid-item {
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(0, 0, 0, 0.8);
        padding: 20px;
        font-size: 30px;
        text-align: center;
    }
</style>

{{--<h1>Grid Elements</h1>--}}

{{--<p>A Grid Layout must have a parent element with the <em>display</em> property set to <em>grid</em> or <em>inline-grid</em>.</p>--}}

{{--<p>Direct child element(s) of the grid container automatically becomes grid items.</p>--}}


{{--@if (!empty($objects))--}}
{{--<div class="grid-container">--}}
    {{--@foreach ($objects as $object)--}}
        {{--@if (!empty($object))--}}
            {{--<div class="grid-item">{{$object->getId()}}</div>--}}
            {{--<div class="grid-item"> {{$object->getTitle()}}</div>--}}
            {{--<div class="grid-item">{{$object->getImage()}}</div>--}}
            {{--<div class="grid-item"> {{$object->getCategory()}}</div>--}}
            {{--<div class="grid-item"> {{$object->getDescription()}}</div>--}}
        {{--@endif--}}
    {{--@endforeach--}}
{{--</div>--}}
{{--@endif--}}



@endsection