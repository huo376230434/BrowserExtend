<?php
namespace Huojunhao\BrowserExtend\DocTraits;


use App\Lib\Common\Dictionary\Dwfaker;
use Laravel\Dusk\Browser;

trait   AliYunDoc   {

   public function testEcs($times=1)
       {
           foreach (range(1, $times) as $item) {
               $this->browse(function (Browser $browser) {
                   $faker = new Dwfaker();
                   $url = "https://help.aliyun.com/document_detail/110530.html?spm=a2c4g.11186623.6.542.555c12965buFyY";

                  $urls =  $browser
                       ->visitAndDelay($url)
                       ->getBatchAttr('#J_MenuListContainer a','href')
                       ;
//                  dd($urls);
                   dump(count($urls));
                  $urls = collect($urls)->filter((function ($value,$key){
                      $value = trim($value);

                              return $value !== "javascript:void(0);";
                  }))->map((function ($value,$key){
                              return "https://help.aliyun.com".$value;
                  }))->filter((function ($value,$key){
//                      if ($key >= 200 && $key < 400) {
//                          dump($key);
//                      }
                    //  return $key < 200;
                      return $key >= 200 && $key < 400;
                      return $key >= 400 && $key < 600;
                      return $key >= 600;
                      return true;
//                              return $key <30;
                  }));
//                   dd($urls);
//                  $urls =
//                  dd($urls);
                   $browser->joinHtmlsAndWaitToPrint('.help-body-box-detail', $urls,[
                       '.recommendation-area',

                   ],[
                       '[data-name="aliyun-responsive-header"]' ,
                       '.help-body-box-detail-title-others',
                       ".recommendation-area",
                       ".help-detail-feedback-wrapper",
                       '.ribbon',
                       '.help-menu-box',
                       'video'
                   ]);
                  dump($urls);






   //                    ->assertPathIs($unit)
   //                    ->assertPresent(".custom-grid")
   //                    ->assertSeeIn(".content-header","单位管理")


                   ;
               });
           }
       }
}
