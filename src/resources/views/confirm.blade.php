@extends ('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection


@section('content')
<div class="confirm-container">
  <h2 class="section-title">Confirm</h2>

  <div class="confirm-table">
    <form action="/contacts" method="post">
      @csrf

      {{-- hidden inputs --}}
      <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
      <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
      <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
      <input type="hidden" name="email" value="{{ $contact['email'] }}">
      <input type="hidden" name="tel[1]" value="{{ $contact['tel1'] }}">
      <input type="hidden" name="tel[2]" value="{{ $contact['tel2'] }}">
      <input type="hidden" name="tel[3]" value="{{ $contact['tel3'] }}">
      <input type="hidden" name="address" value="{{ $contact['address'] }}">
      <input type="hidden" name="building" value="{{ $contact['building'] }}">
      <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
      <input type="hidden" name="detail" value="{{ $contact['detail'] }}">

      <!-- 確認フォーム -->
      <table class="confirm-table__wrapper">
        <tr class="confirm-table__column">
          <th class="confirm-table__label">お名前</th>
          <td class="confirm-table__item">{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
        </tr>

        <tr class="confirm-table__column">
          <th class="confirm-table__label">性別</th>
          <td class="confirm-table__item">
            {{
              match($contact['gender']) {
                '1' => '男性',
                '2' => '女性',
                '3' => 'その他',
              }
            }}
          </td>
        </tr>

        <tr class="confirm-table__column">
          <th class="confirm-table__label">メールアドレス</th>
          <td class="confirm-table__item">{{ $contact['email'] }}</td>
        </tr>

        <tr class="confirm-table__column">
          <th class="confirm-table__label">電話番号</th>
          <td class="confirm-table__item">{{ $contact['tel1'] }}{{ $contact['tel2'] }}{{ $contact['tel3'] }}</td>
        </tr>

        <tr class="confirm-table__column">
          <th class="confirm-table__label">住所</th>
          <td class="confirm-table__item">{{ $contact['address'] }}</td>
        </tr>

        <tr class="confirm-table__column">
          <th class="confirm-table__label">建物名</th>
          <td class="confirm-table__item">{{ $contact['building'] }}</td>
        </tr>
 
        <tr class="confirm-table__column">
          <th class="confirm-table__label">お問い合わせの種類</th>
          <td class="confirm-table__item">{{ $contact['category_name'] }}</td>
        </tr>

        <tr class="confirm-table__column">
          <th class="confirm-table__label">お問い合わせ内容</th>
          <td class="confirm-table__item">{{ $contact['detail'] }}</td>
        </tr>
      </table>

      <div class="confirm__button">
        <div class="confirm__button-send">
          <button class="confirm__button-submit" type="submit">送信</button>
        </div>
        <div class="confirm__button-correction">
          <button class="confirm__button-back" type="submit" name="action" value="back">修正</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
