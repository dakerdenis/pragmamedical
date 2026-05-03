@extends('layouts.admin')
@section('title', 'Добавить статью')
@section('styles')
    <link rel="stylesheet" href="/css/pages/admin-blog.css">
@endsection
@section('content')

<div class="mb-24">
    <a href="{{ route('admin.blog') }}" class="btn btn-outline">
        <i class="fa fa-arrow-left"></i> Назад к списку
    </a>
</div>

<form method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data"
      id="blogForm" novalidate>
    @csrf

    {{-- Main image --}}
    <div class="card">
        <div class="card-title">Главная фотография</div>

        <div class="upload-zone" id="mainImageZone">
            <input type="file" name="main_image" id="mainImageInput"
                   accept="image/jpeg,image/png,image/webp" class="upload-input">
            <div class="upload-placeholder" id="mainImagePlaceholder">
                <i class="fa fa-cloud-upload"></i>
                <p>Нажмите или перетащите изображение</p>
                <span>JPG, PNG, WEBP — макс. 2 МБ</span>
            </div>
            <div class="upload-preview" id="mainImagePreview" style="display:none;">
                <img id="mainImageImg" src="" alt="">
                <button type="button" class="upload-remove" onclick="removeImage('mainImage')">&times;</button>
            </div>
        </div>
        <p class="field-error" id="mainImageError"></p>
    </div>

    {{-- Titles --}}
    <div class="card">
        <div class="card-title">Название статьи</div>

        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label class="form-label">Название AZ <span class="required">*</span></label>
                    <input type="text" name="title_az" class="form-input" value="{{ old('title_az') }}"
                           placeholder="Məqalə başlığı" data-required="true" data-label="Название AZ">
                    @error('title_az') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label class="form-label">Название RU <span class="required">*</span></label>
                    <input type="text" name="title_ru" class="form-input" value="{{ old('title_ru') }}"
                           placeholder="Заголовок статьи" data-required="true" data-label="Название RU">
                    @error('title_ru') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label class="form-label">Название EN <span class="required">*</span></label>
                    <input type="text" name="title_en" class="form-input" value="{{ old('title_en') }}"
                           placeholder="Article title" data-required="true" data-label="Название EN">
                    @error('title_en') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="form-group" style="max-width:280px;">
            <label class="form-label">Дата публикации</label>
            <input type="date" name="published_date" class="form-input"
                   value="{{ old('published_date', date('Y-m-d')) }}">
        </div>
    </div>

    {{-- Descriptions --}}
    <div class="card">
        <div class="card-title">Описание</div>

        <div class="form-group">
            <label class="form-label">Описание AZ</label>
            <textarea name="description_az" class="form-textarea"
                      placeholder="Məqalə mətni...">{{ old('description_az') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Описание RU</label>
            <textarea name="description_ru" class="form-textarea"
                      placeholder="Текст статьи...">{{ old('description_ru') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Описание EN</label>
            <textarea name="description_en" class="form-textarea"
                      placeholder="Article text...">{{ old('description_en') }}</textarea>
        </div>
    </div>

    {{-- Extra images --}}
    <div class="card">
        <div class="card-title">Дополнительные фотографии</div>

        <div class="upload-grid">
            @for ($i = 1; $i <= 4; $i++)
            <div class="upload-grid-item">
                <label class="form-label">Фото {{ $i }}</label>
                <div class="upload-zone upload-zone-sm" id="image{{ $i }}Zone">
                    <input type="file" name="image_{{ $i }}" id="image{{ $i }}Input"
                           accept="image/jpeg,image/png,image/webp" class="upload-input">
                    <div class="upload-placeholder" id="image{{ $i }}Placeholder">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="upload-preview" id="image{{ $i }}Preview" style="display:none;">
                        <img id="image{{ $i }}Img" src="" alt="">
                        <button type="button" class="upload-remove"
                                onclick="removeImage('image{{ $i }}')">&times;</button>
                    </div>
                </div>
                <p class="field-error" id="image{{ $i }}Error"></p>
            </div>
            @endfor
        </div>
    </div>

    {{-- Submit --}}
    <div class="form-actions">
        <a href="{{ route('admin.blog') }}" class="btn btn-outline">Отмена</a>
        <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
            <i class="fa fa-check"></i> Сохранить статью
        </button>
    </div>

</form>

<script>
var MAX_FILE_SIZE = 2 * 1024 * 1024; // 2 MB
var ALLOWED_TYPES = ['image/jpeg', 'image/png', 'image/webp'];

// ===== File preview =====
function setupUpload(name) {
    var input = document.getElementById(name + 'Input');
    var zone = document.getElementById(name + 'Zone');
    if (!input || !zone) return;

    input.addEventListener('change', function() {
        handleFile(this, name);
    });

    zone.addEventListener('dragover', function(e) {
        e.preventDefault();
        zone.classList.add('drag-over');
    });

    zone.addEventListener('dragleave', function() {
        zone.classList.remove('drag-over');
    });

    zone.addEventListener('drop', function(e) {
        e.preventDefault();
        zone.classList.remove('drag-over');
        if (e.dataTransfer.files.length) {
            input.files = e.dataTransfer.files;
            handleFile(input, name);
        }
    });
}

function handleFile(input, name) {
    var errorEl = document.getElementById(name + 'Error');
    errorEl.textContent = '';

    if (!input.files || !input.files[0]) return;
    var file = input.files[0];

    if (ALLOWED_TYPES.indexOf(file.type) === -1) {
        errorEl.textContent = 'Допустимые форматы: JPG, PNG, WEBP';
        input.value = '';
        return;
    }

    if (file.size > MAX_FILE_SIZE) {
        errorEl.textContent = 'Файл слишком большой. Максимум 2 МБ (текущий: ' +
            (file.size / 1024 / 1024).toFixed(1) + ' МБ)';
        input.value = '';
        return;
    }

    var reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById(name + 'Img').src = e.target.result;
        document.getElementById(name + 'Preview').style.display = 'flex';
        document.getElementById(name + 'Placeholder').style.display = 'none';
    };
    reader.readAsDataURL(file);
}

function removeImage(name) {
    document.getElementById(name + 'Input').value = '';
    document.getElementById(name + 'Preview').style.display = 'none';
    document.getElementById(name + 'Placeholder').style.display = 'flex';
    document.getElementById(name + 'Error').textContent = '';
}

setupUpload('mainImage');
for (var i = 1; i <= 4; i++) setupUpload('image' + i);

// ===== Form validation =====
document.getElementById('blogForm').addEventListener('submit', function(e) {
    var errors = [];
    var firstBad = null;

    // Required text fields
    this.querySelectorAll('[data-required="true"]').forEach(function(input) {
        var wrapper = input.closest('.form-group');
        if (!input.value.trim()) {
            errors.push(input.dataset.label + ' — обязательное поле');
            input.classList.add('input-error');
            if (!firstBad) firstBad = input;
        } else {
            input.classList.remove('input-error');
        }
    });

    // Check all file inputs one more time
    var fileInputs = this.querySelectorAll('input[type="file"]');
    fileInputs.forEach(function(input) {
        if (input.files && input.files[0]) {
            var file = input.files[0];
            if (ALLOWED_TYPES.indexOf(file.type) === -1) {
                errors.push(input.name + ': недопустимый формат');
            }
            if (file.size > MAX_FILE_SIZE) {
                errors.push(input.name + ': превышен лимит 2 МБ');
            }
        }
    });

    if (errors.length > 0) {
        e.preventDefault();
        alert('Исправьте ошибки:\n\n• ' + errors.join('\n• '));
        if (firstBad) firstBad.focus();
        return;
    }

    // Disable double-submit
    document.getElementById('submitBtn').disabled = true;
    document.getElementById('submitBtn').innerHTML =
        '<i class="fa fa-spinner fa-spin"></i> Сохранение...';
});

// Remove error highlight on input
document.querySelectorAll('[data-required]').forEach(function(input) {
    input.addEventListener('input', function() {
        if (this.value.trim()) this.classList.remove('input-error');
    });
});
</script>

@endsection