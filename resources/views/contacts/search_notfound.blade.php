@extends('contacts'.'.layouts.admin')

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
