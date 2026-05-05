@extends('layouts.admin')
@section('title', isset($product) ? 'Редактировать товар' : 'Добавить товар')
@section('styles')
    <link rel="stylesheet" href="/css/pages/admin-blog.css">
@endsection

@section('content')

<div class="mb-24">
    <a href="{{ route('admin.products') }}" class="btn btn-outline">
        <i class="fa fa-arrow-left"></i> Назад к списку
    </a>
</div>

<form method="POST"
      action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}"
      enctype="multipart/form-data" id="productForm" novalidate>
    @csrf
    @if(isset($product)) @method('PUT') @endif

    {{-- Main image --}}
    <div class="card">
        <div class="card-title">Главная фотография</div>
        <div class="upload-zone" id="mainImageZone">
            <input type="file" name="main_image" id="mainImageInput"
                   accept="image/jpeg,image/png,image/webp" class="upload-input">
            <div class="upload-placeholder" id="mainImagePlaceholder"
                 style="{{ (isset($product) && $product->main_image) ? 'display:none;' : '' }}">
                <i class="fa fa-cloud-upload"></i>
                <p>Нажмите или перетащите изображение</p>
                <span>JPG, PNG, WEBP — макс. 2 МБ</span>
            </div>
            <div class="upload-preview" id="mainImagePreview"
                 style="{{ (isset($product) && $product->main_image) ? 'display:flex;' : 'display:none;' }}">
                <img id="mainImageImg"
                     src="{{ (isset($product) && $product->main_image) ? asset('storage/' . $product->main_image) : '' }}" alt="">
                <button type="button" class="upload-remove" onclick="removeImage('mainImage')">&times;</button>
            </div>
        </div>
        <p class="field-error" id="mainImageError"></p>
    </div>

    {{-- Titles + Price --}}
    <div class="card">
        <div class="card-title">Название и цена</div>
        <div class="form-row">
            <div class="form-col">
                <div class="form-group">
                    <label class="form-label">Название AZ <span class="required">*</span></label>
                    <input type="text" name="title_az" class="form-input"
                           value="{{ old('title_az', $product->title_az ?? '') }}"
                           placeholder="Məhsul adı" data-required="true" data-label="Название AZ">
                    @error('title_az') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label class="form-label">Название RU <span class="required">*</span></label>
                    <input type="text" name="title_ru" class="form-input"
                           value="{{ old('title_ru', $product->title_ru ?? '') }}"
                           placeholder="Название товара" data-required="true" data-label="Название RU">
                    @error('title_ru') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="form-col">
                <div class="form-group">
                    <label class="form-label">Название EN <span class="required">*</span></label>
                    <input type="text" name="title_en" class="form-input"
                           value="{{ old('title_en', $product->title_en ?? '') }}"
                           placeholder="Product name" data-required="true" data-label="Название EN">
                    @error('title_en') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>
        <div class="form-group" style="max-width:200px;">
            <label class="form-label">Цена (₼)</label>
            <input type="number" step="0.01" min="0" name="price" class="form-input"
                   value="{{ old('price', $product->price ?? '') }}" placeholder="0.00" id="priceInput">
            @error('price') <p class="field-error">{{ $message }}</p> @enderror
        </div>
    </div>

    {{-- Descriptions --}}
    <div class="card">
        <div class="card-title">Описание</div>
        <div class="form-group">
            <label class="form-label">Описание AZ</label>
            <textarea name="description_az" class="form-textarea" placeholder="Məhsul haqqında...">{{ old('description_az', $product->description_az ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Описание RU</label>
            <textarea name="description_ru" class="form-textarea" placeholder="О товаре...">{{ old('description_ru', $product->description_ru ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Описание EN</label>
            <textarea name="description_en" class="form-textarea" placeholder="About product...">{{ old('description_en', $product->description_en ?? '') }}</textarea>
        </div>
    </div>

    {{-- Usage --}}
    <div class="card">
        <div class="card-title">İstifadə qaydası / Способ применения</div>
        <div class="form-group">
            <label class="form-label">İstifadə qaydası AZ</label>
            <textarea name="usage_az" class="form-textarea">{{ old('usage_az', $product->usage_az ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Способ применения RU</label>
            <textarea name="usage_ru" class="form-textarea">{{ old('usage_ru', $product->usage_ru ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Usage EN</label>
            <textarea name="usage_en" class="form-textarea">{{ old('usage_en', $product->usage_en ?? '') }}</textarea>
        </div>
    </div>

    {{-- Indications --}}
    <div class="card">
        <div class="card-title">Göstərişlər / Показания</div>
        <div class="form-group">
            <label class="form-label">Göstərişlər AZ</label>
            <textarea name="indications_az" class="form-textarea">{{ old('indications_az', $product->indications_az ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Показания RU</label>
            <textarea name="indications_ru" class="form-textarea">{{ old('indications_ru', $product->indications_ru ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Indications EN</label>
            <textarea name="indications_en" class="form-textarea">{{ old('indications_en', $product->indications_en ?? '') }}</textarea>
        </div>
    </div>

    {{-- Extra images --}}
    <div class="card">
        <div class="card-title">Дополнительные фотографии</div>
        <div class="upload-grid">
            @for ($i = 1; $i <= 4; $i++)
                @php $field = 'image_' . $i; @endphp
                <div class="upload-grid-item">
                    <label class="form-label">Фото {{ $i }}</label>
                    <div class="upload-zone upload-zone-sm" id="image{{ $i }}Zone">
                        <input type="file" name="image_{{ $i }}" id="image{{ $i }}Input"
                               accept="image/jpeg,image/png,image/webp" class="upload-input">
                        <div class="upload-placeholder" id="image{{ $i }}Placeholder"
                             style="{{ (isset($product) && $product->$field) ? 'display:none;' : '' }}">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="upload-preview" id="image{{ $i }}Preview"
                             style="{{ (isset($product) && $product->$field) ? 'display:flex;' : 'display:none;' }}">
                            <img id="image{{ $i }}Img"
                                 src="{{ (isset($product) && $product->$field) ? asset('storage/' . $product->$field) : '' }}" alt="">
                            <button type="button" class="upload-remove" onclick="removeImage('image{{ $i }}')">&times;</button>
                        </div>
                    </div>
                    <p class="field-error" id="image{{ $i }}Error"></p>
                </div>
            @endfor
        </div>
    </div>

    <div class="form-actions">
        <a href="{{ route('admin.products') }}" class="btn btn-outline">Отмена</a>
        <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
            <i class="fa fa-check"></i> {{ isset($product) ? 'Сохранить изменения' : 'Сохранить товар' }}
        </button>
    </div>
</form>

<script>
var MAX_FILE_SIZE = 2 * 1024 * 1024;
var ALLOWED_TYPES = ['image/jpeg', 'image/png', 'image/webp'];

function setupUpload(name) {
    var input = document.getElementById(name + 'Input');
    var zone = document.getElementById(name + 'Zone');
    if (!input || !zone) return;
    input.addEventListener('change', function() { handleFile(this, name); });
    zone.addEventListener('dragover', function(e) { e.preventDefault(); zone.classList.add('drag-over'); });
    zone.addEventListener('dragleave', function() { zone.classList.remove('drag-over'); });
    zone.addEventListener('drop', function(e) {
        e.preventDefault(); zone.classList.remove('drag-over');
        if (e.dataTransfer.files.length) { input.files = e.dataTransfer.files; handleFile(input, name); }
    });
}

function handleFile(input, name) {
    var err = document.getElementById(name + 'Error');
    err.textContent = '';
    if (!input.files || !input.files[0]) return;
    var f = input.files[0];
    if (ALLOWED_TYPES.indexOf(f.type) === -1) { err.textContent = 'Формат: JPG, PNG, WEBP'; input.value = ''; return; }
    if (f.size > MAX_FILE_SIZE) { err.textContent = 'Макс. 2 МБ (' + (f.size/1024/1024).toFixed(1) + ' МБ)'; input.value = ''; return; }
    var r = new FileReader();
    r.onload = function(e) {
        document.getElementById(name + 'Img').src = e.target.result;
        document.getElementById(name + 'Preview').style.display = 'flex';
        document.getElementById(name + 'Placeholder').style.display = 'none';
    };
    r.readAsDataURL(f);
}

function removeImage(name) {
    document.getElementById(name + 'Input').value = '';
    document.getElementById(name + 'Preview').style.display = 'none';
    document.getElementById(name + 'Placeholder').style.display = 'flex';
    document.getElementById(name + 'Error').textContent = '';
}

setupUpload('mainImage');
for (var i = 1; i <= 4; i++) setupUpload('image' + i);

document.getElementById('productForm').addEventListener('submit', function(e) {
    var errors = [], firstBad = null;

    this.querySelectorAll('[data-required="true"]').forEach(function(el) {
        if (!el.value.trim()) {
            errors.push(el.dataset.label + ' — обязательное поле');
            el.classList.add('input-error');
            if (!firstBad) firstBad = el;
        } else { el.classList.remove('input-error'); }
    });

    var price = document.getElementById('priceInput');
    if (price.value && (isNaN(price.value) || parseFloat(price.value) < 0)) {
        errors.push('Цена должна быть положительным числом');
        price.classList.add('input-error');
        if (!firstBad) firstBad = price;
    }

    this.querySelectorAll('input[type="file"]').forEach(function(el) {
        if (el.files && el.files[0]) {
            if (ALLOWED_TYPES.indexOf(el.files[0].type) === -1) errors.push(el.name + ': формат');
            if (el.files[0].size > MAX_FILE_SIZE) errors.push(el.name + ': > 2 МБ');
        }
    });

    if (errors.length) {
        e.preventDefault();
        alert('Исправьте ошибки:\n\n• ' + errors.join('\n• '));
        if (firstBad) firstBad.focus();
        return;
    }

    document.getElementById('submitBtn').disabled = true;
    document.getElementById('submitBtn').innerHTML = '<i class="fa fa-spinner fa-spin"></i> Сохранение...';
});

document.querySelectorAll('[data-required]').forEach(function(el) {
    el.addEventListener('input', function() { if (this.value.trim()) this.classList.remove('input-error'); });
});
</script>

@endsection