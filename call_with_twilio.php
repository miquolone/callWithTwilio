<?php

###
#
#  Twilio への接続処理 を纏めたクラス
#
##

class CallClass {
  public $appname = 'twilio call class';
  public function displayVar() { echo $this->var; }

  function __construct() { require 'Services/Twilio.php'; }

  /** call_with_twilio
   * Twilioを用いて電話を実行する
   * @param tel {Number} 電話番号
   */
  public function call_with_twilio($tel){

    /* 設定を変更しなければならない箇所 */
    $version        = "2010-04-01"; #固定 Twilio API のバージョン
    $sid            = '######### Twilio管理画面にあるSID番号 ###################';
    $token          = '######### Twilio管理画面にあるtoken番号 #################';
    $tel            = '######### 電話をかけたい番号 ############################';
    $phonenumber    = '######### Twilio管理画面で購入した番号###################';
    $xml            = '######### Twilioが呼び出すXMLの置き場所 http://~~~#######';
    $callback       = '######### Twilioの処理が終わった際に呼ばれれるアドレス###';
    /************************************/

    $client = new Services_Twilio($sid, $token, $version);

    /* 実際の処理部 */
    try {
      $call = $client->account->calls->create( $phonenumber, $tel, $xml);
      echo '処理開始: ' .$call->sid;
      echo '実行結果: ' .$call->status;
    } catch (Exception $e) {
      echo '実行失敗: ' .$e->getMessage();
    }
  }
}



?>
