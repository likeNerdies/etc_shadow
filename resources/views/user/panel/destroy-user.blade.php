@extends('user.layouts.panel')


@section('panel-right')

    <div class="row">
        <div class="col-md-12">
            <form action="{{ URL::route('user-delete') }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <button class="btn btn-danger" type="submit" value="del">Delete you account</button>
                </div>
            </form>
        </div>
    </div>

@endsection