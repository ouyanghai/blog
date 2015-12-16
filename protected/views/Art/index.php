<ul class="bloglist">



<?php foreach($arts as $art): ?>

      <li>
        <div class="arrow_box">
        <div class="ti"></div>
          <!--三角形-->
          <div class="ci"></div>
          <!--圆形-->
          <h2 class="title"><a href="/" target="_blank"><?php echo $art->title ?></a></h2>
          <ul class="textinfo">
            <a href="/"><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/uploads/shuoshuo/<?php echo $art->pic;?>"></a>
            <?php 
              if(mb_strlen($art->content,'utf-8') < 165)
              {
                echo $art->content;
              }else{
                $str=mb_substr($art->content,0,165,'utf-8');
                echo $str;
                ?>

                <a href="<?php echo $this->createUrl('art/art',array('id'=>$art->id)) ?>">...全文&gt;&gt;</a>
              <?php
                }
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

   <?php endforeach; ?>
    </ul>
    <!--bloglist end-->