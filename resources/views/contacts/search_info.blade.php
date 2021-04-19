@extends('contacts'.'.layouts.admin')
@if ($q)
@section('content')
    <div class="container">
        <p> The search results for your query <b> {{ $query }} </b> are :</p>
        <table class="table table-striped">
            <tbody>
            @foreach($info as $v)
                <tr>
                    <th>Name:</th>
                    <td>{{$v->contact->name}}</td>
                </tr>
                <tr>
                    <th>Extra Number:</th>
                    <td>+{{$v->info_number}}</td>
                </tr>
                <tr>
                    <th>Extra Email:</th>
                    <td>{{$v->info_email}}</td>
                </tr>
                <tr>
                    <td>
                        <a href="{{ route('index') }}">
                            <button class="btn btn-success">
                                <i class="fa fa-btn fa-create"></i> Back
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

@else
@section('content')
    <div class="container">
        <p> The search results for your query <b> {{ $query }} </b> are :</p>
        <table class="table table-striped">
            <tbody>
            <tr>
                <td>Nothing was found!</td>
            </tr>
            <tr>
                <td>
                    <a href="{{ route('index') }}">
                        <button class="btn btn-success">
                            <i class="fa fa-btn fa-create"></i> Back
                        </button>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
@endsection
@endif

