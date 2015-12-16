<ul class="bloglist">





      <li>
        <div class="arrow_box">
        
          <h2 class="title"><a href="/" target="_blank"><?php echo $art->title ?></a></h2>
          <ul class="textinfo">
            <a href="/"><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/uploads/shuoshuo/<?php echo $art->pic;?>"></a>
            <?php 
              echo $art->content;
            
            ?>
          </ul>
          <ul class="details">
            <li class="likes"><a href="#">99</a></li>
            <li class="comments"><a href="#">99</a></li>
            <li class="icon-time"><a href="#"><?php echo date('Y-m-d H:m:s',$art->ptime) ?></a></li>
          </ul>
        </div>
        <!--arrow_box end-->     
      </li>

  
    </ul>
    <!--bloglist end-->
