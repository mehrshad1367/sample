<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>lastname</th>
        {{--                    <th>body</th>--}}
        <th colspan="2">Operation</th>
    </tr>
    </thead>
    <tbody>@if(!empty($articles))
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{$article->firstName}}</td>
                @if(__('msg.Fa') == 'فارسی')

                    <td> <?php convertEnToFa($article->firstName); ?> </td>
                    <td> <?php convertEnToFa($article->lastName); ?></td>
                @else
                    <td> {{ $article->firstName }} </td>
                    <td> {{ $article->lastName }}</td>
                @endif
                <td><a class = "btn btn-primary" style="cursor: pointer ; color: white" href="{{ url('author/edit',['id'=>$article->id]) }}" data-id="{{ $article->id }}" id="btn_update">Edit</a>
                    {{--                    @if($article->status != 1)--}}
                    {{--                        <a class = "btn btn-success" style="cursor: pointer ; color: white" href="{{ url('author/confirm',['id'=>$article->id]) }}" data-id="{{ $article->id }}" id="btn_update">Confirm</a>--}}
                    {{--                        @else--}}
                    {{--                    <a class = "btn btn-success" style="cursor: pointer ; color: white" href="{{ url('author/confirm',['id'=>$article->id]) }}" data-id="{{ $article->id }}" id="btn_update">Reject</a>--}}
                    {{--                    @endif--}}
                    <a class = "btn btn-danger" style="cursor: pointer ; color: white" href="{{ url('author/delete',['id'=>$article->id]) }}" data-id="{{ $article->id }}" id="btn_delete">Delete</a></td>

            </tr>
        @endforeach
    @endif
    </tbody>
</table>
{{ $articles->links() }}

</div>
