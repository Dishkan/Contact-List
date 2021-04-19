@extends('contacts'.'.layouts.admin')

@section('content')
    @if ($contacts)
        <div class="container">
            <div class="col-sm-offset-2 col-sm-8">
                <div class="panel-body">
                    <form action="/contacts/search" method="POST" role="search">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                   placeholder="Search contacts using name, number or email"/>
                            <span class="input-group-btn">
               <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
               </button>
              </span>
                        </div>
                    </form>
                </div>
                <div class="panel" style="width: 100%;">
                    <div class="panel-heading">
                        Current Contacts
                    </div>
                    @if(count($contacts) == 0)
                        <h2 style="text-align: center;">
                            Create a contact!
                        </h2>
                    @endif
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead style="font-size: 88%;">
                            <th>Name</th>
                            <th>Phone number</th>
                            <th>Extra number</th>
                            <th>Email</th>
                            <th>Extra email</th>
                            </thead>
                            <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $contact->name }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $contact->number }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>
                                            @foreach($contact->info as $value)
                                                {{$value['info_number']}}
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $contact->email }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>
                                            @foreach($contact->info as $value)
                                                {{$value['info_email']}}
                                            @endforeach
                                        </div>
                                    </td>

                                    <td>
                                        <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="DELETE"/>

                                            <button onclick="return confirm('Are you sure?')" type="submit"
                                                    class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('contacts.edit', $contact->id) }}">
                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-edit"></i> Edit
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <a href="{{ route('contacts.create') }}">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn fa-create"></i> Create
                                        </button>
                                    </a>
                                </td>
                                @if(count($contacts) != 0)

                                    <td>
                                        <a href="{{ route('info.create') }}">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-btn fa-create"></i> Add extra info
                                            </button>
                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{ route('info.index') }}">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-btn fa-create"></i> Edit extra info
                                            </button>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                            @if ($contacts->lastPage() > 1)
                                <tr>
                                    <td>
                                        <div class="pagination">

                                            @if ($contacts->currentPage() !== 1)
                                                <a href="{{ $contacts->url(($contacts->currentPage()-1)) }}">{{ Lang::get('pagination.previous')}}</a>
                                            @endif
                                            @for ($i = 1; $i <= $contacts->lastPage(); $i++)

                                                @if ($contacts->currentPage() == $i)
                                                    <a class="selected disabled active">{{ $i }}</a>
                                                @else
                                                    <a href="{{ $contacts->url($i) }}">{{ $i }}</a>
                                                @endif

                                            @endfor

                                            @if ($contacts->currentPage() !== $contacts->lastPage())

                                                <a href="{{ $contacts->url($contacts->currentPage()+1) }}">{{ Lang::get('pagination.next')}}</a>
                                            @endif

                                        </div>
                    </div>
                    </td>
                    </tr>
                    @endif
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    @endif

@endsection


