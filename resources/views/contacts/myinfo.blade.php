@extends('contacts'.'.layouts.admin')

@section('content')
    @if ($infos)
        <div class="container">
            <div class="col-sm-offset-2 col-sm-8">
                <div class="panel" style="width: 100%;">
                    <div class="panel-heading">
                        Extra Info
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead style="font-size: 88%;">
                            <th>Name</th>
                            <th>Extra email</th>
                            <th>Extra number</th>
                            </thead>
                            <tbody>
                            @foreach ($infos as $info)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $info->contact->name }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $info->info_email }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $info->info_number }}</div>
                                    </td>
                                    <td>
                                        <form action="{{ route('info.destroy',$info->id) }}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="_method" value="DELETE"/>

                                            <button onclick="return confirm('Are you sure?')" type="submit"
                                                    class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('info.edit', $info->id) }}">
                                            <button type="submit" class="btn btn-info">
                                                <i class="fa fa-btn fa-edit"></i> Edit
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>
                                    <a href="{{ route('index') }}">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn fa-create"></i> Back
                                        </button>
                                    </a>
                                </td>
                            </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    @endif

@endsection


