<table class="table table-responsive" id="answers-table">
    <thead>
        <th>Poll</th>
        <th>Text</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($answers as $answer)
        <tr>
            <td>{!! $answer->poll->title !!}</td>
            <td>{!! $answer->text !!}</td>
            <td>
                {!! Form::open(['route' => ['answers.destroy', $answer->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('answers.show', [$answer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('answers.edit', [$answer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>