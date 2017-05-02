<table class="table table-responsive" id="surveys-table">
    <thead>
        <th>Title</th>
        <th>Description</th>
        <th>Opentime</th>
        <th>Closetime</th>
        <th>Targetgroup</th>
        <th>Type</th>
        <th>Userid</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($surveys as $survey)
        <tr>
            <td>{!! $survey->title !!}</td>
            <td>{!! $survey->description !!}</td>
            <td>{!! $survey->openTime !!}</td>
            <td>{!! $survey->closeTime !!}</td>
            <td>{!! $survey->targetGroup !!}</td>
            <td>{!! $survey->type !!}</td>
            <td>{!! $survey->userId !!}</td>
            <td>
                {!! Form::open(['route' => ['surveys.destroy', $survey->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('surveys.show', [$survey->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('surveys.edit', [$survey->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>