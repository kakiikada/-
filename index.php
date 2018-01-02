<?php require('game.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>迷路ゲーム！</title>
    <link rel="stylesheet" href="./base.css">
    <?php $meiro = new Meiro(); ?>
  </head>
  <body>
    <?php if($meiro->getCount() == 3): ?>
      <div class="clear_confirm">
        <div class="screen">
          <div class="clear_content">
            <h1>クリア！おめでとう！</h1>
            <form name="c" action="./index.php" method="post">
              <input type="hidden" name="count" value="0">
              <input type="hidden" name="judge" value="0">
            </form>
            <a href="javascript:document.c.submit()">最初に戻る</a>
          </div>
        </div>
      </div>
    <?php else: ?>
      <header>
        <div class="container">
          <h1 class = "game-title"><a href="./index.php">迷路ゲーム！</a></h1>
        </div>
      </header>

      <div class="text-space">

      </div>
        <div class = "screen">
          <div class="title">
            <!--

            -->
              <!-- うーん…詰み💧-->
          <div style="height:50px;">
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

          </div>
          <div class="road">

            <?php $_SESSION['check_session'] = md5(uniqid().mt_rand()); ?>
            <!-- まずセッションに値をセットする。 -->
            <?php setcookie('check_session',$_SESSION['check_session']); ?>
            <?php $meiro->setRoots(rand(1,2)); ?>
            <!-- クッキーに値をゲットする。これはいわゆる外部ファイルでセッション的な使い方をするために必要 -->
            <div class="left-box box">
              <div class = "stage"></div>
              <form name=f method=POST action="http://localhost:8000/index.php?check_session=<?php echo $_SESSION['check_session'] ?>">
                <input type="hidden" name="judge" value="<?php echo $meiro->getRoots();?>">
                <input type="hidden" name="count" value="<?php echo $meiro->getCount(); ?>">
                <input type="hidden" name="check_session" value="<?php echo $_SESSION['check_session']; ?>">
              </form>
              <!-- ココでは最新のトークン。セッションをバリューとして入れる。 -->
                <a class = "button left-button" href="javascript:document.f.submit()">← 左へ</a>
                <!-- これが押されたらクッキーとゲットが維持される。phpファイルへ -->
            </div>
            <div class="right-box box">
              <div class = "stage"></div><!--おおおおでた！-->

              <form name=j method=POST action="http://localhost:8000/index.php?check_session=<?php echo $_SESSION['check_session'] ?>">
                <input type="hidden" name="judge" value="<?php if($meiro->getRoots()==1){
                  echo 2;
                }else{
                  echo 1;//　
                }?>">
                <input type="hidden" name="count" value="<?php echo $meiro->getCount(); ?>">
                <input type="hidden" name="check_session" value="<?php echo $_SESSION['check_session']; ?>">
              </form>
              <a href="javascript:document.f.submit()" class = "button left-button">右へ→</a>
            </div>
            <div class = "free"></div>
          </div>
        </div>

        <div class="description">
          <p>※全3ステージ。道を間違えるとスタートに戻されます。</p>
        </div>
      </div>
    <?php endif; ?>

  </body>
</html>
