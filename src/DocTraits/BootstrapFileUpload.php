<?php
namespace Huojunhao\BrowserExtend\DocTraits;


use App\Lib\Common\Dictionary\Dwfaker;
use Laravel\Dusk\Browser;

trait   BootstrapFileUpload   {

    protected $url = "http://bootstrap-fileinput.com/";
   public function testFileUpload($times=1)
       {
           $this->browse(function(Browser $browser){
              $res =  $browser->visitAndDelay($this->url)
                   ->getBatchAttr('.summary a','href');
              $urls = collect($res)->filter((function ($value,$key){

                          return !starts_with($value,'http');
              }))->map((function ($value,$key){

                          return $this->url.$value;
              }));
            $html =    $browser->joinHtmlsAndWaitToPrint('#book-search-results', $urls);

               $browser->delay(2000);
               dd($res);

           });

       }
}
