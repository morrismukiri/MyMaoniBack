<table class="table table-responsive" id="opinions-table">
    <thead>
        <th>User</th>
        <th>Poll</th>
        <th>Comment</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($opinions as $opinion)
        @if($opinion->poll)
        <tr>
            <td>{!! $opinion->user->name!!}</td>
            <td>{!! $opinion->poll->title !!}</td>
            <td>{!! $opinion->comment !!}</td>
            <td>
                {!! Form::open(['route' => ['opinions.destroy', $opinion->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('opinions.show', [$opinion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('opinions.edit', [$opinion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endif
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="8">
            <div class="text-center">
                {{ $opinions->links() }}
            </div>
        </td>
    </tr>
    </tfoot>
</table>