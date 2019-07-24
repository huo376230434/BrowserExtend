<?php
namespace Huojunhao\BrowserExtend\DocTraits;


use App\Lib\Common\Dictionary\Dwfaker;
use Laravel\Dusk\Browser;

trait   ChanDao   {

   public function testDoc($times=1)
       {
           foreach (range(1, $times) as $item) {
               $this->browse(function (Browser $browser) {
                   $faker = new Dwfaker();
                   $base_url = "https://www.zentao.net";
                   $url = $base_url."/book/zentaoprohelp/324.html";
                   $base_url = "https://www.chanzhi.org";
                   $base_url = "https://www.ranzhi.org";
                   $url = $base_url."/index.php?m=book&f=read&t=mhtml&articleID=135";
                   $url = $base_url."/book/zhanqun/225.html";
                   $url = $base_url."/book/ranzhipro/138.html";

                   $urls =  $browser
                       ->visitAndDelay($url)
                       ->getBatchAttr('.books a','href')
                       ;
//                  dd($urls);
                   dump(count($urls));
                   $urls = collect($urls)->map((function ($value, $key) use ($base_url) {

                       return $base_url . $value;
                   }))->toArray();
//                  $urls = collect($urls)->filter((function ($value,$key){
//                      $value = trim($value);
//
//                              return $value !== "javascript:void(0);";
//                  }))->map((function ($value,$key){
//                              return "https://help.aliyun.com".$value;
//                  }))->filter((function ($value,$key){
////                      if ($key >= 200 && $key < 400) {
////                          dump($key);
////                      }
//                    //  return $key < 200;
//                      return $key >= 200 && $key < 400;
//                      return $key >= 400 && $key < 600;
//                      return $key >= 600;
//                      return true;
////                              return $key <30;
//                  }));
//                   dd($urls);
//                  $urls =
//                  dd($urls);
                   $browser->joinHtmlsAndWaitToPrint('.book-content', $urls,[
//                       '.recommendation-area',

                   ],[
//                       '[data-name="aliyun-responsive-header"]' ,
//                       '.help-body-box-detail-title-others',
//                       ".recommendation-area",
//                       ".help-detail-feedback-wrapper",
//                       '.ribbon',
//                       '.help-menu-box',
//                       'video'
                   ]);
                   $browser->delay(2000);
                  dump($urls);






   //                    ->assertPathIs($unit)
   //                    ->assertPresent(".custom-grid")
   //                    ->assertSeeIn(".content-header","单位管理")


                   ;
               });
           }
       }
}
