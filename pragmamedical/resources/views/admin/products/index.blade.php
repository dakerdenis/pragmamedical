@extends('layouts.admin')
@section('title', 'Товары')
@section('styles')
    <link rel="stylesheet" href="/css/pages/admin-blog.css">
@endsection

@section('content')

<div class="d-flex justify-between items-center mb-24">
    <div>
        <p class="text-muted">Всего товаров: {{ $products->count() }}</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Добавить товар
    </a>
</div>

@if ($products->isEmpty())
    <div class="card" style="text-align:center; padding:60px 24px;">
        <i class="fa fa-cube" style="font-size:48px; color:#cbd5e1; margin-bottom:16px; display:block;"></i>
        <p style="font-size:16px; font-weight:600; color:var(--blue-main); margin-bottom:4px;">Товаров пока нет</p>
        <p class="text-muted">Нажмите «Добавить товар» чтобы создать первый</p>
    </div>
@else
    <div class="card" style="padding:0; overflow:hidden;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width:50px;">ID</th>
                    <th style="width:90px;">Фото</th>
                    <th>Название AZ</th>
                    <th>Название RU</th>
                    <th>Название EN</th>
                    <th style="width:100px; text-align:right;">Цена</th>
                    <th style="width:100px; text-align:right;">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><span class="text-muted">#{{ $product->id }}</span></td>
                        <td>
                            @if ($product->main_image)
                                <img src="{{ asset('storage/' . $product->main_image) }}" class="blog-thumb" alt="">
                            @else
                                <div class="blog-thumb-empty"><i class="fa fa-cube"></i></div>
                            @endif
                        </td>
                        <td class="blog-title-cell">{{ $product->title_az }}</td>
                        <td class="blog-title-cell">{{ $product->title_ru }}</td>
                        <td class="blog-title-cell">{{ $product->title_en }}</td>
                        <td style="text-align:right;">
                            @if($product->price)
                                <strong>{{ number_format($product->price, 2) }}</strong> ₼
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td style="text-align:right;">
                            <div class="d-flex gap-8" style="justify-content:flex-end;">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                   class="btn btn-outline btn-sm" title="Редактировать">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                        data-id="{{ $product->id }}"
                                        data-title="{{ $product->title_ru ?: $product->title_az }}"
                                        title="Удалить">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

<div class="modal-overlay" id="deleteModal">
    <div class="modal-box">
        <div class="modal-icon modal-icon-danger">
            <i class="fa fa-exclamation-triangle"></i>
        </div>
        <h3 class="modal-title">Удалить товар?</h3>
        <p class="modal-text">
            Вы собираетесь удалить «<strong id="deleteTitle"></strong>».
            Это действие нельзя отменить.
        </p>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-actions">
                <button type="button" class="btn btn-outline" onclick="closeDeleteModal()">Отмена</button>
                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Удалить</button>
            </div>
        </form>
    </div>
</div>

<script>
function openDeleteModal(id, title) {
    document.getElementById('deleteTitle').textContent = title;
    document.getElementById('deleteForm').action = '/admin/products/' + id;
    document.getElementById('deleteModal').classList.add('show');
}
function closeDeleteModal() {
    document.getElementById('deleteModal').classList.remove('show');
}
document.querySelectorAll('.btn-delete').forEach(function(btn) {
    btn.addEventListener('click', function() {
        openDeleteModal(this.dataset.id, this.dataset.title);
    });
});
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeDeleteModal();
});
</script>

@endsection