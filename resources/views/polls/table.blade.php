<table class="table table-responsive" id="polls-table">
    <thead>
        <th>Title</th>
        <th>Survey</th>
        {{--<th>Description</th>--}}
        <th>Category</th>
        {{--<th>Open time</th>--}}
        {{--<th>Close time</th>--}}
        {{--<th>Target group</th>--}}
        <th>Type</th>
        <th>Posted by</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($polls as $poll)
        <tr>
            <td>{!! $poll->title !!}</td>
            <td>{!! $poll->survey?$poll->survey->title: 'None' !!}</td>
            {{--<td>{!! str_limit($poll->description, $limit = 140, $end = '...') !!}</td>--}}
            <td>{!! $poll->category?$poll->category->name: 'None'!!}</td>
            {{--<td>{!! $poll->openTime !!}</td>--}}
            {{--<td>{!! $poll->closeTime !!}</td>--}}
            {{--<td>{!! $poll->targetGroup !!}</td>--}}
            <td>{!! $poll->type !!}</td>
            <td>{!! $poll->user->name !!}</td>
            <td colspan="3">
                {!! Form::open(['route' => ['polls.destroy', $poll->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! url('/poll/'.$poll->id.'/answers') !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-tasks"></i></a>
                    <a href="{!! route('polls.show', [$poll->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('polls.edit', [$poll->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="8">
            <div class="text-center">
                {{ $polls->links() }}
            </div>
        </td>
    </tr>
    </tfoot>
</table>