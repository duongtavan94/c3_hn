@foreach($intro as $key => $c)
<tr id="d{{ $c->id }}">
    <td>{{ $key + 1 }}</td>
    <td>{{ $c->name }}</td>
    <td>
        @if($c->status == 1)
        <a href="#" title="Ẩn" id="status" data-id="{{ $c->id }}"><span id="status{{ $c->id }}"><span class="label label-success">Hiện</span></span></a>
        @else
        <a href="#" title="Hiện" id="status" data-id="{{ $c->id }}"><span id="status{{ $c->id }}"><span class="label label-danger">Ẩn</span></span></a>
        @endif
    </td>
    <td>{{ $c->updated_at }}</td>
    <td>
        <a href="#" data-id="{{ $c->id }}" id="edit">
            <i class="fa fa-pencil"></i>
        </a>
        <a href="#" type="button" data-id="{{ $c->id }}" id="del">
            <i class="fa fa-times-circle"></i>
        </a>
    </td>
</tr>
@endforeach