
<script type="text/javascript" src="{!! asset('js/jquery-latest.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery.tablesorter.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/tools.js') !!}"></script>

<link href="{{ asset('/css/table.css') }}" rel="stylesheet">

@if($clikers)
    <table id="clickTable" class="tablesorter">
        <thead>
        <tr>
            <th>ID</th>
            <th>User Agent</th>
            <th>IP</th>
            <th>Referrer</th>
            <th>Param1</th>
            <th>Param2</th>
            <th>Error</th>
            <th>Bad_domain</th>
        </tr>
        </thead>
        <tbody>
    @foreach($clikers as $click)
            <tr>
                <td>{{$click->id}}</td>
                <td>{{$click->ua}}</td>
                <td>{{$click->ip}}</td>
                <td>{{$click->ref}}</td>
                <td>{{$click->param1}}</td>
                <td>{{$click->param2}}</td>
                <td>{{$click->error}}</td>
                <td>{{$click->bad_domain}}</td>
            </tr>
    @endforeach
        </tbody>
    </table>
@else
    <b>No data yet</b>
@endif