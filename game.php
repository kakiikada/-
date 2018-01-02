<?php
class Meiro{
  private $branch; //分岐
  private $sage_root;
  private $check_judge;
  private $count = 0;
  private $det_flag = 0;

  public function __construct(){

    if($_POST) {
      // とある記事を参考にして実装してみました。
      // postに変更しました。
      $this->check_judge = $_POST['judge'];
      $this->count = $_POST['count'];
      //　それぞれ値を格納したら
      /*
      POSTをカラにします。こうすることでリロードした時に
      ミスが表示されることがなくなります。んで
      */
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
        if(isset($_COOKIE['check_session'], $_GET['check_session']) && $_COOKIE['check_session'] === $_GET['check_session']){
          // ここでクッキーとゲットが一致しているかどうかの確認
          // なおリロードするとクッキーが一個遅れで更新され。不一致にに鳴るためelseへ
          $this->det_flag = 1;

        }else{
          $this->det_flag = 0;
          // elseで0にすることでミスを表示しないようにしてる。
        }
        // カウントを０にします。
        // フラグを立てます。　となると、その下かな。
        // ココでミスったらdet_flagを１にするとともに、カウントも０にしてる。
      }
    }
    // var_dump($this->det_flag);
    // var_dump($_GET['check_session']);
    // var_dump($_COOKIE['check_session']);
    // getとcookieの一致確認用。それとフラグの確認用
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
