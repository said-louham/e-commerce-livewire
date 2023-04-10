@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-header p-3">
                <h3 class="d-flex  justify-content-between">
                    {{__('words.slider')}}
                    <a href={{ url('admin/slider/create') }} class="btn btn-primary btn float-end"> {{__('words.add slider')}}</a>
                </h3>
                <h4>
                    @if (session()->has('success'))
                        <h4 class="alert alert-success">
                            {{ session()->get('success') }}
                    @endif
                </h4>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>{{__('words.Image')}}</th>
                            <th>{{__('words.title')}}</th>
                            <th>{{__('words.Description')}}</th>
                            <th>{{__('words.Status')}}</th>
                            <th>{{__('words.Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td><img src="{{ asset($slider->image) }}" width="100"></td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td>{{ $slider->status == 1 ? __('words.hidden'):__('words.visible')  }}</td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <div class="col">
                                            <a href="{{ route('slider.edit', $slider->id) }}"
                                                class=" ms-2 btn btn-primary btn-sm">{{__('words.Edit')}} </a>

                                        </div>
                                        <div class="col">
                                            <form action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class=" ms-2  btn btn-danger btn-sm"> {{__('words.Delete')}} </button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
