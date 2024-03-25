@foreach($product as $item)
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['name']}}</td>
        <td>{{$item['slug']}}</td>
        <td>{{$item['meta_description']}}</td>
        <td>{{$item['title']}}</td>
        <td>{{$item['categories_name']}}</td>
        <td>
            <a class="btn btn-cyan" href="/dashboard/product/edit/{{$item['id']}}"> edit </a>
        </td>
        <td>
            <a class="btn btn-danger" href="/dashboard/product/delete/{{$item['id']}}"> delete </a>
        </td>
        <td>
            <a class="btn btn-primary" href="/dashboard/product-upload/view/{{$item['id']}}"> Зображення </a>
        </td>
        <td>
            <a class="btn btn-outline-secondary" href="/dashboard/product-variant/view/{{$item['id']}}"> Варианты Продукту </a>
        </td>
    </tr>
@endforeach
