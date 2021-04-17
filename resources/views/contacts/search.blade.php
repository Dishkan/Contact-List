@extends('contacts'.'.layouts.admin')
@if ($q)
@section('content')
    <div class="container">
        <p> The search results for your query <b> {{ $query }} </b> are :</p>
        <table class="table table-striped">
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <th>Name:</th>
                    <td>{{$contact->name}}</td>
                </tr>
                <tr>
                    <th>Number:</th>
                    <td>+{{$contact->number}}</td>
                </tr>
                <tr>
                    <th>Second number:</th>
                    <td>
                        @if($contact->second_number)
                            +{{ $contact->second_number }}
                        @else
                            No second number
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{$contact->email}}</td>
                </tr>
                <tr>
                    <th>Second email:</th>
                    <td>
                        @if($contact->second_email)
                            {{ $contact->second_email }}
                        @else
                            No second email
                        @endif</td>
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
