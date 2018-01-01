<?php
// いうてこの地点ではプログラム書く程でもないか、ゲームページヘのリンクを設置して終了かな…
// 中身の部分は自由に実装していいよー！
class Meiro{
  private $branch; //分岐
  private $sage_root;
  private $stage = array(1,2,3);
  private $check_judge;
  private $count = 0;
  private $det_flag = 0;

  public function __construct(){
    if($_GET){
      $det_flag = 0;
      $this->check_judge = $_GET['judge'];
      $this->count = $_GET['count'];


    }
    if(!(is_null($this->check_judge))){
      if($this->check_judge == 1){
        // もしジャッチの結果、１だったら（成功していたら）次の処理をしなさい。
        $this->count++;
        // カウントを増やしますよ。
        $this->det_flag = 0;
        // フラグは０のままですよ。　　　
        // ここで、左右の判定で、もし１だったらtrueとして成功へ。２だったら失敗へ振り分け。　下下
        //　せいこうしたらカウントがプラスされる。３になったらクリア
      }else{
        // 違ったら
        $this->count = 0;
        // カウントを０にします。
        $this->det_flag = 1;
        // フラグを立てます。　となると、その下かな。
        // ココでミスったらdet_flagを１にするとともに、カウントも０にしてる。
        /*
          考えられるのは、まずそもそもとして＄＿GETから値が通っているかどうかを疑うべきかも。

          これは、var_dumpを使うことで確認することができるので、それぞれをvar_dumpして確認することとする。
        */
        //なんでだろ・・・
      }
    }
//とりあえず、文字足しましょうか？

  }
  // count
  public function getCount(){
    return $this->count;
    // 実は簡単に足してるwスタイリングは任せる
  }
  public function getDetFlag(){
    return $this->det_flag;
    // ココでゲッターの定義をしている。
    // 返り値を返してあげることで、値を扱えるようにするものですね。
    // おそらくココの問題もないはず。となれば流行りした…？
  }
  // branch
  public function setBranch($checks){
    $this->branch = $checks;
  }

  public function getBranch(){
    return $this->branch;
  }
  // roots
  public function setRoots($num){
    $this->stage_root = $num;
  }
  public function getRoots(){
    return $this->stage_root;
  }

  // stage
  public function loadStage(){

  }
  public function delete_count(){
    $this->count = 0;
  }

}

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>迷路ゲーム！</title>
    <style media="screen">
      *,body{
        padding:0;
        margin:0;
      }
      .contianer{
        width:100%;
        max-width:1170px;
        margin:0 auto;
      }
      header{
        height:90px;

      }
      header h1{
        line-height:90px;
        text-align:center;
      }
      header h1 a{
        text-decoration: none;
        color:black;
      }
      /*--------------ここから各部分のやつ----------------*/
      /* うまく表示されてる？正直自信ないが… */
      a{
      text-decoration:none;
      color:black;
      font-weight:bold;
    }
    .free{clear:left;}

  /*  .text-space{
      height:100px;
      width:100%;
      text-align: center;
    }*/

    .game-title{

    }


    .miss_flash{
      color:red;
      font-size:16px;
      font-weight:bold;
      font-style:italic;　/*地味に足したったｗ*/
      /* www */

    }

    .screen{
      padding: 10px 0;
      border-radius: 20px;
      text-align: center;
      width:100%;
      max-width:800px;
      margin:10px auto;
      background-color: rgba(220,255,180,1);
      box-shadow: 5px 5px 5px 0 rgba(0,0,0,0.2);
    }
    /*
個人的には
color:red;
font-weight:bold;
font-style:italic;
あたりもいいかなって・・・エラー系は
     */
    .road .button{
      text-align:center;
      line-height:30px;
      display: inline-block;
      height:30px;
      width:100px;
      border-radius:5px;
      background-color:rgba(200,220,20,1);
      font-weight:bold;
      border-bottom:solid 5px rgba(130,130,20,1);
      transition: 0.2s;
    }

    .road .button:hover{
      color:rgba(100,100,100,1);
      background-color:rgba(210,240,20,1);
      border-bottom:solid 5px rgba(170,200,20,1);
    }

    .road .button:active{
      transform: translateY(5px);
      border-bottom:solid 0px rgba(130,130,20,1);
    }

    .box{
      text-align: center;
      float:left;
      height:150px;
      width:45%;
    }

    .right-box{
      float:right;
    }

    .stage{
      display: inline-block;
      width:90%;
      height:100px;
      margin: 5px;
      background-color:rgba(0,0,0,0.2);
    }

    .description{
      text-align: center;
      margin-top:10px;
    }


      /* 大丈夫。ただ編集中俺も画面変わっちゃうので
      別のatom開くか、サブライムテキストでやるか・・でおねがいします
      ↑今気づいたああああ*/
    </style>
    <link rel="stylesheet" href="./base.css">
    <?php $meiro = new Meiro(); ?>
    <script type="text/javascript">

    </script>
  </head>
  <body>
    <header>
      <div class="container">
        <h1 class = "game-title"><a href="./index.php">迷路ゲーム！</a></h1>
      </div>
    </header>

    <div class="text-space">
      <?php // this x meiro O ?>

    </div>
      <div class = "screen">
        <div class="title">
          <!-- やべぇことしてたw
            もうなんだろう。完全なるアホなことしてたね💦　あ、そうだ
            これでいいはずまさかのフラグ立ったまま？もしかして消えないっぽい…-->
            <!--
            私も何か作ってみないとな💧
            やったー！！！めっちゃ時間かかったね💦思ったほか💦
            まぁ、とはいえ、慣れていない言語だったのもかなりあると思うから…
            もっとなれるように頑張る！


          -->
            <!-- うーん…詰み💧-->
            <?php if($meiro->getDetFlag() == 1): ?><!--いうてミスしたら文字消えるw-->
              <h1 class = "miss_flash">ミス！！！</h1>
            <?php endif ?>
            <!-- 💦 -->
            <?php if($meiro->getCount() == 0): ?>
              <h1>１、スタート地点</h1>
            <?php else: ?>
              <h1 class = "victorie"><?php echo $meiro->getCount(); ?>連続！</h1>
            <?php endif ?>

        </div>
        <div class="road">
          <?php $meiro->setRoots(rand(1,2)); ?>
          <div class="left-box box">
            <div class = "stage"></div>
            <a href="http://localhost:8000//index.php?judge=<?php echo $meiro->getRoots();?>&count=<?php echo $meiro->getCount(); ?>" class = "button left-button">← 左へ</a>
          </div>
          <!-- 一応クエストリングでgetパラメーターとして渡してる。
          ただ、さっきechoしてなかったね💧ってあｗｗｗｗ-->
          <div class="right-box box">
            <div class = "stage"></div><!--おおおおでた！-->
            <a href="http://localhost:8000//index.php?judge=<?php if($meiro->getRoots()==1){
              echo $meiro->setBranch(2);
            }else{
              echo $meiro->setBranch(1);//　
            } ?>&count=<?php echo $meiro->getCount()?>" class = "button left-button">右へ→</a>
          </div>
          <div class = "free"></div>
        </div>
      </div>
      <div class="description">
        <p>※全3ステージ。道を間違えるとスタートに戻されます。</p>
      </div>
    </div>

  </body>
</html>
