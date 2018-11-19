
{!!$message!!}

    @foreach ($reviews as $review)
    <ol class="commentlist">
            <li class="comment byuser comment-author-onliner even thread-even depth-1" id="li-comment-230">
    
    <div id="comment-230" class="comment_container">
    
    
    <div class="comment-text">
    
            <strong class="woocommerce-review__author" style="color:#ff5a5f">{{$review->author}}</strong>
            <p class="meta">
            
                    <time class="woocommerce-review__published-date" style="color:green"><?php 
                        $ydate = date('Y', strtotime($review->created_at));  
                        $mdate = date('m', strtotime($review->created_at));  
                        $ddate = date('d', strtotime($review->created_at));  
                       $date = g2p($ydate,$mdate ,$ddate);
                   ?>
                   {{$date[0]}}/{{$date[1]}}/{{$date[2]}}</time>
            </p>
            <p>
                <div class="star_rating">
                <input id="rating" class="rating rating-loading" name="rating" value="{{$review->rating*0.9}}" data-min="0" data-max="5" data-step="0.9" data-size="xs"  data-display-only="true" data-show-caption="false">        
                </div>
            </p>
    <div class="description"><p>{{$review->text}}</p>
    </div>
    </div>
    </div>
    </li><!-- #comment-## -->
        </ol>
    @endforeach
