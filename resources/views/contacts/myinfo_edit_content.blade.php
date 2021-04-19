@extends('contacts'.'.layouts.admin')

@section('content')
    <div class="container">
        <div class="panel-heading">
            {{ isset($info->id) ? 'Edit info'  : '' }}
        </div>

        <div class="panel-default">
            @include('errors')
            <form action="{{(isset($info->id)) ? route('info.update', $info->id) : ''}}"
                  method="POST" class="form-horizontal">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{ (isset($info->id)) ? method_field('PUT') : '' }}
                <table class="table table-striped task-table">
                    <tbody>
                    <tr>
                        <td class="table-text">
                            <div>
                                <input type="text" name="info_number" id="task-name" class="form-control"
                                       value="{{ isset($info->info_number) ? $info->info_number  : old('info_number') }}"
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
                                <input type="text" multiple="multiple" name="info_email" id="task-name" class="form-control"
                                       value="{{ isset($info->info_email) ? $info->info_email  : old('info_email') }}"
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
                            {{ isset($info->id) ? 'Change it'  : '' }}
                        </button>
                    </div>
                </div>
            </form>
            <div>
                <a href="{{ route('info.index') }}">
                    <button class="btn btn-success">
                        <i class="fa fa-btn fa-create"></i> Back
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
