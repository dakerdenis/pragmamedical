@extends('layouts.admin')
@section('title', 'Тексты сайта')
@section('styles')
    <link rel="stylesheet" href="/css/pages/admin-blog.css">
@endsection

@section('content')

<form method="POST" action="{{ route('admin.pages.update') }}" id="transForm">
    @csrf
    @method('PUT')

    @foreach($groups as $groupName => $keys)
        <div class="card">
            <div class="card-title">{{ strtoupper($groupName) }}</div>

            @foreach($keys as $key => $values)
                <div class="trans-row">
                    <div class="trans-key">
                        <code>{{ $key }}</code>
                    </div>
                    <div class="trans-fields">
                        <div class="trans-field">
                            <label class="trans-label">AZ</label>
                            <input type="text" name="trans[{{ $key }}][az]"
                                   value="{{ $values['az'] ?? '' }}" class="form-input">
                        </div>
                        <div class="trans-field">
                            <label class="trans-label">RU</label>
                            <input type="text" name="trans[{{ $key }}][ru]"
                                   value="{{ $values['ru'] ?? '' }}" class="form-input">
                        </div>
                        <div class="trans-field">
                            <label class="trans-label">EN</label>
                            <input type="text" name="trans[{{ $key }}][en]"
                                   value="{{ $values['en'] ?? '' }}" class="form-input">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="form-actions">
        <button type="submit" class="btn btn-primary btn-lg" id="saveBtn">
            <i class="fa fa-check"></i> Yadda saxla
        </button>
    </div>
</form>

<style>
.trans-row {
    padding: 14px 0;
    border-bottom: 1px solid var(--border, #E2E8F0);
}
.trans-row:last-child { border-bottom: none; }
.trans-key {
    margin-bottom: 8px;
}
.trans-key code {
    background: #f1f5f9;
    padding: 3px 8px;
    border-radius: 4px;
    font-size: 12px;
    color: var(--blue-main, #063350);
}
.trans-fields {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
}
.trans-label {
    display: block;
    font-size: 11px;
    font-weight: 700;
    color: #94a3b8;
    margin-bottom: 4px;
    text-transform: uppercase;
}
</style>

<script>
document.getElementById('transForm').addEventListener('submit', function() {
    var btn = document.getElementById('saveBtn');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saxlanılır...';
});
</script>

@endsection