@foreach($category as $item)
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['name']}}</td>
        <td>{{$item['description']}}</td>
        <td>{{$item['parent_id']}}</td>
        <td>{{$item['slug']}}</td>
        <td>
            <a class="btn btn-cyan" href="/dashboard/category/edit/{{$item['id']}}"> edit </a>
        </td>
        <td>
            <a class="btn btn-danger" href="/dashboard/category/delete/{{$item['id']}}"> delete </a>
        </td>
    </tr>
@endforeach
