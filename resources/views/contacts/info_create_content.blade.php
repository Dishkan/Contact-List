@extends('contacts'.'.layouts.admin')

@section('content')
    <div class="container">
        <div class="panel-heading">
            {{ 'New info' }}
        </div>

        <div class="panel-default">
            @include('errors')
            <form action="{{ route('info.store') }}"
                  method="POST" class="form-horizontal">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-striped task-table">
                    <tbody>
                    <tr>
                        <td>
                            <select name="contact_id" class="form-control" style="width: 100%; height: 40px;">
                                @foreach($info as $v)
                                    <option selected="selected" value="{{ $v->id }}">{{ $v->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="table-text">
                            <div>Contact</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-text">
                            <div>
                                <input type="text" name="info_number" id="task-name" class="form-control"
                                       value="{{ old('info_number') }}"
                                       placeholder="Use only numbers and start with code 998">
                            </div>
                        </td>
                        <td class="table-text">
                            <div>Number</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-text">
                            <div>
                                <input type="text" multiple="multiple" name="info_email" id="task-name"
                                       class="form-control"
                                       value="{{ old('info_email') }}"
                                       placeholder="Email">
                            </div>
                        </td>
                        <td class="table-text">
                            <div>Email</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>
                            {{ 'Add info' }}
                        </button>
                    </div>
                </div>
            </form>
            <div>
                <a href="{{ route('index') }}">
                    <button class="btn btn-success">
                        <i class="fa fa-btn fa-create"></i> Back
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
