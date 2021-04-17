@extends('contacts'.'.layouts.admin')

@section('content')
    <div class="container">
        <div class="panel-heading">
            {{ isset($contact->id) ? 'Edit contact'  : 'New contact' }}
        </div>

        <div class="panel-default">
            @include('errors')
            <form action="{{(isset($contact->id)) ? route('contacts.update', $contact->id) : route('contacts.store')}}"
                  method="POST" class="form-horizontal">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{ (isset($contact->id)) ? method_field('PUT') : '' }}
                <table class="table table-striped task-table">
                    <tbody>
                    <tr>
                        <td class="table-text">
                            <div>
                                <input type="text" name="name" id="task-name" class="form-control"
                                       value="{{ isset($contact->name) ? $contact->name  : old('name') }}"
                                       placeholder="Name">
                            </div>
                        </td>
                        <td class="table-text">
                            <div>Name</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-text">
                            <div>
                                <input type="text" name="number" id="task-name" class="form-control"
                                       value="{{ isset($contact->number) ? $contact->number  : old('number') }}"
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
                                <input type="text" name="second_number" id="task-name" class="form-control"
                                       value="{{ isset($contact->second_number) ? $contact->second_number  : old('second_number') }}"
                                       placeholder="This field is not required">
                            </div>
                        </td>
                        <td class="table-text">
                            <div>Second number</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-text">
                            <div>
                                <input type="text" name="email" id="task-name" class="form-control"
                                       value="{{ isset($contact->email) ? $contact->email  : old('email') }}"
                                       placeholder="Email">
                            </div>
                        </td>
                        <td class="table-text">
                            <div>Email</div>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-text">
                            <div>
                                <input type="text" name="second_email" id="task-name" class="form-control"
                                       value="{{ isset($contact->second_email) ? $contact->second_email  : old('second_email') }}"
                                       placeholder="This field is not required">
                            </div>
                        </td>
                        <td class="table-text">
                            <div>Second email</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-btn fa-plus"></i>
                            {{ isset($contact->id) ? 'Change it'  : 'Add a contact' }}
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
