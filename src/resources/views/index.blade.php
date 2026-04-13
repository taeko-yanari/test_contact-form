@extends ('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content">
  <h2 class="section-title">Contact</h2>

  <div class="contact-form__inner">
    <form class="contact-form" action="/confirm" method="post">
      @csrf

      <!-- お名前 -->
      <div class="contact-form__item">
        <label class="contact-form__label">お名前<span class="contact-form__required">※</span></label>
        <div class="contact-form__field-wrapper">
          <div class="contact-form__name-wrapper">
            <input type="text" placeholder="例：山田" id="last_name" name="last_name" class="contact-form__input" value="{{ old('last_name') ?? '' }}">
            <input type="text" placeholder="例：太郎" id="first_name" name="first_name" class="contact-form__input" value="{{ old('first_name') ?? '' }}">
          </div>
          <div class="contact-form__error-wrapper">
            @error('last_name')
            <p class="error-message">{{ $message }}</p>
            @enderror

            @error('first_name')
            <p class="error-message">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      <!-- 性別 -->
      <div class="contact-form__item">
        <label for="gender" class="contact-form__label">性別<span class="contact-form__required">※</span></label>
        <div class="contact-form__field-wrapper">
          <div class="contact-form__gender-wrapper">
            <input type="radio" name="gender" id="gender1" value="1" {{ old('gender') == 1 ? 'checked' : '' }} class="contact-form__input contact-form__radio">
            <label for="gender1" class="contact-form__radio-label">男性</label>

            <input type="radio" name="gender" id="gender2" value="2"  {{ old('gender') == 2 ? 'checked' : '' }} class="contact-form__input contact-form__radio">
            <label for="gender2" class="contact-form__radio-label">女性</label>

            <input type="radio" name="gender" id="gender3" value="3"  {{ old('gender') == 3 ? 'checked' : '' }} class="contact-form__input contact-form__radio">
            <label for="gender3" class="contact-form__radio-label">その他</label>
          </div>

          @error('gender')
          <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- メールアドレス -->
      <div class="contact-form__item">
        <label for="email" class="contact-form__label">メールアドレス<span class="contact-form__required">※</span></label>
        <div class="contact-form__field-wrapper">
          <input type="text" placeholder="例：test@example.com" id="email" name="email" class="contact-form__input" value="{{ old('email') ?? '' }}">

          @error('email')
          <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- 電話番号 -->
      <div class="contact-form__item">
        <label class="contact-form__label">電話番号<span class="contact-form__required">※</span></label>
        <div class="contact-form__field-wrapper">
          <div class="contact-form__tel-wrapper">
            <label for="tel1" class="visually-hidden">市外局番</label>
            <input type="tel" placeholder="080" id="tel1" name="tel[1]" class="contact-form__input" value="{{ old('tel.1') ?? '' }}">

            <span class="tel-hyphen">-</span>

            <label for="tel2" class="visually-hidden">市内局番</label>
            <input type="tel" placeholder="1234" id="tel2" name="tel[2]" class="contact-form__input" value="{{ old('tel.2') ?? '' }}">

            <span class="tel-hyphen">-</span>

            <label for="tel3" class="visually-hidden">加入者番号</label>
            <input type="tel" placeholder="5678" id="tel3" name="tel[3]" class="contact-form__input" value="{{ old('tel.3') ?? '' }}">
          </div>

          <div class="contact-form__error-wrapper">
            @error('tel.*')
            <p class="error-message">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      <!-- 住所 -->
      <div class="contact-form__item">
        <label for="address" class="contact-form__label">住所<span class="contact-form__required">※</span></label>
        <div class="contact-form__field-wrapper">
          <input type="text" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" id="address" name="address" class="contact-form__input" value="{{ old('address') ?? '' }}">

          @error('address')
          <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- 建物名 -->
      <div class="contact-form__item">
        <label for="building" class="contact-form__label">建物名</label>
        <input type="text" placeholder="例：千駄ヶ谷ビル101" id="building" name="building" class="contact-form__input" value="{{ old('building') ?? '' }}">
      </div>

      <!-- お問い合わせ種別 -->
      <div class="contact-form__item">
        <label for="category_id" class="contact-form__label">お問い合わせ種別<span class="contact-form__required">※</span></label>
        <div class="contact-form__field-wrapper">
          <select id="category_id" name="category_id" class="contact-form__input contact-form__category-wrapper">
            <option value="">選択してください</option>
            @foreach($categories as $category)
            <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
            {{ $category['content'] }}
            </option>
            @endforeach
          </select>

          @error('category_id')
          <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- お問い合わせ内容 -->
      <div class="contact-form__item">
        <label for="detail" class="contact-form__label">お問い合わせ内容<span class="contact-form__required">※</span></label>
        <div class="contact-form__field-wrapper">
          <textarea placeholder="お問い合わせ内容をご記載ください" id="detail" name="detail" class="contact-form__textarea">{{ old('detail') ?? '' }}</textarea>

          @error('detail')
          <p class="error-message">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <button type="submit" class="contact-form__button">確認画面</button>
    </form>
  </div>
</div>
@endsection
