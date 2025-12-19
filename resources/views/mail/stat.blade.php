<x-mail::message>
# Introduction

Количество добавленных комментариев: {{ $countComment }}

@if(isset($countArticle) && count($countArticle) > 0)
    Количество просмотров статей: {{ $countArticle[0]['count'] ?? 0 }}

    Просмотрены следующие статьи:
    @foreach($countArticle as $value)
        {{ $value['article_title'] ?? 'Без названия' }}
    @endforeach
@else
    Просмотров статей за сегодня нет.
@endif

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>