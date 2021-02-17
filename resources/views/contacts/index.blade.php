@extends('contacts.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">

            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/contacts">{{ __('All Contacts') }}</a>
                <a class="btn btn-success" href="/contacts/?favorites=1">{{ __('Favorites Contacts') }}</a>
                <a class="btn btn-success" href="{{ route('contacts.create') }}">{{ __('Create New Contact') }}</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>{{ __('fio') }}</th>
            <th>{{ __('phone') }}</th>
            <th>{{ __('favorites') }}</th>
            <th width="280px">{{ __('Action') }}</th>
        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->fio }}</td>
                <td>{{ $contact->phone }}</td>
                @if($contact->favorites == 1)
                    <td><a href="/contacts/favorites/{{ $contact->id }}?fio={{ $contact->fio }}&phone={{ $contact->phone }}&favorites=0">Убрать
                            из избранного</a></td>
                @else
                    <td><a href="/contacts/favorites/{{ $contact->id }}?fio={{ $contact->fio }}&phone={{ $contact->phone }}&favorites=1">Добавить
                            в избранное</a></td>
                @endif
                <td>
                    <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}">{{ __('Show') }}</a>

                        <a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">{{ __('Edit') }}</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $contacts->appends(request()->except('page'))->links() !!}

@endsection
