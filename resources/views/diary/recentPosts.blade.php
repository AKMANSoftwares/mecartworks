<article id="recent-posts" class="img-background-repeat">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 ">
        <h2>Recent Posts </h2>
      </div>
      <div class="col-sm-9">
        @foreach ($recent as $po)
          <div class="col-md-3" style="text-align:center;" >
            <a href="{{route('diary.single',$po->slug)}}"><img src="{{ asset('images/posts/'. $po->image) }}" height="70" width="100" alt="{{ $po->image }}"/></a>
            <a href="{{route('diary.single',$po->slug)}}"><h4>{{ $post->title }}</h4></a>
            {{--<p>{{substr(strip_tags($po->body),0,50) }}{{ strlen(strip_tags($po->body)) >50 ?"...":'' }} </p>--}}
          </div>
        @endforeach
      </div>
    </div>
  </div>
</article>

