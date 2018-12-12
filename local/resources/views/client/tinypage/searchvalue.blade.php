
@foreach($list_article as $news)
<a href="{{ asset('detail/'.$news->slug.'--n-'.$news->id) }}" class="searchValueItem">{{ $news->title }}</a>
@endforeach