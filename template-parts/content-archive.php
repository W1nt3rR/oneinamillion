<div class="container">
    <div class="post">
        <div class="media">
            <img class="post-thumb" src="<?php the_post_thumbnail_url('thumbnail') ?>" alt="image">

            <div class="media-body">
                <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <div class="meta">
                    <span class="date"> <?php the_date(); ?> </span>
                    <span class="comment"> <?php comments_number(); ?> </span>
                </div>

                <div class="intro"><?php the_excerpt(); ?></div>

                <a class="more-link" href="<?php the_permalink(); ?>">Read more &rarr;</a>
            </div>
        </div>
    </div>
</div>