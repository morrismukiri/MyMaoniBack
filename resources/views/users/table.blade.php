<table class="table table-responsive" id="users-table">
    <thead>
        <th>Name</th>
        <th>Username</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Dob</th>
        <th>Email</th>
        <th>Password</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->username !!}</td>
            <td>{!! $user->phone !!}</td>
            <td>{!! $user->gender !!}</td>
            <td>{!! $user->address !!}</td>
            <td>{!! $user->dob !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{!! $user->password !!}</td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>