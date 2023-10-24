@extends('layouts.admin')
@section("title") Список пользователей @parent @stop
@section("content")
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список пользователей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-outline-secondary">Добавить пользователя</a>
        </div>
    </div>
</div>

<div class="table-responsive">
    
    
    @include('inc.message')
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Почта</th>
                <th scope="col">Админ</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse($usersList as $user)
            <tr id="{{ $user->id }}">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td> <!-- метод category() из модели -->
                <td class="d-flex justify-content-start">
                    @if($user->is_admin)
                        <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-danger">Снять админа</a>
                    @else
                        <a href="{{ route('admin.toggleAdmin', $user) }}" type="button" class="btn btn-success">Назначить админом</a>
                    @endif    
                </td>
                <td>{{ $user->created_at }}</td>
                <td><a href="{{ route('admin.users.edit', $user) }}">Ред.</a>|
                    <a rel="{{ $user->id  }}" class="delete" href="javascript:"  style="color: red">Удал.</a></td> 
            </tr>
            @empty
            <tr>
                <td colspan='6'>Записей нет</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <br>
</div>
@endsection
@push('js')
<script>    
    let elements = document.querySelectorAll(".delete");
        elements.forEach(function (element, key) {
            element.addEventListener('click', function() {
                const id = this.getAttribute('rel');
                if (confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                    send(`/admin/users/${id}`).then( () => {
                        //location.reload();
                        console.log(id);
                        document.getElementById(id).remove();
                    });
                } else {
                    alert("Вы отменили удаление записи");
                }
            });
        });


        async function send(url) {
            let response = await fetch (url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
</script>
@endpush


