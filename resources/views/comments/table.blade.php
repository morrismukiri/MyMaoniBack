<table class="table table-responsive" id="comments-table">
    <thead>
        <th>Userid</th>
        <th>Surveyid</th>
        <th>Comment</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($comments as $comments)
        <tr>
            <td>{!! $comments->userId !!}</td>
            <td>{!! $comments->surveyId !!}</td>
            <td>{!! $comments->comment !!}</td>
            <td>
                {!! Form::open(['route' => ['comments.destroy', $comments->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('comments.show', [$comments->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('comments.edit', [$comments->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>