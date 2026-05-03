@extends('layouts.admin')
@section('title', 'Блог')
@section('styles')
    <link rel="stylesheet" href="/css/pages/admin-blog.css">
@endsection
@section('content')

<div class="d-flex justify-between items-center mb-24">
    <div>
        <p class="text-muted">Всего статей: {{ $posts->count() }}</p>
    </div>
    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Добавить статью
    </a>
</div>

@if ($posts->isEmpty())
    <div class="card" style="text-align:center; padding:60px 24px;">
        <i class="fa fa-newspaper-o" style="font-size:48px; color:#cbd5e1; margin-bottom:16px; display:block;"></i>
        <p style="font-size:16px; font-weight:600; color:var(--blue-main); margin-bottom:4px;">Статей пока нет</p>
        <p class="text-muted">Нажмите «Добавить статью» чтобы создать первую</p>
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
                    <th style="width:120px;">Дата</th>
                    <th style="width:100px; text-align:right;">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td><span class="text-muted">#{{ $post->id }}</span></td>
                        <td>
                            @if ($post->main_image)
                                <img src="{{ asset('storage/' . $post->main_image) }}"
                                     class="blog-thumb" alt="">
                            @else
                                <div class="blog-thumb-empty">
                                    <i class="fa fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="blog-title-cell">{{ $post->title_az }}</td>
                        <td class="blog-title-cell">{{ $post->title_ru }}</td>
                        <td class="blog-title-cell">{{ $post->title_en }}</td>
                        <td>
                            @if($post->published_date)
                                <span class="badge badge-blue">{{ $post->published_date }}</span>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td style="text-align:right;">
                            <div class="d-flex gap-8" style="justify-content:flex-end;">
                                <a href="{{ route('admin.blog.edit', $post->id) }}"
                                   class="btn btn-outline btn-sm" title="Редактировать">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                        data-id="{{ $post->id }}"
                                        data-title="{{ $post->title_ru ?: $post->title_az }}"
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

{{-- Delete confirmation modal --}}
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box">
        <div class="modal-icon modal-icon-danger">
            <i class="fa fa-exclamation-triangle"></i>
        </div>
        <h3 class="modal-title">Удалить статью?</h3>
        <p class="modal-text">
            Вы собираетесь удалить статью «<strong id="deleteTitle"></strong>».
            Это действие нельзя отменить.
        </p>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-actions">
                <button type="button" class="btn btn-outline" onclick="closeDeleteModal()">Отмена</button>
                <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i> Удалить
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openDeleteModal(id, title) {
    document.getElementById('deleteTitle').textContent = title;
    document.getElementById('deleteForm').action = '/admin/blog/' + id;
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