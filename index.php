<?php get_header(); ?>
  
  <section class="s-hero-post">
    <div class="container">
      <div class="left-container">
        <div class="title">
          <span class="categorie">tech blog</span>
          <h2>Em destaque</h2>
        </div>
        <?php 
          $config_ultimos_posts = array (
            'posts_per_page' => '1',
            'post_type' => 'post',
            'order' => 'DESC',
          );
          $query_posts = new WP_Query($config_ultimos_posts);
          ?>

          <?php if(have_posts()) : while ($query_posts -> have_posts()) : $query_posts -> the_post(); ?>
        <a href="<?php the_permalink()?>" class="card-post-lg">
          <div class="image">
            <img src="<?php the_field('imagem_destaque_de_post')?>" alt="Post grande">
          </div>
          <div class="info">
            <div class="top-info">
              <?php 
                $category = get_the_category($post -> ID);

                if(! empty($category)) {
                  foreach($category as $nameCategory) {
                    echo '<span class="categorie">'.$nameCategory -> name.'</span>';
                  }
                }
              ?>
             
              <ul>
                <li>
                  <img src="<?php echo get_template_directory_uri() ?>/img//icon-calendar.svg" alt="Icone de calendario">
                  <span><?php echo get_the_date('j, F Y')?></span>
                </li>
                <li>
                  <img src="<?php echo get_template_directory_uri() ?>/img//icon-clock.svg" alt="Icone de calendario">
                  <span><?php echo do_shortcode('[rt_reading_time postfix="min" postfix_singular="min"]')?> de leitura</span>
                </li>
              </ul>
            </div>
            <h3 class="txt-white"><?php the_title()?></h3>
          </div>
        </a>
        <?php endwhile; endif; wp_reset_query(); ?>
      </div>
      <div class="right-container">
        <h4>Mais populares</h4>
        <div class="all">   
          
        <?php
          $args = array(
            'meta_key' => 'post_views_count',
            'posts_per_page' => 3,
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
          );

          $top_views_posts = new WP_Query($args);
        ?>
        <?php if(have_posts()) : while ($top_views_posts -> have_posts()) : $top_views_posts -> the_post(); ?>
          <div class="item-post">
            <a href="<?php the_permalink(); ?>" class="card-post-xs">
              <div class="image">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="info">
               <?php 
                  $category = get_the_category($post -> ID);

                    if(! empty($category)) {
                      foreach($category as $nameCategory) {
                        echo '<span class="categorie">'.$nameCategory -> name.'</span>';
                      }
                    }
                ?>
                <h6 class="txt-white"><?php the_title(); ?></h6>
                <ul>
                  <li>
                    <span><?php echo get_the_date('j, F Y')?></span>
                  </li>
                  <li>
                    <span><?php echo do_shortcode('[rt_reading_time postfix="min" postfix_singular="min"]')?> de leitura</span>
                  </li>
                </ul>
              </div>
            </a>
          </div>    
          <?php endwhile; endif; wp_reset_query(); ?> 
        </div>
      </div>
    </div>
  </section>

  <section class="s-artigos">
    <div class="container">
      <div class="top">
        <h2>Artigos</h2>
        <p>Lorem ipsum dolor sit amet <img src="<?php echo get_template_directory_uri() ?>/img//icon-rocket.png" alt=""></p>
      </div>
      <?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="6" offset="1" scroll="false" transition_container="false" button_label="Carregar mais" button_loading_label="Carregando..."]'); ?>
      </div>
  </section>

  <section class="s-podcast">
    <div class="container">
      <div class="top">
        <h2>Podcasts</h2>
        <div class="ctrl-slide">
          <div class="swiper-pagination"></div>
          <div class="ctrl">
            <button class="btn btn-prev">
              <img src="<?php echo get_template_directory_uri() ?>/img//arrow-slide.svg" alt="">
            </button>
            <button class="btn btn-next">
              <img src="<?php echo get_template_directory_uri() ?>/img//arrow-slide.svg" alt="">
            </button>
          </div>
        </div>
      </div>
      <div class="slide-podcast">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <a href="" class="card-podcast">
              <div class="image">
                <img src="<?php echo get_template_directory_uri() ?>/img//img-podcast-01.jpg" alt="">
              </div>
              <div class="info">
                <div class="time">
                  <span class="tag-ep">Ep 01</span>
                  <div class="read">
                    <img src="<?php echo get_template_directory_uri() ?>/img//icon-timer.svg" alt="">
                    <span>12min</span>
                  </div>
                </div>
                <h6 class="txt-white">Realidade virtual: Entendendo a tecnologia</h6>
                <div class="play">
                  <img src="<?php echo get_template_directory_uri() ?>/img//icon-play.svg" alt="icone de play">
                  <span>Ouvir agora</span>
                </div>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="" class="card-podcast">
              <div class="image">
                <img src="<?php echo get_template_directory_uri() ?>/img//img-podcast-02.jpg" alt="">
              </div>
              <div class="info">
                <div class="time">
                  <span class="tag-ep">Ep 02</span>
                  <div class="read">
                    <img src="<?php echo get_template_directory_uri() ?>/img//icon-timer.svg" alt="">
                    <span>12min</span>
                  </div>
                </div>
                <h6 class="txt-white">Realidade virtual: Entendendo a tecnologia</h6>
                <div class="play">
                  <img src="<?php echo get_template_directory_uri() ?>/img//icon-play.svg" alt="icone de play">
                  <span>Ouvir agora</span>
                </div>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="" class="card-podcast">
              <div class="image">
                <img src="<?php echo get_template_directory_uri() ?>/img//img-podcast-03.jpg" alt="">
              </div>
              <div class="info">
                <div class="time">
                  <span class="tag-ep">Ep 03</span>
                  <div class="read">
                    <img src="<?php echo get_template_directory_uri() ?>/img//icon-timer.svg" alt="">
                    <span>12min</span>
                  </div>
                </div>
                <h6 class="txt-white">Realidade virtual: Entendendo a tecnologia</h6>
                <div class="play">
                  <img src="<?php echo get_template_directory_uri() ?>/img//icon-play.svg" alt="icone de play">
                  <span>Ouvir agora</span>
                </div>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="" class="card-podcast">
              <div class="image">
                <img src="<?php echo get_template_directory_uri() ?>/img//img-podcast-04.jpg" alt="">
              </div>
              <div class="info">
                <div class="time">
                  <span class="tag-ep">Ep 04</span>
                  <div class="read">
                    <img src="<?php echo get_template_directory_uri() ?>/img//icon-timer.svg" alt="">
                    <span>12min</span>
                  </div>
                </div>
                <h6 class="txt-white">Realidade virtual: Entendendo a tecnologia</h6>
                <div class="play">
                  <img src="<?php echo get_template_directory_uri() ?>/img//icon-play.svg" alt="icone de play">
                  <span>Ouvir agora</span>
                </div>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="" class="card-podcast">
              <div class="image">
                <img src="<?php echo get_template_directory_uri() ?>/img//img-podcast-01.jpg" alt="">
              </div>
              <div class="info">
                <div class="time">
                  <span class="tag-ep">Ep 01</span>
                  <div class="read">
                    <img src="<?php echo get_template_directory_uri() ?>/img//icon-timer.svg" alt="">
                    <span>12min</span>
                  </div>
                </div>
                <h6 class="txt-white">Realidade virtual: Entendendo a tecnologia</h6>
                <div class="play">
                  <img src="<?php echo get_template_directory_uri() ?>/img//icon-play.svg" alt="icone de play">
                  <span>Ouvir agora</span>
                </div>
              </div>
            </a>
          </div>
          <div class="swiper-slide">
            <a href="" class="card-podcast">
              <div class="image">
                <img src="<?php echo get_template_directory_uri() ?>/img//img-podcast-02.jpg" alt="">
              </div>
              <div class="info">
                <div class="time">
                  <span class="tag-ep">Ep 02</span>
                  <div class="read">
                    <img src="<?php echo get_template_directory_uri() ?>/img//icon-timer.svg" alt="">
                    <span>12min</span>
                  </div>
                </div>
                <h6 class="txt-white">Realidade virtual: Entendendo a tecnologia</h6>
                <div class="play">
                  <img src="<?php echo get_template_directory_uri() ?>/img//icon-play.svg" alt="icone de play">
                  <span>Ouvir agora</span>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="s-playlist">
    <div class="container">
      <div class="text-left">
        <img src="<?php echo get_template_directory_uri() ?>/img//icon-playlist.svg" alt="">
        <h4>Algumas playlists do canal</h4>
      </div>
      <div class="right-container">
        <a href="#" class="item-playlist">
          <div class="icon">
            <img src="<?php echo get_template_directory_uri() ?>/img//icon-html-xs.svg" alt="">
            <img src="<?php echo get_template_directory_uri() ?>/img//icon-css.svg" alt="">
            <img src="<?php echo get_template_directory_uri() ?>/img//icon-js.svg" alt="">
          </div>
          <h5>Desenvolvimento<br/>
            HTML3 + CSS3 + JS </h5>
        </a>
        <a href="#" class="item-playlist">
          <div class="icon">
            <img src="<?php echo get_template_directory_uri() ?>/img//icon-wordpress.svg" alt="">
          </div>
          <h5>O mundo <br/>
            da Tecnologia</h5>
        </a>
        <a href="#" class="item-playlist">
          <div class="icon">
            <img src="<?php echo get_template_directory_uri() ?>/img//icon-react-xs.svg" alt="">
          </div>
          <h5>Desenvolvimento<br/>
            React JS</h5>
        </a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>

